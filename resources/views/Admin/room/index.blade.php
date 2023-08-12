
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

.footer-copyright .container,
.footer-copyright .container a {
  color: #BCC2E2;
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
            Tirth Patel
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
        <div id="dash_products_header" class="collapsible-header waves-effect"><b>Quản Lý Phòng</b></div>
        <div id="dash_products_body" class="collapsible-body">
          <ul>
            <li id="products_product">
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.room.index') }}">View Rooms</a>
              <a class="waves-effect" style="text-decoration: none;" href="{{ route('admin.room.create') }}">Create Rooms</a>
            </li>
          </ul>
        </div>
      </li>



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
      </li>
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

<div class="container">
    <h2>Rooms</h2>
    <a href="{{ route('admin.room.create') }}" class="btn btn-primary">Add New Room</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hotel Name</th>
                <th>Room Code</th>
                <th>Room Number</th>
                <th>Kind of Room</th>
                <th>Floor</th>
                <th>Detailed Address</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
            <tr>
                <td>{{ $room->id }}</td>
                <td>{{ $room->hoteler ? $room->hoteler->name_hotel : 'N/A' }}</td>

                <td>{{ $room->room_code }}</td>
                <td>{{ $room->room_number }}</td>
                <td>{{ $room->kind_of_room }}</td>
                <td>{{ $room->floor }}</td>
                <td>{{ $room->detailed_address }}</td>
                <td>{{ $room->description }}</td>
                <td>
                    @if ($room->image)
                        <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="50">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $room->price }}</td>
                <td>
                    <a href="{{ route('admin.room.edit', $room->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.room.destroy', $room->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.main') }}" class="btn btn-default">Back</a> <!-- Nút Back -->
</div>


                  </main>

  <footer class="indigo page-footer">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h5 class="white-text">Icon Credits</h5>
          <ul id='credits'>
            <li>
              Gif Logo made using <a href="https://formtypemaker.appspot.com/" title="Form Type Maker">Form Type Maker</a> from <a href="https://github.com/romannurik/FORMTypeMaker" title="romannurik">romannurik</a>
            </li>
            <li>
              Icons made by <a href="https://material.io/icons/">Google</a>, available under <a href="https://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License Version 2.0</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
         <span>Made By <a style='font-weight: bold;' href="https://github.com/piedcipher" target="_blank">Tirth Patel</a></span>
      </div>
    </div>
  </footer>
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