<!DOCTYPE html>
<head>
    <title>Laravell first app</title>
    @yield('styles')
    
</head>

<body>
    @if(session()->has('sucess'))
        <div>{{session('sucess')}}</div>
    @endif 
    <h1>@yield('title')</h1>
    <div>@yield('content')</div>
    
</body>
</html>