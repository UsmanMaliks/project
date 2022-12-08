@include('layouts.dashup')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-1">
                <h6>Agency Table</h6>
                <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create
                    Record</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="bootstrap-data-table-panel">
                <div class="table-responsive p-1">
                    {!! $dataTable->table(['class' => 'table table-bordered']) !!}
                    {!! $dataTable->scripts() !!}
                </div>
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
                        <label id="typelabel" class="control-label col-md-4">Duration in Days</label>
                        <div class="col-md-8">
                            <input type="text" name="day" id="day" class="form-control" />
                        </div>
                        <label id="rolelabel" class="control-label col-md-4">Max Person</label>
                        <div class="col-md-8" id="rolediv">
                            <input type="text" name="max_person" id="max_person" class="form-control" />
                        </div>
                        <label id="rolelabel" class="control-label col-md-4">Trip Date</label>
                        <div class="col-md-8" id="rolediv">
                            <input type="date" name="trip_date" id="trip_date" class="form-control" />
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

<script>
    $(document).ready(function() {

    $('#city_from').select2();
    $('#city_to').select2();



        $('#create_record').click(function() {
            window.location = '/createtour';
        });



        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                url: "/tour/" + id + "/edit",
                dataType: "json",
                success: function(data) {
                    window.location = 'tour/editpage/'+data.result.id;

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
                url: "tour/delete/" + user_id,

                success: function(data) {
                        setTimeout(function() {
                            $('#confirmModal').modal('hide');
                            $('#user_table').DataTable().ajax.reload();
                            alert('Data Deleted');
                        }, 2000);
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
