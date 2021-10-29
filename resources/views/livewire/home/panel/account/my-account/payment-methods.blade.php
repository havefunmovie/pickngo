<div>

    <table class="table table-striped mt-3">
        <tr>
            <th>
                ID
            </th>
            <th>
                Name
            </th>
            <th>
                Card Type
            </th>
            <th>
                CVD
            </th>
            <th class="text-center">
                <a href="{{ route('home.account.payment-methods.create') }}" class="btn btn-sm btn-outline-success py-0">
                    <i class="mdi mdi-plus"></i> {{ __('Add Card') }}
                </a>
            </th>
        </tr>
        @if ($methods)
            @foreach($methods as $method)
                <tr>
                    <td>{{ $method['id'] }}</td>
                    <td>{{ $method['name_of_card'] }}</td>
                    <td>{{ $method['credit_card'] }}</td>
                    <td>{{ $method['cvd_code'] }}</td>
                    <td class="text-center">
                        <a href="{{ route('home.account.payment-methods.edit', $method['id']) }}" class="btn btn-sm btn-outline-success">
                            <i class="mdi mdi-pencil"></i> 
                        </a>
                        &nbsp;
                        <button class="btn btn-sm btn-outline-danger" wire:click="delete_notification({{ $method['id'] }})"><i class="mdi mdi-delete"></i></button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-secondary text-center">
                    {{ __('There is no any Card yet!') }}
                </td>
            </tr>
        @endif
    </table>

    <!-- delete notification pupup -->
    <div id="delete_notification" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white" id="myModalLabel">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body text-center">
                    <button class="btn btn-danger m-1 mx-md-5" wire:click="delete({{ $cardId }})"">
                        <i class="mdi mdi-delete"></i>
                        delete
                    </button>
                    <button class="mx-md-5 close">
                        cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // information event
        window.addEventListener('delete_notification', event => {
            $("#delete_notification").modal("show");
        });

        window.addEventListener('delete', event => {
            $("#delete_notification").modal("hide");
        });

        $(document).ready(function() {
            $('.close').click(function () {
                $("#delete_notification").modal("hide");
            });
        });
    </script>
</div>
