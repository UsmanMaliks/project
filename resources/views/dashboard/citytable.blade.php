@include('layouts.dashup')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-1">
            <h6>City Table</h6>
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
