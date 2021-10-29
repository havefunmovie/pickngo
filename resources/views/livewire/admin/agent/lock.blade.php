<div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->

    <x-slot name="title">
        suspended
    </x-slot>

    <div class="error-box">
        <div class="error-body text-center">
            <img src="{{ asset('images/home/logo.png') }}">
            <h4 class="text-dark font-24">Suspended</h4>
            <div class="mt-4">
                <h3>Your account is Suspended</h3>
                <h5 class="text-muted font-medium">Please pay off your debt to continue.</h5>
                <h5 class="text-muted font-medium">Your dept is: <span class="text-red-500">{{ '$'.abs($invs['balance_value']) }}</span></h5>
            </div>
            <div class="mt-4"><i class="ti-settings font-24"></i></div>
            <div class="mt-4">
                <div id="paypal-button-container" class="mt-3"></div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <x-slot name="script">
        <script>
            // window.addEventListener('activity-detail', event => {
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        // This function sets up the details of the transaction, including the amount and line item details.
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: parseFloat({{ abs($invs['balance_value']) }} * 0.73593).toFixed(2)
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        // This function captures the funds from the transaction.
                        return actions.order.capture().then(function(details) {
                            // This function shows a transaction success message to your buyer.
                            Livewire.emit('payed', details.id, {{ abs($invs['balance_value']) }});
                        });
                    }
                }).render('#paypal-button-container');
            // });
        </script>
    </x-slot>
</div>
