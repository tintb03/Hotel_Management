<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">

    <meta name="apple-mobile-web-app-title" content="CodePen">

  <title>HomePage Booking</title>
  <link rel="stylesheet" href="{{ asset('css/mainuser.css') }}">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>

<body translate="no">
  <div class="menu-btn">
    <i class="fas fa-bars fa-2x"></i>
  </div>

  <div class="container">
    <!-- Nav -->
        <nav class="main-nav">
        <img src="https://th.bing.com/th/id/OIP.TYLb_7YmvrZf6UqddYDT5wHaEH?pid=ImgDet&rs=1" alt="Booking" class="logo">

        <ul class="main-menu">
        <li><a href="#">Hotels</a></li>
        <li><a href="#">Flights</a></li>
        <li><a href="#">Cars</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Support</a></li>
        </ul>



        <div class="login-register">
  <!-- Hiển thị tên người dùng và liên kết đăng xuất khi đã đăng nhập -->
  @if(Auth::check())
    <div class="dropdown">
      <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 34px;">
        {{ Auth::user()->name }}
      </a>
      <div class="dropdown-menu" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}">Đăng Xuất</a>
      </div>
    </div>
  @else
    <!-- Liên kết để mở modal đăng nhập -->
    <a href="#" data-toggle="modal" data-target="#loginModal">Đăng Nhập</a>
    <!-- Liên kết để mở modal đăng ký -->
    <a href="#" data-toggle="modal" data-target="#registerModal">Đăng Ký</a>
  @endif
</div>



        <ul class="right-menu">
        <li>
            <a href="#">
            <i class="fas fa-search"></i>
            </a>
        </li>
        <li>
            <a href="#">
            <i class="fas fa-shopping-cart"></i>
            </a>
        </li>
        </ul>
    </nav>




    <!-- Showcase -->
    <header class="showcase">
                <!-- <h2>Surface Deals</h2>
                <p>
                    Select Surfaces are on sale now - save while supplies last
                </p>
                <a href="#" class="btn">
                    Shop Now <i class="fas fa-chevron-right"></i>
                </a> -->
    </header>

    <!-- Home cards 1 -->
    <section class="home-cards">
      <div>
        @foreach ($rooms as $room)
        <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="200">
        <h3>Room Number: {{ $room->room_number }}</h3>
        <p>
            Floor: {{ $room->floor }}<br>
            Hotel: {{ $room->hotel->Name_Hotel }}<br>
            Type Room: {{ $room->hotel->type_rooms }}<br>
            Price: {{ $room->price }}
        </p>
        <a href="{{ route('admin.manageroom.edit', $room->id) }}">Book Now <i class="fas fa-chevron-right"></i></a>
        @endforeach
      </div>
    </div>
      <!-- Footer -->
    <footer class="footer">
        <div class="footer-inner">
            <div><i class="fas fa-globe fa-2x"></i> English (United States)</div>
            <ul>
            <li><a href="#">Sitemap</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Use</a></li>
            <li><a href="#">Trademarks</a></li>
            <li><a href="#">Safety & Eco</a></li>
            <li><a href="#">About Our Ads</a></li>
            <li><a href="#">&copy; Booking 2023</a></li>
            </ul>
        </div>
    </footer>

<!-- Modal đăng nhập -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Đăng Nhập</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <label for="loginEmail">Email</label>
            <input type="email" class="form-control" id="loginEmail" name="email" required>
          </div>
          <div class="form-group">
            <label for="loginPassword">Mật Khẩu</label>
            <input type="password" class="form-control" id="loginPassword" name="password" required>
          </div>
          <div class="form-group">
            <label for="loginRole">Vai Trò</label>
            <select class="form-control" id="loginRole" name="role" required>
              <option value="admin">Admin</option>
              <option value="hoteler">Hoteler</option>
              <option value="user">User</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Đăng Nhập</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal đăng ký -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Đăng Ký</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <label for="regDisplayName">Tên Hiển Thị</label>
            <input type="text" class="form-control" id="regDisplayName" name="display_name" required>
          </div>
          <div class="form-group">
            <label for="regEmail">Email</label>
            <input type="email" class="form-control" id="regEmail" name="email" required>
          </div>
          <div class="form-group">
            <label for="regPassword">Mật Khẩu</label>
            <input type="password" class="form-control" id="regPassword" name="password" required>
          </div>
          <div class="form-group">
            <label for="regConfirmPassword">Xác Nhận Mật Khẩu</label>
            <input type="password" class="form-control" id="regConfirmPassword" name="password_confirmation" required>
          </div>
          <button type="submit" class="btn btn-success">Đăng Ký</button>
        </form>
      </div>
    </div>
  </div>
</div>




  
<!-- Thêm JavaScript của Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>