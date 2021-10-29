<?php

use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Livewire\Admin;
use App\Http\Livewire\Admin\Agent\DropOff\PrintDropoff;
use App\Http\Livewire\Admin\Agent\PrintReceipt\PrintReceipt;
use App\Http\Livewire\Admin\Agent\DropOff\SendPackages;

use App\Http\Livewire\Admin\Agent\Parcel\Details\PrintLabel as AgentPrintLabel;
use App\Http\Livewire\Admin\Agent\Parcel\Details\PrintInvoice as AgentPrintInvoice;
use App\Http\Livewire\Admin\Agent\Parcel\Details\PrintShipment as AgentPrintShipment;
use App\Http\Livewire\Admin\Agent\Parcel\Details\PrintBill as AgentPrintBill;
use App\Http\Livewire\Admin\Agent\Users\Index as UserGiveAccess;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Registration;
use App\Http\Livewire\ChangePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home\HomeComponent;
use App\Http\Livewire\Home\Panel\Orders\Orders;
use App\Http\Livewire\Home\Panel\Services\ServicesIndex;
use App\Http\Livewire\Home\Panel\Services\ParcelContent\Parcel\PrintLabel;
use App\Http\Livewire\Home\Panel\Services\ParcelContent\Parcel\PrintInvoice;
use App\Http\Livewire\Home\Panel\Services\ParcelContent\Parcel\PrintShipment;
use App\Http\Livewire\Home\Panel\Account\MyAccount;
use App\Http\Livewire\Home\Panel\GetQuote;

use App\Http\Livewire\Home\Forms\Index as UnprotectedFroms;
use App\Http\Livewire\Home\Dropoff\Index as UnprotectedDropoff;

use App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup\PrintPickupLabel;
use App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup\PrintPickupInvoice;
use App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup\PrintPickupShipment;
use App\Http\Livewire\Home\RequestAccepted;

use App\Http\Livewire\Home\Panel\Orders\ParcelOrders\PrintLabel as HistoryPrintLabel;
use App\Http\Livewire\Home\Panel\Orders\ParcelOrders\PrintInvoice as HistoryPrintInvoice;
use App\Http\Livewire\Home\Panel\Orders\ParcelOrders\PrintShipment as HistoryPrintShipment;

Route::get('/printtt', function () {
    return view('livewire.admin.agent.scanning.details.invoice');
});
Route::get('/login', Login::class)
    ->middleware('guest')
    ->name('login');
Route::get('/register', Registration::class)
    ->middleware('guest')
    ->name('register');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'admin', 'verified'], 'as' => 'admin.'], function () {
    Route::get('/', Admin\Dashboard::class)->name('index');

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', Admin\Users\Index::class)->name('index');
        Route::get('create', Admin\Users\Create::class)->name('create');
        Route::get('edit/{id}', Admin\Users\Edit::class)->name('edit');
    });

    Route::group(['prefix' => 'drivers', 'as' => 'drivers.'], function () {
        Route::get('/', Admin\Drivers\Index::class)->name('index');
        Route::get('create', Admin\Drivers\Create::class)->name('create');
        Route::get('edit/{id}', Admin\Drivers\Edit::class)->name('edit');
    });

    Route::group(['prefix' => 'agents', 'as' => 'agents.'], function () {
        Route::get('/', Admin\Agents\Index::class)->name('index');
        Route::get('create', Admin\Agents\Create::class)->name('create');
        Route::get('edit/{id}', Admin\Agents\Edit::class)->name('edit');
    });

    Route::group(['prefix' => 'owner', 'as' => 'owner.'], function () {
        Route::get('/', Admin\AgentsOwner\Index::class)->name('index');
        Route::get('create', Admin\AgentsOwner\Create::class)->name('create');
        Route::get('edit/{id}', Admin\AgentsOwner\Edit::class)->name('edit');
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::group(['prefix' => 'parcel', 'as' => 'parcel.'], function () {
            Route::get('/', Admin\Orders\Parcel\Index::class)->name('index');
        });
        Route::group(['prefix' => 'envelop', 'as' => 'envelop.'], function () {
            Route::get('/', Admin\Orders\Envelop\Index::class)->name('index');
        });
        Route::group(['prefix' => 'faxing', 'as' => 'faxing.'], function () {
            Route::get('/', Admin\Orders\Faxing\Index::class)->name('index');
        });
        Route::group(['prefix' => 'printing', 'as' => 'printing.'], function () {
            Route::get('/', Admin\Orders\Printing\Index::class)->name('index');
        });
        Route::group(['prefix' => 'scanning', 'as' => 'scanning.'], function () {
            Route::get('/', Admin\Orders\Scanning\Index::class)->name('index');
        });
        Route::group(['prefix' => 'pickupAndDelivery', 'as' => 'pickupAndDelivery.'], function () {
            Route::get('/', Admin\Orders\Pickup\Index::class)->name('index');
        });
        Route::group(['prefix' => 'mailbox', 'as' => 'mailbox.'], function () {
            Route::get('/', Admin\Orders\Mailbox\Index::class)->name('index');
        });
    });

    Route::group(['prefix' => 'store', 'as' => 'store.'], function () {
        Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
//            Route::get('/', Admin\Store\Orders\Index::class)->name('index');
//            Route::get('show/{agent}', Admin\Store\Orders\Show::class)->name('show');
        });

        Route::group(['prefix' => 'transactions', 'as' => 'transactions.'], function () {
//            Route::get('/', Admin\Store\Transactions\Index::class)->name('index');
//            Route::get('show/{agent}', Admin\Store\Transactions\Show::class)->name('show');
        });
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('/', Admin\Settings\Index::class)->name('index');
        Route::get('printing/create', Admin\Settings\PrintingServicesPrice\Create::class)->name('printing.create');
        Route::get('printing/edit/{id}', Admin\Settings\PrintingServicesPrice\Edit::class)->name('printing.edit');
