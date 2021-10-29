<div>
    <div>
        <button class="btn btn-danger" wire:click="$emit('triggerDelete',{{ $recordId }})">
            <i class="fal fa-trash"></i>
            <span>Delete</span>
        </button>
    </div>

    @push('scripts')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
            @this.on('triggerDelete', recordId => {
                Swal.fire({
                    title: 'Are You Sure?',
                    text: 'Record will be deleted!',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Delete!'
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        // calling destroy method to delete
                    @this.call('destroy', recordId)
                        // success response
                        Swal.fire({title: 'Contact deleted successfully!', icon: 'success'});
                    } else {
                        Swal.fire({
                            title: 'Operation Cancelled!',
                            icon: 'success'
                        });
                    }
                });
            });
            })
        </script>
    @endpush
</div>
