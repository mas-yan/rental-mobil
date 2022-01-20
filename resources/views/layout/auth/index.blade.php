
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Rental-Mobil Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-7 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <h2 class="text-primary">Rental Mobil</h2>
            </div>
            @yield('content')
        </div>
    </div>
    <div class="col-lg-5 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
    <script src="assets/vendors/toastify/toastify.js"></script>

    @yield('script')
</body>

</html>
