<?php

namespace App\Providers;

use App\Events\AgentReciveNewOrderFromInStoreUserEvent;
use App\Events\NewDropoffAcceptedByAgentEvent;
use App\Events\NewOrderEvent;
use App\Events\NewUserEvent;
use App\Events\OrderAcceptedEvent;
use App\Events\OrderStatusUpdatedByAgentEvent;
use App\Events\RequestUserInfo;
use App\Listeners\AgentReciveNewOrderFromInStoreUserListener;
use App\Listeners\NewDropoffAcceptedByAgentListener;
use App\Listeners\NewOrderToCustomerListener;
use App\Listeners\NewUserRegisteredListener;
use App\Listeners\NotifyDriverViaSlackListener;
use App\Listeners\OrderAcceptedListener;
use App\Listeners\OrderStatusUpdatedByAgentListener;
use App\Listeners\RequestUserInfoListener;
use App\Mail\NewDropoffAcceptedByAgentMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewOrderEvent::class =>[
            NewOrderToCustomerListener::class,
            NotifyDriverViaSlackListener::class,
        ],
        OrderAcceptedEvent::class =>[
            OrderAcceptedListener::class,
        ],
        NewUserEvent::class =>[
            NewUserRegisteredListener::class,
        ],
        RequestUserInfo::class =>[
            RequestUserInfoListener::class
        ],
        OrderStatusUpdatedByAgentEvent::class =>[
            OrderStatusUpdatedByAgentListener::class,
        ],
        NewDropoffAcceptedByAgentEvent::class =>[
            NewDropoffAcceptedByAgentListener::class,
        ],
        AgentReciveNewOrderFromInStoreUserEvent::class =>[
            AgentReciveNewOrderFromInStoreUserListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}