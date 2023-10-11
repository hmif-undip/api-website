<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('assets/css/main/app.css')}}">

    {{-- <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.svg')}}" type="image/x-icon"> --}}
    <link rel="shortcut icon" href="{{asset(website_profile() ? website_profile()->logo : 'assets/images/logo/favicon.png')}}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/css/pages/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">

    @yield('css')
</head>

<body>
    <div class="container">
        <div class="mt-5">
            <div class="page-heading">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

    <script src="{{asset('assets/extensions/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    {{-- <script src="{{asset('assets\extensions\datatables.net-bs5\js\dataTables.bootstrap5.min.js')}}"></script> --}}
    <script src="{{asset('assets/js/pages/datatables.js')}}"></script>

    <script>
        // Set time out session success
        @if(session('success') || $errors->any())
            setTimeout(() => {
                $('.btn-close-session').trigger('click')
            }, 5000);
        @endif

        // Function for prevent double click
        function preventDoubleClick(id_form, id_button){
            $('#'+id_button).attr('disabled', true)
            $('#'+id_form).submit()
        }
    </script>

    @yield('js')

</body>

</html>

