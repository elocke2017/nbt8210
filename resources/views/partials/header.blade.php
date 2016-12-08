<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
  
  

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  
      <a class="navbar-brand" href="{{ route('course.index') }} "> <img id="brang-image" alt="website logo" src="http://bloximages.chicago2.vip.townnews.com/kearneyhub.com/content/tncms/assets/v3/editorial/c/f2/cf2e7138-c2a4-59c9-87c5-5b93bb2cdcee/5203b9af58502.image.jpg?resize=167%2C147" height="50px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ route('course.index') }}">Course Home<span class="sr-only">(current)</span></a></li>
        {{--<li><a href="#">Our Clients</a></li>--}}
        <li><a href="{{url('/contactus')}}">Contact Us</a></li>
          </ul>

    {!! Form::open(['route' => 'course.search', 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'role' => 'search' ]) !!}
    <!--<form class="navbar-form navbar-left"> -->

      <div class="input-group">
      {!! Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search...']) !!}
      <!--<input type="text" name="term" id="term" class="form-control" placeholder="Search">-->

      </div>
      <button type="submit" class="btn btn-default">Submit</button>
      <!--</form> -->
    {!! Form::close() !!}

    @if (Auth::check())
      <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          <li><a href="{{ url('/home') }}">User Home</a></li>
          {{-- Menu for Users with Administration Role Only --}}
          @role('admin')
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              <i class="fa fa-btn fa-fw fa-cogs"></i>Administration<span class="caret"></span></a>
            <ul class="dropdown-menu multi level" role="menu">
              <li><a href="{{ url('/users') }}"><i class="fa fa-btn fa-fw fa-user"></i>Users</a></li>
              <li><a href="{{ url('/roles') }}"><i class="fa fa-btn fa-fw fa-users"></i>Roles</a></li>
              <li><a href="{{ url('/courses') }}"><i class="fa fa-btn fa-fw fa-users"></i>Courses</a></li>
              {{--<li class="divider"></li>--}}
              {{--<li><a href="{{ url('/files') }}"><i class="fa fa-btn fa-fw fa-file"></i>Files</a></li>--}}
            </ul>
          </li>
          @endrole
        </ul>
      @endif

      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="{{ route('course.shoppingCart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Shopping Cart
            <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span></a></li>


            <!-- Authentication Links -->
            @if (Auth::guest())
              {{--<li><a href="{{ url('/login') }}"><i class="fa fa-btn fa-lg fa-fw fa-sign-in"></i>Login</a></li>--}}
              <li><a href="{{ url('/login') }}">Login</a></li>
              <li><a href="{{ url('/register') }}">Register</a></li>
            @else
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ route('user.profile')}}">User Profile</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-fw fa-sign-out"></i>Logout</a></li>
                  <li><a href="{{ url('/change-password') }}"><i class="fa fa-btn fa-fw fa-lock"></i>Change Password</a></li>
                  <li class="divider"></li>
                  <li><a href="{{ url('/help') }}"><i class="fa fa-btn fa-fw fa-question-circle"></i>Help</a></li>
                </ul>
              </li>
            @endif


          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>