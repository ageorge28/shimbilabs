<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ShimBi Labs Responses</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/717cc04cff.js"></script>
</head>

<body>
    <div class="container">
        <br />
        @yield('content')
        <br />
    </div>

</body>

</html>


<script>
    var SITEURL = '{{ URL::to('') }}';
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#laravel_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("home") }}',
                type: 'GET',
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    'visible': false
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false
                },
                {
                    data: 'first_name',
                    name: 'first_name',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'last_name',
                    name: 'last_name',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'email',
                    name: 'email'

                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    title: 'Submitted Date',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
        /*  When user click add user button */
        $('#create-new-response').click(function() {
            $('#btn-save').val("create-response");
            $('#response_id').val('');
            $('#responseForm').trigger("reset");
            $('#responseModal').html("Add New Response");
            $('#ajax-response-modal').modal('show');
            $('#modal-preview').attr('src', 'https://via.placeholder.com/150');
        });
        /* When click edit user */
        $('body').on('click', '.edit-response', function() {
            var response_id = $(this).data('id');
            $.get('/' + response_id + '/edit', function(data) {
                $('#first_name-error').hide();
                $('#last_name-error').hide();
                $('#email-error').hide();
                $('#mobile-error').hide();
                $('#talk_title-error').hide();
                $('#image-error').hide();
                $('#responseModal').html("Edit Response");
                $('#btn-save').val("edit-response");
                $('#ajax-response-modal').modal('show');
                $('#response_id').val(data.id);
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#email').val(data.email);
                $('#mobile').val(data.mobile);
                $('#talk_title').val(data.talk_title);
                $('#modal-preview').attr('alt', 'No image available');
                if (data.image) {
                    $('#modal-preview').attr('src', SITEURL + 'public/uploads/' + data.image);
                    $('#hidden_image').attr('src', SITEURL + 'public/upalods/' + data.image);
                }
            })
        });
        $('body').on('click', '#delete-response', function() {
            var response_id = $(this).data("id");
            if (confirm("Are You sure want to delete !")) {
                $.ajax({
                    type: "get",
                    url: SITEURL + "/delete/" + response_id,
                    success: function(data) {
                        var oTable = $('#laravel_datatable').dataTable();
                        oTable.fnDraw(false);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
    });
    // $('body').on('submit', '#responseForm', function(e) {
    //     e.preventDefault();
    //     var actionType = $('#btn-save').val();
    //     $('#btn-save').html('Sending..');
    //     var formData = new FormData(this);
    //     $.ajax({
    //         type: 'POST',
    //         url: SITEURL + "/store",
    //         data: formData,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         success: (data) => {
    //             $('#responseForm').trigger("reset");
    //             $('#ajax-response-modal').modal('hide');
    //             $('#btn-save').html('Save Changes');
    //             var oTable = $('#laravel_datatable').dataTable();
    //             oTable.fnDraw(false);
    //         },
    //         error: function(data) {
    //             $('#first_name-error').show(data.errors);
    //             console.log('Error:', data);
                
    //             $('#btn-save').html('Save Changes');
    //         }
    //     });
    // });

</script>
