@include('layouts.dashup')
<section id="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <h4>Edit Role</h4>
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('role.update') }}">
                        @csrf
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Role Name</label>
                                @foreach ($roledetail as $roledet)
                                    <input type="text" name="rolename" class="form-control" id="rolename"
                                        placeholder="Enter Unique Role Name" value="{{ $roledet->name }}" disabled>
                                @endforeach
                                <input type="hidden" name="hidden_id" id="hidden_id" class="form-control"
                                    value="{{ $roledet->id }}">
                                @if ($errors->has('rolename'))
                                    <span class="text-danger">{{ $errors->first('rolename') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Permissions</label>
                            </div>
                            <div class="form-group">
                                @foreach ($permissionall as $key => $permissionfe)
                                    <label class="m-2">
                                        <input class="m-2" type="checkbox" name="permission[]"
                                            @foreach ($permissions as $rolepermission) @if ($permissionfe->id == $rolepermission->id)
                                        checked="checked" @endif
                                            @endforeach
                                        value="{{ $permissionfe->name }}">
                                        {{ $permissionfe->name }}</label>
                                @endforeach
                                @if ($errors->has('permission'))
                                    <span class="text-danger">{{ $errors->first('permission') }}</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /# row -->
</section>

@include('layouts.dashdown')
