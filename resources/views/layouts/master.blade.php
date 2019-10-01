@include('layouts.header')

<body>
    <main role="main">    
        @include('layouts.errors')
        @yield('content')
    </main>
</body>
@include('layouts.footer')

   
