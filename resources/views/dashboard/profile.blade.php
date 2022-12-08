@include('layouts.dashup')
<section id="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="user-profile">
                        <div class="row">
                                <div class="col-lg-4">
                                    <div class="user-photo m-b-30">
                                        @if (auth()->user()->avatar != null)
                                        <img class="img-fluid"
                                            src="{{ asset('storage/avatar/'.Auth::user()->avatar); }}" width="600"
                                            height="519" id="output" />
                                        @else
                                        <img class="img-fluid"
                                            src="{{ asset('assets/images/user-profile.jpg') }}" width="600"
                                            height="519" id="output" />
                                        @endif

                                    </div>
                            <div class="user-work">
                                <h4>Upload Image</h4>
                                <form method="POST" action="{{ route('profile.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" id="imagebt2" name="avatar" onchange="loadFile(event)">
                                    @error('avatar')
                                        <span class="bg-danger form-control-feedback">Avatar is Required</span>
                                    @enderror
                                    <script>
                                        var loadFile = function(event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function() {
                                                URL.revokeObjectURL(output.src)
                                            }
                                        };
                                    </script>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="user-profile-name">{{ auth()->user()->name }}</div>
                            <div class="custom-tab user-profile-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="1">
                                        <div class="contact-information">
                                            <h4>Contact information</h4>
                                            <div class="phone-content m-2">
                                                <div class="form-group">
                                                    <span class="contact-title">Phone:</span>
                                                    @if (auth()->user()->phone_no != null)
                                                    <input type="text" name="phone_no"
                                                                class="form-control input-rounded"
                                                                placeholder="Enter Your phone Number" value="{{ Auth::user()->phone_no }}">
                                                        @else
                                                        <input type="text" name="phone_no"
                                                        class="form-control input-rounded"
                                                        placeholder="Enter Your phone Number" >
                                                    @endif

                                                            @error('phone_no')
                                                                <span class="bg-danger form-control-feedback">Phone Number
                                                                    Feild is Required</span>
                                                            @enderror
                                                </div>
                                            </div>
                                            <div class="address-content m-2">
                                                <div class="form-group">
                                                    <span class="contact-title">Address:</span>
                                                    @if (auth()->user()->address != null)
                                                    <input type="text" name="address" class="form-control input-rounded"
                                                        placeholder="Enter Your Address" value="{{ auth()->user()->address }}">
                                                    @else
                                                    <input type="text" name="address" class="form-control input-rounded"
                                                        placeholder="Enter Your Address" >
                                                    @endif

                                                    @error('address')
                                                        <span class="bg-danger form-control-feedback">Address Feild is
                                                            Required</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="email-content m-2">
                                                <span class="contact-title">Email:</span>
                                                <span class="contact-email">{{ auth()->user()->email }}</span>
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <button type="submit" class="btn btn-default">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /# row -->
</section>

@include('layouts.dashdown')
