@if(session()->has('success-notice'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p><i class="icon fas fa-check"></i>
        {{ session('success-notice') }}
    </p>
</div>
@endif

@if(session()->has('info-notice'))
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p><i class="icon fas fa-info"></i>
        {{ session('info-notice') }}
    </p>
</div>
@endif

@if(session()->has('danger-notice'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p>
        <i class="icon fas fa-ban"></i>
        {{ session('danger-notice') }}
    </p>
</div>
@endif
