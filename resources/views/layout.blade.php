<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
<style>
  .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000; /* Ensure it appears above other content */
        }
  .content {
            margin-top: 56px; /* Height of the navbar */
            padding: 15px; /* Add padding to avoid content being hidden behind the navbar */
            display: flex;
            flex-direction: column;
            /* Other styles for content */
            min-height: 100vh; /* Set minimum height to viewport height */
        }

/* Navbar links */
.navbar-nav a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}


/* Active/current link */
.navbar-nav a.active {
  background-color: rgb(40, 167, 69);
  border-radius:20px;
  color: white;
}


/* Links on mouse-over */
.navbar-nav a:hover{
  background-color: #555;
  border-radius:20px;
  color: white;
}
#main-link:hover {
  color:white;
}
.collapse.collapse {
        display: flex !important;
}

.dropdown-menu a {
  display: block;
  padding: 16px;
  text-decoration: none;
}

.dropdown-menu a:hover {
  background-color: #555;
  border-radius:20px;
  color: white;
}

</style>
</head>

<body>
    <div class="container-fluid">
        <!---navbar--->
        <div class="row">
            <div class="col-md-12 w-100 ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <a class="navbar-brand" style="color:rgb(40, 167, 69);" href="#"><strong>Violation Management System</strong></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                                <a class="nav-link" id="main-link" href="/">Home</a>
                            </li>
                            <li class="nav-item dropdown" >
                                <a class="nav-link dropdown-toggle {{ request()->is('violation_entry') || request()->is('violation_info') || request()->is('Calc') || request()->is('Summary') ? 'active' : '' }}"id="main-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Violations
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ request()->is('violation_entry') ? 'active' : '' }}" href="{{ url('/violation_entry') }}">Violations entry</a>
                                    <a class="dropdown-item {{ request()->is('violation_info') ? 'active' : '' }}" href="{{ route('violation.info') }}">Violations inform</a>
                                    <a class="dropdown-item {{ request()->is('Calc') ? 'active' : '' }}" href="#Calc">Violations calculations</a>
                                    <a class="dropdown-item {{ request()->is('Summary') ? 'active' : '' }}" href="#Summary">Violations summary</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ request()->is('Users') || request()->is('East Depot') || request()->is('Fm') || request()->is('Paul-ED OPS') ? 'active' : '' }}" id="main-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Users
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ request()->is('Users') ? 'active' : '' }}"  href="#">West Depot</a>
                                    <a class="dropdown-item {{ request()->is('West Depot') ? 'active' : '' }}"  href="#">East Depot</a>
                                    <a class="dropdown-item {{ request()->is('East Depot') ? 'active' : '' }}"  href="#">Paul-ED OPS</a>
                                    <a class="dropdown-item {{ request()->is('FM') ? 'active' : '' }}" href="#">FM</a>
                                </div>
                            </li>
                            <li class="nav-item {{ request()->is('driver_info') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('driver_info.index') }}" id="main-link">Drivers</a>
                            </li>
                            <li class="nav-item {{ request()->is('vehicle_data') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('vehicle_data.index') }}" id="main-link">Vehicles Data</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
            </nav>
            </div>
        </div>
        
        <!---content --->
        <div class="row">
            <div class="col-12">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="row">
            <div class="col-md-12">
                <footer class="footer text-center">
                    <div class="container fixed-bottom">
                        <span class="text-muted">Designed By Ahmed Adel</span>
                        <a href="https://www.linkedin.com/in/ahmedadel426/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://ecomark.live/" target="_blank"><i class="fas fa-globe"></i></a>
                    </div>
                </footer>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $("#addViolationBtn").click(function() {
                $("#addViolationForm").toggle();
            });
        });
    </script>
</body>

</html>
