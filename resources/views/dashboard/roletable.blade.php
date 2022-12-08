@include('layouts.dashup')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-1">
            <h6>Role Table</h6>
            <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
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


<div id="formModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add New Record</h4>
            <button id="crtcncl" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
           </div>
           <div class="modal-body">
            <span id="form_result"></span>
            <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-4" >Type : </label>
                    <div class="col-md-8">
                     <input type="text" name="type" id="type" class="form-control" />
                    </div>
                   </div>
                           <br />

                      <div class="form-group" align="center">
                       <input type="hidden" name="action" id="action" value="Add" />
                       <button type="button" id="closemybt" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <input type="hidden" name="hidden_id" id="hidden_id" />
                       {{-- <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}"/> --}}
                       <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
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
    $(document).ready(function(){


     $('#create_record').click(function(){
      $('.modal-title').text('Add Type');
      $('#type').val("");
      $('#action_button').val('Add');
      $('#action').val('Add');
      $('#form_result').html('');

      $('#formModal').modal('show');
     });



     $('#sample_form').on('submit', function(event){
      event.preventDefault();
      var action_url = '';

      if($('#action').val() == 'Add')
      {
        action_url ="";
      }

      if($('#action').val() == 'Edit')
      {
          action_url = "";
      }



      var formdata = new FormData(this);

      $.ajax({
       url: action_url,
       method:"POST",
       data:formdata,
       mimeType: "multipart/form-data",
       cache:false,
    contentType: false,
    processData: false,
       dataType:"json",
       success:function(data)
       {
        var html = '';
        if(data.errors)
        {
         html = '<div class="alert alert-danger">';
         for(var count = 0; count < data.errors.length; count++)
         {
          html += '<p>' + data.errors[count] + '</p>';
         }
         html += '</div>';
        }
        if(data.success)
        {
         html = '<div class="alert alert-success">' + data.success + '</div>';
         $('#sample_form')[0].reset();
         $('#user_table').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
       }

      });



     });

     $(document).on('click', '.edit', function(){
      var id = $(this).attr('id');
      $('#form_result').html('');
      $.ajax({
       url :"role/"+id+"/edit",
       dataType:"json",
       success:function(data)
       {
           if(data.result.id == 1)
           {
            alert('Cant Edit Super Admin');
           }
           else{
            window.location = 'role/editpage/'+data.result.id;
           }

       }
      })
     });

     var user_id;

     $(document).on('click', '.delete', function(){
      user_id = $(this).attr('id');
      $('#confirmModal').modal('show');
     });

     $('#ok_button').click(function(){
      $.ajax({
       url:"role/destroy/"+user_id,
       beforeSend:function(){
        $('#ok_button').text('Deleting...');
       },
       success:function(data)
       {
        setTimeout(function(){
         $('#confirmModal').modal('hide');
         $('#user_table').DataTable().ajax.reload();
         alert('Data Deleted');
        }, 2000);
       }
      })
     });

     $(document).on('click','#cncl_btn',function(){
         $('#confirmModal').modal('hide');
     });

     $(document).on('click','#delcncl',function(){
         $('#confirmModal').modal('hide');
     });

     $(document).on('click','#crtcncl',function(){
         $('#formModal').modal('hide');
     });

     $(document).on('click','#closemybt',function(){
         $('#formModal').modal('hide');
     });

//  $('#cncl_btn').click(function{
    //      $('#formModal').hide();
    //  });


    });



    </script>









