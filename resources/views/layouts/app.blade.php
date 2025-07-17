<style>
    .pagination li a,
    .pagination li span {
        font-size: 0.875rem !important; /* smaller font */
        padding: 0.25rem 0.6rem !important; /* smaller padding */
    }
</style>


<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Employee Management System  - @yield('title')</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Main CSS -->
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css" />
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
        <!-- Custom Styles -->


        @yield('styles')
    </head>
    <body class="bg-light">
<body class="bg-light">
    <div class="container-fluid">
        <!-- Sidebar on top -->
        <div class="row">
            <nav class="col-12 bg-light p-3 mb-3">
                @include('layouts.sidebar')
            </nav>
        </div>

        <!-- Main content (table, etc.) below -->
        <div class="row">
            <main class="col-12 p-3">
                @yield('content')
            </main>
        </div>
    </div>

        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- DataTables JS -->
        <script src="//cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
        <!-- Sweet alert js -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 <!-- Tailwind for styling (optional) -->
 <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">

 <!-- Alpine.js for interactivity -->
 <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


        @session('success')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endsession
        @session('error')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endsession
        @session('info')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "info",
                    title: "{{ session('info') }}",
                    showConfirmButton: false,
                    timer: 2500
                });
            </script>
        @endsession
        <!-- Custom JS -->
        @yield('scripts')
    </body>
</html>