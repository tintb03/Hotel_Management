
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-title" content="CodePen">
  <title>Admin Dashboard</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>

<style>
header,
main,
footer {
  padding-left: 240px;
}

body {
  background-color: white;
}

@media only screen and (max-width: 992px) {
  header,
  main,
  footer {
    padding-left: 0;
  }
}

#credits li,
#credits li a {
  color: white;
}

#credits li a {
  font-weight: bold;
}



.fab-tip {
  position: fixed;
  right: 85px;
  padding: 0px 0.5rem;
  text-align: right;
  background-color: #323232;
  border-radius: 2px;
  color: #FFF;
  width: auto;
}
</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
</head>

<body translate="no">
  <head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

  <ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
      <div class="indigo darken-2 white-text" style="height: 180px;">
        <div class="row">
        <img style="margin-top: 5%; border-radius: 50%;" width="100" height="100" src="https://play-lh.googleusercontent.com/vtF2gcADW6O7qnzipftCyGOyaB4pb12bjl4sMBcZp3KOOdf8DdHUJDVx0JeNeuT7nh3A"/>

          <p style="margin-top: -13%;">
            Booking
          </p>
        </div>
      </div>
    </li>

   <li id="dash_dashboard"><a class="waves-effect" href="{{ route('admin.main') }}"><b>Dashboard</b></a></li>

    <ul class="collapsible" data-collapsible="accordion">
      <li id="dash_users">
        <div id="dash_users_header" class="collapsible-header waves-effect"><b>Quản Lý Tài Khoản</b></div>
        <div id="dash_users_body" class="collapsible-body">
          <ul>
            <li id="users_seller">
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.account.list') }}">View Account</a>
            </li>
            <li id="users_seller">
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.account.create') }}">Create Account</a>
            </li>
          </ul>
        </div>
      </li>

      <li id="dash_products">
        <div id="dash_products_header" class="collapsible-header waves-effect"><b>Quản Lý Chủ Khách Sạn</b></div>
        <div id="dash_products_body" class="collapsible-body">
          <ul>
            <li id="products_product">
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.hoteler.index') }}">View Hotelers</a>
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.hoteler.create') }}">Create Hoteler</a>
            </li>
          </ul>
        </div>
      </li>

      <li id="dash_products">
        <div id="dash_products_header" class="collapsible-header waves-effect"><b>Quản Lý Khách Sạn</b></div>
        <div id="dash_products_body" class="collapsible-body">
          <ul>
            <li id="products_product">
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.hotel.index') }}">View Hotels</a>
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.hotel.create') }}">Create Hotel</a>
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.typeroom.index') }}">View Type Rooms</a>
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.typeroom.create') }}">Create Type Room</a>
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.manageroom.index') }}">View Rooms</a>
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.manageroom.create') }}">Create Room</a>
            </li>
          </ul>
        </div>
      </li>

      <li id="dash_products">
        <div id="dash_products_header" class="collapsible-header waves-effect"><b>Quản Lý Bookings</b></div>
        <div id="dash_products_body" class="collapsible-body">
          <ul>
            <li id="products_product">
              <a class="waves-effect" style="text-decoration: none;"  href="{{ route('admin.bookings.index') }}">View Bookings</a>
            </li>
          </ul>
        </div>
      </li>


<!-- 
      <li id="dash_brands">
        <div id="dash_brands_header" class="collapsible-header waves-effect"><b>Brands</b></div>
        <div id="dash_brands_body" class="collapsible-body">
          <ul>
            <li id="brands_brand">
              <a class="waves-effect" style="text-decoration: none;" href="#!">Brand</a>
            </li>

            <li id="brands_sub_brand">
              <a class="waves-effect" style="text-decoration: none;" href="#!">Sub Brand</a>
            </li>
          </ul>
        </div>
      </li> -->

      
    </ul>
  </ul>

  <header>
    <ul class="dropdown-content" id="user_dropdown">
      <li><a class="indigo-text" href="{{ route('admin.account.changemyaccountpassword') }}">Profile</a></li>
      <li><a class="indigo-text" href="{{ route('logout') }}" onclick="event.preventDefault(); logoutConfirmation();">Logout</a></li>
    </ul>

    <nav class="indigo" role="navigation">
      <div class="nav-wrapper">
        <a data-activates="slide-out" class="button-collapse show-on-" href="#!"><img style="margin-top: 17px; margin-left: 5px;" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989873/smaller-main-logo_3_bm40iv.gif" /></a>

        <ul class="right hide-on-med-and-down">
          <li>
            <a class='right dropdown-button' href='' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
          </li>
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </nav>

    <nav>
      <div class="nav-wrapper indigo darken-2">
        <a style="margin-left: 20px;" class="breadcrumb" href="#!">Admin</a>
        <a class="breadcrumb" href="#!">Index</a>

        <div style="margin-right: 20px;" id="timestamp" class="right"></div>
      </div>
    </nav>
  </header>

                  <main style="height: 577px;">
                  @yield('content')
                  </main>
</body>

</html>
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js'></script>
      <script id="rendered-js" >
$('.button-collapse').sideNav();

$('.collapsible').collapsible();

$('select').material_select();
//# sourceURL=pen.js


    </script>

<script>
    function logoutConfirmation() {
        if (confirm('Are you sure you want to log out?')) {
            window.location.href = "{{ route('logout') }}";
        }
    }
</script>
</body>

</html>