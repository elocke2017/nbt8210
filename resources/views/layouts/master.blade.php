<!doctype html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>@yield('title')</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">	
 <link rel="stylesheet" href="{{URL::to('src/css/app.css')}}">
	
	@yield('styles')
    </head>
<body>

<!-- Navigation Bar -->
@include('partials.header')

<div class="container">
@yield('content')

 <style>
  form {margin: 0px;}
  ul.pagination { margin: 0px !important; }
  ul.pagination li { margin: 0px !important; padding: 0px !important }
  div.dataTables_length select { padding: 5px !important; padding-right: 15px !important; }

  /* required fields have a red border */
  .errorClass { border:  1px solid red; }

  /* remove panel bottom margin */
  .panel { margin-bottom: 0px !important;  }
  button.btn { margin-right: 1px;}

  /* menu bar */
  .dropdown-submenu { position: relative; }
  .dropdown-submenu>.dropdown-menu { top: 0; left: 100%; margin-top: -6px; margin-left: -1px;
   -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px; }

  .dropdown-submenu:hover>.dropdown-menu { display: block; }
  .dropdown-submenu>a:after { display: block; content: " "; float: right; width: 0; height: 0;
   border-color: transparent; border-style: solid; border-width: 5px 0 5px 5px; border-left-color: #ccc;
   margin-top: 5px; margin-right: -10px; }

  .dropdown-submenu:hover>a:after { border-left-color: #fff; }
  .dropdown-submenu.pull-left { float: none; }
  .dropdown-submenu.pull-left>.dropdown-menu { left: -100%; margin-left: 10px;
   -webkit-border-radius: 6px 0 6px 6px; -moz-border-radius: 6px 0 6px 6px; border-radius: 6px 0 6px 6px; }
   
   
 </style>

</div>

<!-- Scripts -->
<script   src="https://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@yield('scripts')

<!-- Footer -->
@yield('footer');

</body>
</html>