@if (session()->has('error'))
    @include('templates.error')
@elseif (session()->has('success'))
    @include('templates.success')
@endif