//        Route::get('scanning/create', Admin\Settings\ScanningServicesPrice\Create::class)->name('scanning.create');
        Route::get('scanning/edit/{id}', Admin\Settings\ScanningServicesPrice\Edit::class)->name('scanning.edit');
//        Route::get('faxing/create', Admin\Settings\ScanningServicesPrice\Create::class)->name('scanning.create');
        Route::get('faxing/edit/{id}', Admin\Settings\FaxingServicesPrice\Edit::class)->name('faxing.edit');
//        Route::get('agent/create', Admin\Settings\ScanningServicesPrice\Create::class)->name('scanning.create');
        Route::get('agent/edit/{id}', Admin\Settings\AgentServicesPrice\Edit::class)->name('agent.edit');
//        Route::get('user/create', Admin\Settings\ScanningServicesPrice\Create::class)->name('scanning.create');
        Route::get('user/edit/{id}', Admin\Settings\UserServicesPrice\Edit::class)->name('user.edit');
        Route::get('mailbox/edit/{id}', Admin\Settings\MailboxServicesPrice\Edit::class)->name('mailbox.edit');
        Route::group(['prefix' => 'api-key', 'as' => 'api-key.'], function () {
            Route::get('/', Admin\Settings\ApiKey\Index::class)->name('index');
            Route::get('create/{id}', Admin\Settings\ApiKey\Create::class)->name('create');
        });

        Route::get('pickupAndDelivery/create', Admin\Settings\PickupServices\Create::class)->name('pickupAndDelivery.create');
        Route::get('pickupAndDelivery/edit/{id}', Admin\Settings\PickupServices\Edit::class)->name('pickupAndDelivery.edit');
    });

    Route::group(['prefix' => 'payments', 'as' => 'payments.'], function () {
        Route::get('/', Admin\Payments\Index::class)->name('index');
    });

    Route::get('invoices-list/{id}', Admin\InvoicesList::class)->name('invoice-list');
    Route::group(['prefix' => 'invoices', 'as' => 'invoices.'], function () {
        Route::get('/', Admin\Invoices\Index::class)->name('index');
        Route::get('edit/{id}', Admin\Invoices\Edit::class)->name('edit');
    });

    Route::group(['prefix' => 'withdraws', 'as' => 'withdraws.'], function () {
        Route::get('/', Admin\Withdraws\Index::class)->name('index');
        Route::get('edit/{id}/status/{status}', Admin\Withdraws\Edit::class)->name('edit');
    });
});

