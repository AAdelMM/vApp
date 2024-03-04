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
    /* The side navigation menu */
.sidebar {
  z-index: 999;
  top: 56px; /* Height of the navbar */
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  
  height: 100%;
  overflow: auto;
}
.footer {
  position: fixed;
  bottom: 0;
  /*width: 50%;*/
  left:0;
  /* Other styles for footer */
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  
  background-color:rgb(40, 167, 69);
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  
  padding: 1px 16px;
  height: 1000px;
}
.col-sm-2{
  max-width:13%;
}
#addBn{
  margin-bottom:10px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     
                        <div class="d-flex justify-content-end">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm" type="submit">Search</button>
                            </form>
                        </div>

                    </div>
            </nav>
            </div>
        </div>
        <div class="row">
            <!---Sidebar-->
            <div class="col-sm-2">
                <div class="sidebar">
                    <a class="{{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                    <a class="{{ request()->is('violation_entry') ? 'active' : '' }}" href="{{ url('/violation_entry') }}">Violations entry</a>
                    <a class="{{ request()->is('violation_info') ? 'active' : '' }}" href="{{ route('violation.info') }}">Violations inform</a>
                    <a class="{{ request()->is('Calc') ? 'active' : '' }}" href="#Calc">Violations calculations</a>
                    <a class="{{ request()->is('Summary') ? 'active' : '' }}" href="#Summary">Violations summary</a>
                    <a class="{{ request()->is('driver_info') ? 'active' : '' }}" href="{{ route('driver_info.index') }}">Drivers</a>
                    <a class="{{ request()->is('vehicle_data') ? 'active' : '' }}" href="{{ route('vehicle_data.index') }}">Vehicles Data</a>
                </div>
            </div>
            <!---content --->
            <div class="col-10">
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