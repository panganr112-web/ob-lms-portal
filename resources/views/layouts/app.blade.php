<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OB-LMS | Admin Rose</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { background-color: #f8f9fc; font-family: 'Segoe UI', sans-serif; overflow-x: hidden; }
        
        #sidebar-wrapper {
            min-height: 100vh; width: 260px; margin-left: -260px;
            transition: all 0.3s ease; background: #ffffff; 
            border-right: 1px solid #e3e6f0; position: fixed; z-index: 1000;
        }
        
        #wrapper.toggled #sidebar-wrapper { margin-left: 0; }
        #page-content-wrapper { width: 100%; transition: all 0.3s; padding-left: 0; }
        
        @media (min-width: 768px) { 
            #wrapper.toggled #page-content-wrapper { padding-left: 260px; } 
        }
        
        .sidebar-header { padding: 40px 20px; text-align: center; border-bottom: 2px solid #f8f9fc; }
        .admin-name { font-weight: 800; color: #764ba2; font-size: 1.4rem; text-transform: uppercase; }
        
        .list-group-item { 
            border: none; padding: 1.2rem 2.5rem; font-weight: 700; 
            color: #5a5c69; text-transform: uppercase; text-decoration: none; display: block; 
            font-size: 0.85rem; transition: 0.2s;
        }
        
        .list-group-item:hover { background-color: #f4f0ff; color: #764ba2; }
        
        .list-group-item.active { 
            background-color: #764ba2 !important; color: white !important; 
            border-radius: 0 50px 50px 0; margin-right: 15px; 
        }

        .navbar { background: #ffffff; border-bottom: 1px solid #e3e6f0; padding: 10px 30px; }
        .navbar-title { font-weight: 700; color: #764ba2; margin-left: 15px; font-size: 1.1rem; }
        #menu-toggle { cursor: pointer; font-size: 1.6rem; color: #764ba2; font-weight: bold; text-decoration: none; }
        
        .user-profile-name { font-weight: 600; color: #5a5c69; font-size: 0.9rem; }
    </style>
</head>
<body>

<div class="d-flex" id="wrapper">
    <div id="sidebar-wrapper">
        <div class="sidebar-header">
            <div class="admin-name">ADMIN ROSE</div>
            <div class="small fw-bold text-muted" style="letter-spacing: 2px;">SYSTEM MANAGER</div>
        </div>
        <div class="list-group list-group-flush mt-3">
            <a href="/dashboard" class="list-group-item {{ request()->is('dashboard') ? 'active' : '' }}">DASHBOARD</a>
            <a href="/students" class="list-group-item {{ request()->is('students*') ? 'active' : '' }}">STUDENTS</a>
            <a href="/subjects" class="list-group-item {{ request()->is('subjects*') ? 'active' : '' }}">SUBJECTS</a>
            <a href="/assessment" class="list-group-item {{ request()->is('assessment*') ? 'active' : '' }}">ASSESSMENT</a>
            <a href="/reports" class="list-group-item {{ request()->is('reports*') || request()->is('academic-performance*') ? 'active' : '' }}">REPORTS</a>
        </div>
    </div>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid p-0 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <a id="menu-toggle">☰</a>
                    <span class="navbar-title d-none d-md-inline">Outcome-Based Learning Management System</span>
                </div>

                <div class="dropdown">
                    <button class="btn dropdown-toggle border-0 d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="user-profile-name me-2">{{ Auth::user()->username ?? 'Rose Admin' }}</span>
                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; border: 1px solid #ddd;">
                            <i class="fa-solid fa-user text-muted"></i>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" style="border-radius: 10px;">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 fw-bold text-danger">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> LOGOUT
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid p-4">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
</html>