Route::group(['prefix' => 'agent', 'middleware' => ['auth:sanctum', 'agent', 'verified','checkDefaultPassword'], 'as' => 'agent.'], function () {

    Route::get('/', Admin\Agent\Index::class)->name('index')->middleware(['lock']);
    Route::get('lock', Admin\Agent\Lock::class)->name('lock');

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', Admin\Agent\Users\Index::class)->name('index');
    });

    Route::group(['prefix' => 'profile', 'middleware' => ['lock'], 'as' => 'profile.'], function () {
        Route::get('/', Admin\Agent\Profile\Index::class)->name('index');
        Route::get('PrintQR', Admin\Agent\Profile\Printqr::class)->name('printqr');
    });

    Route::group(['prefix' => 'notification', 'middleware' => ['lock'], 'as' => 'notification.'], function () {
        Route::get('/', Admin\Agent\Notification\Index::class)->name('index');
    });

    Route::group(['prefix' => 'drop-off', 'middleware' => ['lock'], 'as' => 'drop-off.'], function () {
        Route::get('/', Admin\Agent\DropOff\Index::class)->name('index');
        Route::get('/pickup', Admin\Agent\DropOff\Pickup::class)->name('pickup');
        Route::get('/delivery', Admin\Agent\DropOff\Delivery::class)->name('delivery');
        Route::get('/send', Admin\Agent\DropOff\Send::class)->name('send_packages');
        Route::get('{id}', Admin\Agent\DropOff\Edit::class)->name('edit_dropoff');
    });

    Route::group(['prefix' => 'print-receipt', 'middleware' => ['lock'], 'as' => 'print-receipt.'], function () {
        Route::get('/', Admin\Agent\PrintReceipt\Index::class)->name('index');
        Route::get('/send', Admin\Agent\PrintReceipt\Send::class)->name('send_packages');
        Route::get('{id}', Admin\Agent\PrintReceipt\Edit::class)->name('edit_dropoff');
    });

    Route::group(['prefix' => 'parcel', 'middleware' => ['lock'], 'as' => 'parcel.'], function () {
        Route::get('/', Admin\Agent\Parcel\Index::class)->name('index');
        Route::get('selectUser', Admin\Agent\Parcel\selectUser::class)->name('selectUser');
        Route::get('create', Admin\Agent\Parcel\Create::class)->name('create');
    });
    Route::group(['prefix' => 'envelop', 'middleware' => ['lock'], 'as' => 'envelop.'], function () {
        Route::get('/', Admin\Agent\Envelop\Index::class)->name('index');
        Route::get('selectUser', Admin\Agent\Envelop\selectUser::class)->name('selectUser');
        Route::get('create', Admin\Agent\Envelop\Create::class)->name('create');
    });
    Route::group(['prefix' => 'scanning', 'middleware' => ['lock'], 'as' => 'scanning.'], function () {
        Route::get('/', Admin\Agent\Scanning\Index::class)->name('index');
        Route::get('selectUser', Admin\Agent\Scanning\selectUser::class)->name('selectUser');
        Route::get('create', Admin\Agent\Scanning\Create::class)->name('create');
        Route::get('edit/{id}', Admin\Agent\Scanning\Edit::class)->name('edit');
    });
    Route::group(['prefix' => 'printing', 'middleware' => ['lock'], 'as' => 'printing.'], function () {
        Route::get('/', Admin\Agent\Printing\Index::class)->name('index');
        Route::get('selectUser', Admin\Agent\Printing\selectUser::class)->name('selectUser');
        Route::get('create', Admin\Agent\Printing\Create::class)->name('create');
        Route::get('edit/{id}', Admin\Agent\Printing\Edit::class)->name('edit');
    });
    Route::group(['prefix' => 'faxing', 'middleware' => ['lock'], 'as' => 'faxing.'], function () {
        Route::get('/', Admin\Agent\Faxing\Index::class)->name('index');
        Route::get('selectUser', Admin\Agent\Faxing\selectUser::class)->name('selectUser');
        Route::get('create', Admin\Agent\Faxing\Create::class)->name('create');
        Route::get('edit/{id}', Admin\Agent\Faxing\Edit::class)->name('edit');
    });
    Route::group(['prefix' => 'mailbox', 'middleware' => ['lock'], 'as' => 'mailbox.'], function () {
        Route::get('/', Admin\Agent\Mailbox\Index::class)->name('index');
        Route::get('create', Admin\Agent\Mailbox\Create::class)->name('create');
        Route::get('edit/{id}', Admin\Agent\Mailbox\Edit::class)->name('edit');
        Route::get('prices', Admin\Agent\Mailbox\Prices::class)->name('prices');

        Route::group(['prefix' => 'mailbox-type', 'as' => 'mailbox-type.'], function () {
            Route::get('create', Admin\Agent\Mailbox\Types\Create::class)->name('create');
            Route::get('edit/{id}', Admin\Agent\Mailbox\Types\Edit::class)->name('edit');
        });
    });
    Route::group(['prefix' => 'bank-info', 'middleware' => ['lock'], 'as' => 'bank-info.'], function () {
        Route::get('/', Admin\Agent\BankInfo\Index::class)->name('index');
        Route::get('edit/{id}', Admin\Agent\BankInfo\Edit::class)->name('edit');
        Route::get('create', Admin\Agent\BankInfo\Create::class)->name('create');
    });

