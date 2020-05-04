    <script>

        $(document).on('click', '.confirm-delete', function (event) {
            event.preventDefault();
            confirmDelete(this);
        });


        function confirmDelete(data) {
            var element = $(data);
            var url = element.data('url');
            var confirm_message = element.data('message');
            var isRequiredReload = element.data('reload') === true;
            Swal.fire({
                title: 'Are you sure?',
                text: confirm_message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    console.log(url);
                    $.ajax({
                        type: "delete",
                        url: url,
                        success: function (response) {
                            console.log(response);
                            $('.buttons-reload').click();
                            Swal.fire({
                                title: 'Deleted!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.value) {
                                    if (isRequiredReload) {
                                        location.reload(true);
                                    }
                                }
                            });
                        },
                        fail: function (response) {
                            console.log('fail');
                        },
                        error: function (response) {
                            console.log(response)
                            if (response.status === 403) {
                                Swal.fire({
                                    title: 'You do not have permission to delete!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                })
                            }
                        }
                    });
                }
            })
        }

    </script>
