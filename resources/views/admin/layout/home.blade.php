<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/css/bootstrap.min.css" />
<link rel="stylesheet" href="/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/css/fullcalendar.css" />
<link rel="stylesheet" href="/css/matrix-style.css" />
<link rel="stylesheet" href="/css/matrix-media.css" />
<link rel="stylesheet" href="/css/style.css" />
<link href="/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Mentor</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">{{ Auth::user()->name }}</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="{{ url('/admin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout</a></li>
      </ul>
    </li>
  </ul>
  <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
</div>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="/admin/addproduct"><i class="icon icon-home"></i> <span>Add Products</span></a> </li>
    <li><a href="/admin/users"><i class="icon icon-user"></i> <span>Manage Users</span></a> </li>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">@yield('navbar')</div>
    <h1>@yield('topcontent')</h1>
    <div class="container-fluid">
      @yield('content')
    </div>
  </div>
<!--End-breadcrumbs-->
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2018 &copy; Mentor <a href="#">ickon systems</a> </div>
</div>

<!--end-Footer-part-->

<script src="/js/excanvas.min.js"></script> 
<script src="/js/jquery.min.js"></script> 
<script src="/js/jquery.ui.custom.js"></script> 
<script src="/js/bootstrap.min.js"></script> 
<script src="/js/jquery.flot.min.js"></script> 
<script src="/js/jquery.flot.resize.min.js"></script> 
<script src="/js/jquery.peity.min.js"></script> 
<script src="/js/fullcalendar.min.js"></script> 
<script src="/js/matrix.js"></script> 
<script src="/js/matrix.dashboard.js"></script> 
<script src="/js/jquery.gritter.min.js"></script> 
<script src="/js/matrix.interface.js"></script> 
<script src="/js/matrix.chat.js"></script> 
<script src="/js/jquery.validate.js"></script> 
<script src="/js/matrix.form_validation.js"></script> 
<script src="/js/jquery.wizard.js"></script> 
<script src="/js/jquery.uniform.js"></script> 
<script src="/js/select2.min.js"></script> 
<script src="/js/matrix.popover.js"></script> 
<script src="/js/jquery.dataTables.min.js"></script> 
<script src="/js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
@yield('script')
</script>
</body>
</html>