//    Route::get('api-key', Admin\Agent\ApiKey::class)->name('settings.index');
    Route::get('invoices-list/{id}', Admin\InvoicesList::class)->name('invoice-list')->middleware(['lock']);
    Route::get('invoices', Admin\Agent\Invoices::class)->name('invoices')->middleware(['lock']);
    Route::get('withdraws', Admin\Agent\Withdraws::class)->name('withdraws')->middleware(['lock']);
//    Route::get('payment-info', Admin\Agent\PaymentInfo::class)->name('payment.');
    Route::group(['prefix' => 'payment-info', 'middleware' => ['lock'], 'as' => 'payment.'], function () {
        Route::get('/', Admin\Agent\PaymentInfo::class)->name('index');
        Route::get('edit/{id}', Admin\Agent\Payment\Edit::class)->name('edit');
        Route::get('create', Admin\Agent\Payment\Create::class)->name('create');
    });
    Route::get('address-book', Admin\Agent\AddressBook::class)->name('address-book.index')->middleware(['lock']);
    Route::get('create-address-book', Admin\Agent\CreateAddressBook::class)->name('create-address-book.index')->middleware(['lock']);
});

//Home Group Controllers
Route::group(['as' => 'home.'], function () {
    Route::get('/', HomeComponent::class)->name('index');

    // Auth needed
    Route::middleware(['auth','checkDefaultPassword'])->group(function () {

        // Services
        Route::prefix('services')->as('services.')->group(function () {
            Route::get('/parcel', ServicesIndex::class)->name('parcel');
            Route::get('/envelop', ServicesIndex::class)->name('envelop');
            Route::get('/scanning', ServicesIndex::class)->name('scanning');
            Route::get('/printing', ServicesIndex::class)->name('printing');
            Route::get('/faxing', ServicesIndex::class)->name('faxing');
            Route::get('/mailbox', ServicesIndex::class)->name('mailbox');
            Route::get('/pickup-delivery', ServicesIndex::class)->name('pickup-delivery');
        });

        // Get Quote
        Route::prefix('quotes')->as('quotes.')->group(function () {
            Route::get('/parcel', GetQuote\Index::class)->name('parcel');
            Route::get('/envelop', GetQuote\Index::class)->name('envelop');
            Route::get('/scanning', GetQuote\Index::class)->name('scanning');
            Route::get('/printing', GetQuote\Index::class)->name('printing');
            Route::get('/faxing', GetQuote\Index::class)->name('faxing');
            Route::get('/mailbox', GetQuote\Index::class)->name('mailbox');
        });

        // Panel
        Route::prefix('panel')->as('panel.')->group(function () {
            Route::get('/parcel-orders', Orders::class)->name('parcel-orders');
            Route::get('/envelop-orders', Orders::class)->name('envelop-orders');
            Route::get('/scanning-orders', Orders::class)->name('scanning-orders');
            Route::get('/printing-orders', Orders::class)->name('printing-orders');
            Route::get('/faxing-orders', Orders::class)->name('faxing-orders');
            Route::get('/mailbox-orders', Orders::class)->name('mailbox-orders');
        });

        // Account
        Route::prefix('account')->as('account.')->group(function () {
            Route::get('/my-account', MyAccount::class)->name('my-account');
//            Route::get('/payment-methods', MyAccount::class)->name('payment-methods');
            Route::get('/address-book', MyAccount::class)->name('address-book');
            Route::get('/edit-address/{id}', MyAccount\EditAddress::class)->name('edit-address');
            Route::get('/create-address-book', MyAccount::class)->name('create');
            Route::get('/transactions', MyAccount::class)->name('transactions');
            Route::get('/account-edit', MyAccount::class)->name('edit');
            Route::group(['prefix' => 'payment-methods', 'as' => 'payment-methods.'], function () {
                Route::get('/', MyAccount::class)->name('methods');
                Route::get('create', MyAccount::class)->name('create');
                Route::get('edit/{id}', MyAccount\EditPayment::class)->name('edit');
            });
            Route::get('/notifications', MyAccount::class)->name('notifications');
        });
    });
});

