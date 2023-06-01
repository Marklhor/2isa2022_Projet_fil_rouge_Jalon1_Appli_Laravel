@if (session()->has('error'))

    @include('templates.error')

@elseif (session()->has('errordb'))

    @include('templates.errordb')
    
@elseif (session()->has('success'))

    @include('templates.success')

@elseif (session()->has('noticket'))

    @include('templates.noticket')

@endif
