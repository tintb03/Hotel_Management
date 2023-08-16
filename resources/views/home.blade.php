<!DOCTYPE html>
<html lang="en">

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
    <a href="{{ route('home') }}"><img src="https://th.bing.com/th/id/OIP.TYLb_7YmvrZf6UqddYDT5wHaEH?pid=ImgDet&rs=1" alt="Booking" class="logo"></a>
      <ul class="main-menu">
      </ul>
      <div class="login-register">
        <!-- Hiển thị tên người dùng và liên kết đăng xuất khi đã đăng nhập -->
        @if(Auth::check())
        <div class="dropdown">
          <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" style="padding-right: 34px;">
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
    </nav>
    <!-- Showcase -->
    <header class="showcase">
    </header>
    <!-- Home cards 1 -->
    <h1 style="text-align: center; color:gray">Hotel List</h1>

    <div class="mb-3">
            <input type="text" id="room-search" class="form-control" placeholder="Tìm kiếm...">
        </div>

    <section class="home-cards">
      @foreach ($rooms as $room)
      <div class="card">
        <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="200">
        <h3 style="color:cornflowerblue"> {{ $room->hotel->Name_Hotel }}</h3>
        <p>
          Type Room : {{ $room->type->name_type }}<br> Room Code : {{ $room->room_code }}<br> Price:
          {{ $room->price }}<br> Address : {{ $room->hotel->detailed_address }}
        </p>
        <button class="book-now-btn" data-toggle="modal" data-target="#bookingModal">Book Now <i
            class="fas fa-chevron-right"></i></button>
        <a href="{{ route('booking.create', ['room' => $room->id]) }}" class="show-room-details"
          data-toggle="modal" data-target="#roomModal{{ $room->id }}">Detail
          Room <i class="fas fa-chevron-right"></i></a>
      </div>

      <!-- Modal Detail-->
      <div class="modal fade" id="roomModal{{ $room->id }}" tabindex="-1" aria-labelledby="roomModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="roomModalLabel">Room Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Room details content here -->
              <img src="{{ asset('storage/' . $room->image) }}" alt="Room Image" width="200">
              <h3>Hotel Name : {{ $room->hotel->Name_Hotel }}</h3>
              <p>
                Type Room : {{ $room->type->name_type }}<br> Room Code : {{ $room->room_code }}<br> Room Number :
                {{ $room->room_number }}<br> Floor: {{ $room->floor }}<br> Description: {{ $room->description }}<br>
                Price: {{ $room->price }}<br> Address : {{ $room->hotel->detailed_address }}<br>
                <a href="{{ route('booking.create', ['room' => $room->id]) }}" class="book-now-btn">Book Now <i class="fas fa-chevron-right"></i></a>
              </p>
              <!-- Additional room details can be added here -->
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </section>

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
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
      aria-hidden="true">
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
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
      aria-hidden="true">
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
                <input type="password" class="form-control" id="regConfirmPassword" name="password_confirmation"
                  required>
              </div>
              <button type="submit" class="btn btn-success">Đăng Ký</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal đặt phòng -->
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bookingModalLabel">Đặt Phòng</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('booking.store') }}">
              @csrf
              <input type="hidden" name="room_id" value="{{ $room->id }}">

              <div class="form-group">
                <label for="orderer">Người Đặt</label>
                <input id="orderer" type="text" class="form-control @error('orderer') is-invalid @enderror"
                  name="orderer" value="{{ old('orderer') }}" required autocomplete="orderer" autofocus>
                @error('orderer')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="phone_number">Số Điện Thoại</label>
                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror"
                  name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                @error('phone_number')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                  name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" class="form-control @error('message') is-invalid @enderror"
                            name="message" rows="4">{{ old('message') }}</textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Đặt Phòng</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Thêm JavaScript của Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
      $(document).ready(function() {
        // Show modal when "Detail Room" link is clicked
        $('.show-room-details').click(function() {
          var targetModalId = $(this).data('target');
          $(targetModalId).modal('show');
        });

        // Lấy thông báo từ session và hiển thị nếu có
        let successMessage = '{{ session('success')}}';
        if (successMessage !== '') {
          alert(successMessage);
        }

        // Hiển thị/ẩn khung đặt phòng khi nút "Book Now" được bấm
        $('.book-now-btn').click(function(e) {
          e.preventDefault(); // Ngăn chuyển trang khi bấm nút
          $('#bookingModal').modal('show');
        });
      });


          // JavaScript for search functionality
    const searchInput = document.getElementById('room-search');
    const cards = document.querySelectorAll('.home-cards .card');

    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();

        cards.forEach(card => {
            const cardData = card.textContent.toLowerCase();
            if (cardData.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

    </script>
  </body>
</html>
