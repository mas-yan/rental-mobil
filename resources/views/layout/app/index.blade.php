<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Rental-Mobil')</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/all.min.css')}}">
    @yield('style')
</head>

<body>
    @include('layout.app.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>@yield('page-header')</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                    </div>
                </div>
            </div>
            <section class="section">
                        @yield('main')
            </section>
        </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Rental Mobil</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/mazer.js')}}"></script>
    <script src="{{asset('assets/vendors/toastify/toastify.js')}}"></script>
    <script src="{{asset('assets/vendors/fontawesome/all.min.js')}}"></script>

    @if (session()->has('success'))

    <script>
        Toastify({
            text: "{{session()->get('success')}}",
            duration: 3000,
            close:true,
            gravity:"top",
            position: "right",
            backgroundColor: "#4fbe87",
        }).showToast();
    </script>
    @elseif (session()->has('error'))

    <script>
        Toastify({
            text: "{{session()->get('error')}}",
            duration: 3000,
            close:true,
            gravity:"top",
            position: "left",
            backgroundColor: "#dd3647",
        }).showToast();
    </script>
    @endif

    @yield('script')
</body>

</html>
