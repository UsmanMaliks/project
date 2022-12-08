@include('layouts.dashup')
<section id="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h3>Create Tour</h3>
                </div>
                <form method="POST" action="{{ route('tour.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control rounded" id="name" name="name" value="">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control rounded" id="description" name="description"
                                        value="">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City from:</label>
                                <div class="input-group">
                                    <select name="city_from" id="city_from" class="form-control rounded">
                                        <option disabled selected>Select City</option>
                                        @foreach ($citydata as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City to:</label>
                                <div class="input-group">
                                    <select name="city_to" id="city_to" class="form-control rounded">
                                        <option disabled selected>Select City</option>
                                        @foreach ($citydata as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Distance:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control rounded" id="distance" name="distance"
                                        value="">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour type:</label>
                                <div class="input-group">
                                    <select name="tour_type" id="tour_type" class="form-control rounded">
                                        <option disabled selected>Select Type</option>
                                        <option value="Family">Family Tour</option>
                                        <option value="Couple">Couple Tour</option>
                                        <option value="Single">Single Tour</option>
                                    </select>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tour Duration in Days:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control rounded" id="day" name="day" value="">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Season:</label>
                                <div class="input-group">
                                    <select name="season" id="season" class="form-control rounded">
                                        <option disabled selected>Select Season</option>
                                        <option value="Spring">Spring</option>
                                        <option value="Summer">Summer</option>
                                        <option value="Autumn">Autumn</option>
                                        <option value="Winter">Winter</option>
                                    </select>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Max person:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control rounded" id="max_person" name="max_person"
                                        value="">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image:</label>
                                <div class="input-group">
                                    <input type="file" class="form-control rounded" id="file" name="file">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trip date:</label>
                                <div class="input-group">
                                    <input type="date" class="form-control rounded" id="trip_date" name="trip_date"
                                        value="">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Package Basic Price:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control rounded" id="package_1" name="package_1">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Package V.I.P Price:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control rounded" id="package_2" name="package_2">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Package V.V.I.P Price:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control rounded" id="package_3" name="package_3">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span>
                            <i class="ti ti-save"></i>
                        </span>
                        <span class="text">Create Tour</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@include('layouts.dashdown')
<script>
    $(document).ready(function() {

        $('#city_from').select2();
        $('#city_to').select2();
    });
</script>
