@if(session()->has('success-notice'))
    <div class="alert alert-success mt-4" role="alert">
        {{ session('success-notice') }}
    </div>
@endif

@if(session()->has('info-notice'))
    <div class="alert alert-info mt-4" role="alert">
        {{ session('info-notice') }}
    </div>
@endif

@if(session()->has('danger-notice'))
    <div class="alert alert-danger mt-4" role="alert">
        {{ session('danger-notice') }}
    </div>
@endif
