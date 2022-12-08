@include('layouts.dashup')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-1">
                <h6>Feedback Table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-1">
                    {!! $dataTable->table(['class' => 'table table-bordered']) !!}
                    {!! $dataTable->scripts() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.dashdown')


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



        var user_id;

        $(document).on('click', '.delete', function() {
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function() {
            $.ajax({
                url: "feedbackdestroy/" + user_id,
                beforeSend: function() {
                    $('#ok_button').text('Deleting...');
                },
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
