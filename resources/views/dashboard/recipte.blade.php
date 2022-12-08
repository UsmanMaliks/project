@include('layouts.app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Subscription Form') }}</div>

                <div class="card-body">

                    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-4">Dashboard</a>
                    <a href="{{ $paidbill }}" rel="noopener noreferrer" target="_blank" class="btn btn-primary mt-4">Receipt</a>
                </div>
            </div>
        </div>
    </div>
</div>
