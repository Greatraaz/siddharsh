<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Admin Panel</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="icon" href="{{ asset('uploads/fav.png') }}">    <style>
        :root {
            --sidebar-width: 260px;
            --top-navbar-height: 70px;
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            --sidebar-bg: #ffffff;
            --main-bg: #f8fafc;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --soft-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--main-bg);
            color: #1e293b;
            overflow-x: hidden;
        }

        /* Sidebar */
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            background: var(--sidebar-bg);
            border-right: 1px solid #e2e8f0;
            transition: all 0.3s;
        }

        #sidebar .sidebar-header {
            height: var(--top-navbar-height);
            display: flex;
            align-items: center;
            padding: 0 25px;
            border-bottom: 1px solid #f1f5f9;
        }

        #sidebar .nav-link {
            padding: 12px 25px;
            color: #64748b;
            font-weight: 500;
            display: flex;
            align-items: center;
            border-radius: 8px;
            margin: 4px 15px;
            transition: all 0.2s;
        }

        #sidebar .nav-link:hover, #sidebar .nav-link.active {
            background: #f1f5f9;
            color: #4f46e5;
        }

        #sidebar .nav-link i {
            width: 24px;
            font-size: 18px;
            margin-right: 10px;
        }

        #sidebar .nav-link.active {
            background: var(--primary-gradient);
            color: #fff;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        /* Main Content */
        #main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s;
        }

        /* Navbar */
        #top-navbar {
            height: var(--top-navbar-height);
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* Content Area */
        .content-body {
            padding: 30px;
        }

        /* Modern Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            box-shadow: var(--soft-shadow);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid #f1f5f9;
            padding: 1.25rem;
            font-weight: 600;
        }

        /* Buttons */
        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-primary:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            #sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
            }
            #sidebar.active {
                margin-left: 0;
            }
            #main-content {
                margin-left: 0;
            }
        }

        .breadcrumb-item a {
            color: #64748b;
            text-decoration: none;
        }

        .status-toggle {
            cursor: pointer;
        }
    </style>
    @stack('css')
</head>
<body>

    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- Main Content -->
    <div id="main-content">
        <!-- Top Navbar -->
        @include('admin.layouts.navbar')

        <!-- Content Body -->
        <div class="content-body">
            @yield('content')
        </div>

        <!-- Footer -->
        @include('admin.layouts.footer')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            @if(session('success'))
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') }}"
                });
            @endif

            @if(session('error'))
                Toast.fire({
                    icon: 'error',
                    title: "{{ session('error') }}"
                });
            @endif
        });
    </script>
    @stack('js')
</body>
</html>
