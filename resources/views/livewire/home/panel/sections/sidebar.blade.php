<x-slot name="styles">
    <link href="{{ asset('dist/css/icons/material-design-iconic-font/css/materialdesignicons.min.css') }}" rel="stylesheet">
</x-slot>
<ul class="nav flex-column mb-3 m-md-0 p-0">
    <li class="nav-item">
        <a href="{{ route('home.services.parcel') }}" class="nav-link link-secondary {{ in_array(Route::currentRouteName(),['home.services.parcel','home.services.envelop','home.services.scanning','home.services.printing','home.services.faxing','home.services.mailbox']) ? 'link-dark' : '' }}" aria-current="page" href="#">
            <i class="nav-item mdi mdi-24px mdi-quicktime me-2 {{ in_array(Route::currentRouteName(),['home.services.parcel','home.services.envelop','home.services.scanning','home.services.printing','home.services.faxing','home.services.mailbox']) ? 'text-pink' : '' }}"></i>
            {{ __('Quick Quote') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.quotes.parcel') }}" class="nav-link link-secondary {{ in_array(Route::currentRouteName(),['home.quotes.parcel', 'home.quotes.envelop', 'home.quotes.faxing', 'home.quotes.printing', 'home.quotes.scanning']) ? 'link-dark' : '' }}">
            <i class="nav-item mdi mdi-24px mdi-wallet-membership me-2 {{ in_array(Route::currentRouteName(),['home.quotes.parcel', 'home.quotes.envelop', 'home.quotes.faxing', 'home.quotes.printing', 'home.quotes.scanning'  ]) ? 'text-pink' : '' }}"></i>
            {{ __('Rate a Ship') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.panel.parcel-orders') }}" class="nav-link link-secondary {{ in_array(Route::currentRouteName(),['home.panel.parcel-orders', 'home.panel.envelop-orders', 'home.panel.scanning-orders', 'home.panel.printing-orders', 'home.panel.faxing-orders', 'home.panel.mailbox-orders']) ? 'link-dark' : '' }}">
            <i class="nav-item mdi mdi-24px mdi-history me-2 {{ in_array(Route::currentRouteName(),['home.panel.parcel-orders', 'home.panel.envelop-orders', 'home.panel.scanning-orders', 'home.panel.printing-orders', 'home.panel.faxing-orders', 'home.panel.mailbox-orders']) ? 'text-pink' : '' }}"></i>
            {{ __('History & Tracking') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.account.my-account') }}" class="nav-link link-secondary {{ in_array(Route::currentRouteName(),['home.account.my-account', 'home.account.edit']) ? 'link-dark' : '' }}">
            <i class="nav-item mdi mdi-24px mdi-account me-2 {{ in_array(Route::currentRouteName(),['home.account.my-account', 'home.account.edit']) ? 'text-pink' : '' }}"></i>
            {{ __('My Account') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.account.payment-methods.methods') }}" class="nav-link link-secondary {{ in_array(Route::currentRouteName(),['home.account.payment-methods.methods', 'home.account.payment-methods.create', 'home.account.payment-methods.edit']) ? 'link-dark' : '' }}">
            <i class="nav-item mdi mdi-24px mdi-credit-card me-2 {{ in_array(Route::currentRouteName(),['home.account.payment-methods.methods', 'home.account.payment-methods.create', 'home.account.payment-methods.edit']) ? 'text-pink' : '' }}"></i>
            {{ __('Payment Methods') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.account.address-book') }}" class="nav-link link-secondary {{ in_array(Route::currentRouteName(),['home.account.address-book', 'home.account.edit-address', 'home.account.create']) ? 'link-dark' : '' }}">
            <i class="nav-item mdi mdi-24px mdi-book-open-page-variant me-2 {{ in_array(Route::currentRouteName(),['home.account.address-book', 'home.account.edit-address', 'home.account.create']) ? 'text-pink' : '' }}"></i>
            {{ __('Address Book') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.account.transactions') }}" class="nav-link link-secondary {{ in_array(Route::currentRouteName(),['home.account.transactions']) ? 'link-dark' : '' }}">
            <i class="nav-item mdi mdi-24px mdi-monitor me-2 {{ in_array(Route::currentRouteName(),['home.account.transactions']) ? 'text-pink' : '' }}"></i>
            {{ __('Payments History') }}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('home.account.notifications') }}" class="nav-link link-secondary {{ in_array(Route::currentRouteName(),['home.account.notifications']) ? 'link-dark' : '' }}">
            <i class="nav-item mdi mdi-24px mdi-bell-outline me-2 {{ in_array(Route::currentRouteName(),['home.account.notifications']) ? 'text-pink' : '' }}"></i>
            {{ __('Notifications') }}
        </a>
    </li>
</ul>
