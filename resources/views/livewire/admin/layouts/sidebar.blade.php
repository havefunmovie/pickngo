<div>
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    @if(auth()->user()->level === 'agent')
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Services</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('agent.index') }}" aria-expanded="false"><i class="mdi mdi-home-variant"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('agent.notification.index') }}" aria-expanded="false"><i class="mdi mdi-bell-ring"></i><span class="hide-menu">Notifications</span>
                            @if (auth()->user()->unreadNotifications->count())
                            <span style="background: whitesmoke;color: #2862ff;padding: 4px 10px;border-radius: 100%;width: 30px;" class="ml-4"> {{ auth()->user()->unreadNotifications->count() }}</span> 
                        @endif</a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Services</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{ route('agent.drop-off.index') }}" class="sidebar-link"><i class="mdi mdi-briefcase-download"></i><span class="hide-menu"> Drop-off </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('agent.print-receipt.index') }}" class="sidebar-link"><i class="mdi mdi-briefcase-download"></i><span class="hide-menu"> Print-receipt </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('agent.parcel.index') }}" class="sidebar-link"><i class="mdi mdi-package"></i><span class="hide-menu"> Parcels </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('agent.envelop.index') }}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> Envelops </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('agent.scanning.index') }}" class="sidebar-link"><i class="mdi mdi-scanner"></i><span class="hide-menu"> Scanning </span>&nbsp; @if($ScanningNotification)<span class="ml-4" style="background: whitesmoke;color: #2862ff;padding: 4px 10px;border-radius: 100%;width: 30px;">{{ $ScanningNotification }}</span>@endif</a></li>
                                <li class="sidebar-item"><a href="{{ route('agent.printing.index') }}" class="sidebar-link"><i class="mdi mdi-printer"></i><span class="hide-menu"> Printing </span>&nbsp; @if($PrintingNotification)<span class="ml-4" style="background: whitesmoke;color: #2862ff;padding: 4px 10px;border-radius: 100%;width: 30px;"> {{ $PrintingNotification }}</span>@endif</a></li>
                                <li class="sidebar-item"><a href="{{ route('agent.faxing.index') }}" class="sidebar-link"><i class="mdi mdi-fax"></i><span class="hide-menu"> Faxing </span>&nbsp; @if($FaxingNotification)<span class="ml-4" style="background: whitesmoke;color: #2862ff;padding: 4px 10px;border-radius: 100%;width: 30px;"> {{ $FaxingNotification }}</span>@endif</a></li>
                                <li class="sidebar-item"><a href="{{ route('agent.mailbox.index') }}" class="sidebar-link"><i class="mdi mdi-mailbox"></i><span class="hide-menu"> Mailbox </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('agent.users.index') }}" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Users</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('agent.invoices') }}" aria-expanded="false"><i class="mdi mdi-wallet"></i><span class="hide-menu">Invoices</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('agent.withdraws') }}" aria-expanded="false"><i class="mdi mdi-coin"></i><span class="hide-menu">Withdraw</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('agent.bank-info.index') }}" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">Bank Info</span></a></li>
                        
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Extra</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">My Account</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                               <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('agent.profile.index') }}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Profile</span></a></li>
{{--                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('agent.settings.index') }}" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">API Settings</span></a></li>--}}
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('agent.payment.index') }}" aria-expanded="false"><i class="mdi mdi-credit-card"></i><span class="hide-menu">Payment Methods</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('agent.address-book.index') }}" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">Address Book</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li>
                    @else
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Admin Accessibility</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.index') }}" aria-expanded="false"><i class="mdi mdi-home-variant"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.users.index') }}" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Users</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.drivers.index') }}" aria-expanded="false"><i class="mdi mdi-truck"></i><span class="hide-menu">Drivers</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Services</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{ route('admin.orders.parcel.index') }}" class="sidebar-link"><i class="mdi mdi-package"></i><span class="hide-menu"> Parcels </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('admin.orders.envelop.index') }}" class="sidebar-link"><i class="mdi mdi-email"></i><span class="hide-menu"> Envelops </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('admin.orders.scanning.index') }}" class="sidebar-link"><i class="mdi mdi-scanner"></i><span class="hide-menu"> Scanning </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('admin.orders.printing.index') }}" class="sidebar-link"><i class="mdi mdi-printer"></i><span class="hide-menu"> Printing </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('admin.orders.faxing.index') }}" class="sidebar-link"><i class="mdi mdi-fax"></i><span class="hide-menu"> Faxing </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('admin.orders.mailbox.index') }}" class="sidebar-link"><i class="mdi mdi-mailbox"></i><span class="hide-menu"> Mailbox </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('admin.orders.pickupAndDelivery.index') }}" class="sidebar-link"><i class="mdi mdi-archive"></i><span class="hide-menu"> Pickup & delivery </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-crown"></i><span class="hide-menu">Agents Management</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.agents.index') }}" aria-expanded="false"><i class="mdi mdi-store-24-hour"></i><span class="hide-menu">Agents</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.owner.index') }}" aria-expanded="false"><i class="mdi mdi-account-box"></i><span class="hide-menu">Agents Owner</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.payments.index') }}" aria-expanded="false"><i class="mdi mdi-credit-card"></i><span class="hide-menu">Payments</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.invoices.index') }}" aria-expanded="false"><i class="mdi mdi-wallet"></i><span class="hide-menu">Invoices</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.withdraws.index') }}" aria-expanded="false"><i class="mdi mdi-coin"></i><span class="hide-menu">Withdraw</span></a></li>

                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Extra</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">My Account</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.settings.api-key.index') }}" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">API Settings</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.settings.index') }}" aria-expanded="false"><i class="mdi mdi-bullhorn"></i><span class="hide-menu">Services Price</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li>
                    @endif
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
</div>
