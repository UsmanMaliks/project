@include('layouts.dashup')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-1">
                <h6>User Table</h6>
                <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create
                    Record</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-1">
                    {!! $dataTable->table() !!}
                    {!! $dataTable->scripts() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.dashdown')

<div id="formModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Add New User</h4>
                <button id="crtcncl" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-md-4">Name : </label>
                        <div class="col-md-8">
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                        <label class="control-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="text" name="email" id="email" class="form-control" />
                        </div>
                        <label id="labelpass" class="control-label col-md-4">Password</label>
                        <div class="col-md-8" id="pass">
                            <input type="password" name="password" id="password" class="form-control" />
                        </div>
                        <label id="labelpass1" class="control-label col-md-4">Password Confirmation</label>
                        <div class="col-md-8" id="pass1">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" />
                        </div>
                        <label class="control-label col-md-4">Phone No</label>
                        <div class="col-md-8">
                            <input type="text" name="phone_no" id="phone_no" class="form-control" />
                        </div>
                        <label class="control-label col-md-4">Address</label>
                        <div class="col-md-8">
                            <input type="text" name="address" id="address" class="form-control" />
                        </div>
                        <label class="control-label col-md-4">Avatar</label>
                        <div class="col-md-8">
                            <input type="file" name="file" id="file" class="form-control" />
                            <input type="hidden" name="oldimage" id="oldimage" class="form-control" />
                            <input type="hidden" name="oldtype" id="oldtype" class="form-control" />
                        </div>
                        <label id="typelabel" class="control-label col-md-4">Select Type</label>
                        <div class="col-md-8" id="typediv">
                            <select name="type" id="type" class="form-control">
                                <option disabled selected> Select Type</option>
                                <option value="Customer"> Customer</option>
                                <option value="Agency"> Agency</option>
                                <option value="Manager"> Manager</option>
                            </select>
                        </div>
                        <label id="rolelabel" class="control-label col-md-4">Role</label>
                        <div class="col-md-8" id="rolediv">
                            <select name="role" id="role" class="form-control">
                                <option disabled selected>Select role</option>
                                @foreach ($role as $roles)
                                    <option value="{{ $roles->name }}">{{ $roles->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br />
                    <div class="form-group" align="center">
                        <input type="hidden" name="action" id="action" value="Add" />
                        <button type="button" id="closemybt" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        {{-- <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}"/> --}}
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning"
                            value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="formModal1" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title1" id="exampleModalLabel">Add New Record</h4>
                <button id="crtcnclclose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="form_result1"></span>
                <form method="post" id="sample_form1" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label id="changelable" class="control-label col-md-4">Approve : </label>
                        <div class="col-md-8">
                            <select id="changename" name="is_approve" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                    <br />

                    <div class="form-group" align="center">
                        <input type="hidden" name="action1" id="action1" value="Add" />
                        <button type="button" id="closemybtactive" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <input type="hidden" name="hidden_id1" id="hidden_id1" />
                        {{-- <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}"/> --}}
                        <input type="submit" name="action_button1" id="action_button1" class="btn btn-warning"
                            value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmation</h2>
                <button id="delcncl" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" id="cncl_btn" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div id="paitentmodal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Paitent Data</h4>
                <button id="crtcncl" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p>Sibi</p>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#create_record').click(function() {
            // event.preventDefault();
            // jQuery.noConflict();

            // $('#myModal').modal('show');
            $('.modal-title').text('Add New Record');
            $('#action_button').val('Add');
            $('#action').val('Add');
            $('#form_result').html('');
            $('#labelpass').show();
            $('#labelpass1').show();
            $('#pass').show();
            $('#pass1').show();
            $('#rolediv').show();
            $('#rolelabel').show();
            $('#typelabel').show();
            $('#typediv').show();
            $('#name').val("");
            $('#email').val("");
            $('#phone_no').val("");
            $('#address').val("");
            $('#type').val("Select Type");
            $('#hidden_id').val("");
            // window.$('#formModal').modal();
            $('#formModal').modal('show');
            // $('#exampleModal').modal('show')
        });



        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            var action_url = '';

            if ($('#action').val() == 'Add') {
                action_url = "{{ route('admin.adduser') }}";
            }

            if ($('#action').val() == 'Edit') {
                action_url = "{{ route('user.update') }}";
            }

            var formdata = new FormData(this);

            $.ajax({
                url: action_url,
                method: "POST",
                data: formdata,
                mimeType: "multipart/form-data",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success +
                            '</div>';
                        $('#sample_form')[0].reset();
                        $('#user_table').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                }

            });
        });

        $(document).on('click', '.active', function() {
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                url: "user/" + id + "/edit",
                dataType: "json",
                success: function(data) {
                    if (data.result.id !== 1) {
                        // $('#name').val(data.result.name);
                        $('#hidden_id1').val(id);
                        $('#changename').attr('name', 'is_active');
                        $('#changelable').text('Active');
                        $('.modal-title1').text('Active');
                        $('#action_button1').val('Activate User');
                        $('#action1').val('Edit');
                        $('#formModal1').modal('show');
                    } else {
                        alert("Cannot Edit SuperAdmin");
                    }

                }
            })
        });

        $('#sample_form1').on('submit', function(event) {
            event.preventDefault();
            var action_url1 = '';

            action_url1 = "{{ route('user.active') }}";




            var formdata = new FormData(this);

            $.ajax({
                url: action_url1,
                method: "POST",
                data: formdata,
                mimeType: "multipart/form-data",
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success +
                            '</div>';
                        $('#sample_form1')[0].reset();
                        $('#user_table').DataTable().ajax.reload();
                    }
                    $('#form_result1').html(html);
                }

            });

        });

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                url: "/user/" + id + "/edit",
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    if (data.result.id == 1) {
                        $('#rolediv').hide();
                        $('#rolelabel').hide();
                        $('#typelabel').hide();
                        $('#typediv').hide();
                    } else {
                        $('#rolediv').show();
                        $('#rolelabel').show();
                        $('#typelabel').show();
                        $('#typediv').show();
                    }
                    $('#labelpass').hide();
                    $('#labelpass1').hide();
                    $('#pass').hide();
                    $('#pass1').hide();
                    $('#name').val(data.result.name);
                    $('#email').val(data.result.email);
                    $('#phone_no').val(data.result.phone_no);
                    $('#address').val(data.result.address);
                    $('#oldimage').val(data.result.avatar);
                    $('#type').val(data.result.type);
                    $('#hidden_id').val(id);
                    $('.modal-title').text('Edit Record');
                    $('#action_button').val('Edit');
                    $('#action').val('Edit');
                    $('#formModal').modal('show');

                }
            })
        });

        $(document).on('click', '.view', function(event) {
            event.preventDefault();
            $("#paitentmodal").modal('show');
        });

        var user_id;

        $(document).on('click', '.delete', function() {
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function() {
            $.ajax({
                url: "user/destroy/" + user_id,
                beforeSend: function() {
                    $('#ok_button').text('Deleting...');
                },
                success: function(data) {
                    if (data.result.admin == "Cannot Delete Admin") {
                        setTimeout(function() {
                            $('#confirmModal').modal('hide');
                            // $('#user_table').DataTable().ajax.reload();
                            alert('Admin Cant be deleted');
                        }, 2000);
                    } else {
                        setTimeout(function() {
                            $('#confirmModal').modal('hide');
                            $('#user_table').DataTable().ajax.reload();
                            alert('Data Deleted');
                        }, 2000);
                    }


                }
            })
        });

        $(document).on('click', '#cncl_btn', function() {
            $('#confirmModal').modal('hide');
        });
        $(document).on('click', '#cncl_btn4', function() {
            $('#formModal2').modal('hide');
        });
        $(document).on('click', '#listcncl', function() {
            $('#formModal2').modal('hide');
        });

        $(document).on('click', '#delcncl', function() {
            $('#confirmModal').modal('hide');
        });

        $(document).on('click', '#crtcncl', function() {
            $('#formModal').modal('hide');
        });

        $(document).on('click', '#closemybt', function() {
            $('#formModal').modal('hide');
        });

        $(document).on('click', '#closemybtactive', function() {
            $('#formModal1').modal('hide');
        });

        $(document).on('click', '#crtcnclclose', function() {
            $('#formModal1').modal('hide');
        });


    });
</script>
