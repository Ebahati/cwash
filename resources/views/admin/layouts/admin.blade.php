<!DOCTYPE html>
<html lang="en">
<head>
    <title>CarLux</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
      
        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" type="text/css" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
   
</head>

<body class="sb-nav-fixed">
    @include('admin.layouts.partials.navbar')
    <div id="layoutSidenav">

    <div id="layoutSidenav_nav">
    @include('admin.layouts.partials.sidebar')
</div> 
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
           @yield('content')
                    </div>
                </main>
                @include('admin.layouts.partials.footer')
            </div>
        </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>

   
  
    
    
</body>
</html>