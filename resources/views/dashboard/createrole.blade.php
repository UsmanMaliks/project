@include('layouts.dashup')
<section id="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h4>Edit Role</h4>
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('addrole') }}">
                        @csrf
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" name="rolename" class="form-control" id="rolename"
                                    placeholder="Enter Unique Role Name">
                            </div>
                            @if ($errors->has('rolename'))
                            <div class="form-group">
                                <span class="text-danger">{{ $errors->first('rolename') }}</span>
                            </div>
                            @endif

                            <div class="form-group">
                                <label>Permissions</label>
                            </div>
                            <div class="form-group">
                                @foreach ($permissions as $key => $permission)
                                    <label class="m-2">
                                        <input class="m-2" type="checkbox" name="permission[]"
                                            value="{{ $permission->name }}">{{ $permission->name }}</label>
                                @endforeach
                            </div>
                            @if ($errors->has('permission'))
                                <div class="form-group">
                                <span class="text-danger">{{ $errors->first('permission') }}</span>
                                </div>
                            @endif
                            <div class="form-group">
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /# row -->
</section>



@include('layouts.dashdown')
