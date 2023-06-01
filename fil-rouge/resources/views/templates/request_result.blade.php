@if (session()->has('error') || session()->has('errordb'))
    @include('templates.error')
@elseif (session()->has('success'))
    @include('templates.success')
@elseif (session()->has('noticket'))
    @include('templates.noticket')
@endif
