
@if (session()->has('success'))
    <div class="alert alert-success text-dark text-center">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('success') }}
    </div>
@endif

@if (session()->has('danger'))
    <div class="alert alert-danger text-dark text-center">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('danger') }}
    </div>
@endif

@if (session()->has('warning'))
    <div class="alert alert-warning text-dark text-center">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('warning') }}
    </div>
@endif

@if (session()->has('info'))
    <div class="alert alert-info text-dark text-center">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('info') }}
    </div>
@endif
