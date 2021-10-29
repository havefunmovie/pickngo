<?php

namespace App\Console;

use App\Models\Invoices;
use App\Models\Mailboxes;
use App\Models\Temp;
use App\Models\Transactions;
use App\Models\User;
use App\Models\UserMailboxes;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        for take invoice list
        $schedule->call(function () {
            $allTrans = Transactions::whereNotNull('agent_id')
                ->where('system_check', '0')
                ->where('status', 'successful')
                ->groupBy('agent_id')
                ->selectRaw('*, sum(price) as m_price, max(id) as max_id, min(id) as min_id')
                ->get();

            Transactions::where('system_check', '0')->update([
                'system_check' => '1'
            ]);

            $invoices = Invoices::where('withdraw_status', 0)
                ->groupBy('agent_id')
                ->selectRaw('*, sum(balance_value) as balance_price')
                ->get();

            $data = [];
            $i = 1;
            foreach ($allTrans as $trans) {

                $price = 0;

                if ($invoices) {
                    foreach ($invoices as $invoice) {
                        if ($invoice['agent_id'] == $trans->agent_id) {
                            $price = $invoice['balance_price'];
                            break;
                        }
                    }
                }

                $mdata = [
                    [
                        'start_transaction_id' => $trans->min_id,
                        'end_transaction_id'   => $trans->max_id,
                        'invoice_number'       => date('Ymd-His').'-'.mt_rand(10, 99).$i++,
                        'agent_id'             => $trans->agent_id,
                        'balance_value'        => $trans->m_price + $price,
                        'created_at'           => now(),
                        'updated_at'           => now(),
                    ]
                ];

                array_push($data, array_shift($mdata));
            }

            Invoices::where('withdraw_status', 0)
                ->update([
                    'withdraw_status' => 1
                ]);

            Invoices::insert($data);
        })->everyTenMinutes()/*->weekends()*/;

//        for block user
        $schedule->call(function () {
//            $invs = Invoices::whereDate('created_at', '<=', Carbon::now()->subDays())
//                ->whereDate('created_at', '>', Carbon::now()->subDays(6))
//                ->get();

            $invs = Invoices::whereBetween('created_at', [Carbon::now()->subMinute(2), Carbon::now()->subMinute()])
                ->get();

            foreach ($invs as $inv) {
                if ($inv->balance_value <= -200) {
                    User::where('id', $inv->agent_id)->update([
                        'status' => '0'
                    ]);
                }
            }
        })->everyTwoMinutes()/*wednesdays()*/;

        $schedule->call(function () {
            $temps = Temp::all();
            foreach ($temps as $temp) {
                File::delete(public_path('images/uploads/'.$temp['temp_file']));
                $temp->delete();
            }

//            UserMailboxes::where('renewal_date', Carbon::now()->subDays(7))
//                ->where('renewal_alert_status', 0)
//                ->update([
//                    'renewal_alert_status' => 1
//                ]);
//            UserMailboxes::where('renewal_date', Carbon::now())
//                ->where('mailbox_status', null)
//                ->where('renewal_alert_status', 1)
//                ->update([
//                    'mailbox_status' => 'suspended'
//                ]);
//            $boxes = UserMailboxes::where('renewal_date', Carbon::now()->addDays(7))
//                ->where('mailbox_status', 'suspended')
//                ->get();
//            foreach ($boxes as $box) {
//                UserMailboxes::where('id', $box['id'])
//                    ->update([
//                        'mailbox_status' => 'terminated'
//                    ]);
//                Mailboxes::where('id', $box['box_id'])->update([
//                    'is_empty' => 1
//                ]);
//            }
        })->dailyAt('01:00');

        $schedule->call(function () {
            UserMailboxes::where('renewal_date', Carbon::now()->addMinutes(15))
                ->where('renewal_alert_status', 0)
                ->update([
                    'renewal_alert_status' => 1
                ]);
            UserMailboxes::where('renewal_date', Carbon::now())
                ->where('mailbox_status', null)
                ->where('renewal_alert_status', 1)
                ->update([
                    'mailbox_status' => 'suspended'
                ]);
            $boxes = UserMailboxes::where('renewal_date', Carbon::now()->subMinutes(15))
                ->where('mailbox_status', 'suspended')
                ->get();
            foreach ($boxes as $box) {
                UserMailboxes::where('id', $box['id'])
                    ->update([
                        'mailbox_status' => 'terminated'
                    ]);
                Mailboxes::where('id', $box['box_id'])->update([
                    'is_empty' => 1
                ]);
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
