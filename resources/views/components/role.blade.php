@if(Auth::guard('web')->check())
    <p class="text-success">You are logged is as a <strong>USER!</strong></p>
@else
    <p class="text-danger">You are <strong>NOT</strong> logged in as a USER!</p>
@endif

@if(Auth::guard('admin')->check())
    <p class="text-success">You are logged in as a <strong>ADMIN!</strong></p>
@else
    <p class="text-danger">You are <strong>NOT</strong> logged in as a ADMIN!</p>
@endif