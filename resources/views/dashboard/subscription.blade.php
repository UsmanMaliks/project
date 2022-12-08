@include('layouts.apppay')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Subscription Form') }}</div>

                <div class="card-body">
                    <form action="{{ route('subscribe.post') }}" method="post" id="payment-form"
                        data-secret="{{ $intent->client_secret }}">
                        @csrf
                        @php( $pkgdetail= \App\Models\Tour::findOrFail($tour_id) )
                        <div class="form-row ">
                            <div class="mt-4 mb-12">
                                <div class="col-lg-12 mt-4 mb-4">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="pricing-box f-pricing-box text-center @if ($id == 1)
                                            active
                                            @endif mb-30">
                                                <div class="pricing-head s-pricing-head f-pricing-head">
                                                    <h3>Basic</h3>
                                                    <h2 class="price-count">{{ $pkgdetail->package_1 }} PKR</h2>
                                                </div>
                                                <div class="pricing-btn mt-4">
                                                    <input type="radio" name="plan" id="standard"
                                                        value="price_1KdEZvGMq2LaeuYkWlRnpO7o"
                                                        @if ($id == 1)
                                                        checked
                                                        @endif>
                                                    <label for="standard">Basic {{ $pkgdetail->package_1 }} PKR </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="pricing-box f-pricing-box text-center @if ($id == 2)
                                            active
                                            @endif mb-30">
                                                <div class="pricing-head s-pricing-head f-pricing-head">
                                                    <h3>Gold</h3>
                                                    <h2 class="price-count">{{ $pkgdetail->package_2 }} PKR</h2>
                                                </div>
                                                <div class="pricing-btn mt-4">
                                                    <input type="radio" name="plan" id="gold"
                                                        value="price_1KdEZvGMq2LaeuYkjtvd9GJh"
                                                        @if ($id == 2)
                                                        checked
                                                        @endif>
                                                    <label for="premium">Gold {{ $pkgdetail->package_2 }} PKR</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="pricing-box f-pricing-box text-center @if ($id == 3)
                                            active
                                            @endif mb-30">
                                                <div class="pricing-head s-pricing-head f-pricing-head">
                                                    <h3>Platinum</h3>
                                                    <h2 class="price-count">{{ $pkgdetail->package_3 }} PKR</h2>
                                                </div>
                                                <div class="pricing-btn mt-4">
                                                    <input type="radio" name="plan" id="premium"
                                                        value="price_1KdEZvGMq2LaeuYky1Kl8Gk0"
                                                        @if ($id == 3)
                                                        checked
                                                        @endif>
                                                    <label for="premium">Premium {{ $pkgdetail->package_3 }} PKR</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-4">
                            <div class="col-lg-6 mt-4 mb-4">
                                <label for="cardholder-name">Card Holder Name</label>
                                <input id="cardholder-name" type="text">
                            </div>
                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element" class="col-lg-4">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display Element errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        </div>

                        <input type="hidden" name="tour_id" value="{{$tour_id}}" >
                        <button class="btn btn-primary mt-4">
                            {{ __('Submit Payment') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script type="application/javascript" src="{{ asset('js/stripe.js') }}"></script>