Route::middleware(['auth:sanctum', 'verified','checkDefaultPassword'])->get('/dashboard', function () {
    if (auth()->user()->isAdmin())
        return redirect('/admin');
    else if (auth()->user()->level === 'agent')
        return redirect('/agent');
    else
        return redirect('/services/parcel');
//    return view('dashboard');
})->name('dashboard');

Route::get('/logout',function (){
    Auth::guard('web')->logout();

    session()->invalidate();

    session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::middleware(['auth:sanctum'])->get('Agent/print-label', [AgentPrintLabel::class, 'printPDF'])->name('AgentPrintPdf');
Route::middleware(['auth:sanctum'])->get('Agent/print-invoice', [AgentPrintInvoice::class, 'printInvoice']);
Route::middleware(['auth:sanctum'])->get('Agent/print-shipment', [AgentPrintShipment::class, 'printShipment']);
Route::middleware(['auth:sanctum'])->get('Agent/print-bill', [AgentPrintBill::class, 'printBill']);

Route::middleware(['auth:sanctum'])->get('/print-label', [PrintLabel::class, 'printPDF'])->name('printpdf');
Route::middleware(['auth:sanctum'])->get('/print-invoice', [PrintInvoice::class, 'printInvoice']);
Route::middleware(['auth:sanctum'])->get('/print-shipment', [PrintShipment::class, 'printShipment']);

// Route::middleware(['auth:sanctum'])->get('/print-pickup-label', [PrintPickupLabel::class, 'printPDF'])->name('printpdf');
// Route::middleware(['auth:sanctum'])->get('/print-pickup-invoice', [PrintPickupInvoice::class, 'printInvoice']);
// Route::middleware(['auth:sanctum'])->get('/print-pickup-shipment', [PrintPickupShipment::class, 'printShipment']);

Route::middleware(['auth:sanctum'])->get('/print-label', [HistoryPrintLabel::class , 'printPDF']);
Route::middleware(['auth:sanctum'])->get('/print-invoice', [HistoryPrintInvoice::class, 'printInvoice']);
Route::middleware(['auth:sanctum'])->get('/print-shipment', [HistoryPrintShipment::class, 'printShipment']);

Route::middleware(['auth:sanctum'])->get('Agent/print-drop-off', [PrintDropoff::class, 'Print']);

Route::middleware(['auth:sanctum'])->get('Agent/receipt', [PrintReceipt::class, 'Print']);



Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/', Admin\Agent\Users\Index::class)->name('index');
});


Route::get('/giveAccess/{agent}&{user}', [UserGiveAccess::class,'updateUserAgent']);
Route::get('/request-accepted', [RequestAccepted::class,'render']);

Route::middleware(['auth:sanctum','checkDefaultPassword'])->group(function () {
    Route::get('/test',MyAccount::class);
});

Route::get('/change-password', function(){
        return View('livewire.changePassword');
    });
Route::post('/updatePassword',[ChangePassword::class , 'update']);


Route::get('test', function(){
    return View('welcome');
});


Route::middleware(['auth:sanctum'])->get('user-drop-off', UnprotectedDropoff::class);

// UnProtected Route 
Route::get('forms', UnprotectedFroms::class);