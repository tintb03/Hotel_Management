<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login and Register</title>
  <!-- Thêm CSS của Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Tùy chỉnh CSS cho modal */
    .modal-dialog {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    /* Tùy chỉnh màu chữ trong form */
    label {
      color: #333;
    }

    /* Tùy chỉnh màu chữ trong modal header */
    .modal-header {
      background-color: #007bff;
      color: white;
    }

    /* Tùy chỉnh màu nút đăng nhập và đăng ký */
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }

    .btn-success:hover {
      background-color: #1e7e34;
      border-color: #1e7e34;
    }

    /* Đặt nút đăng nhập và đăng ký sang phải */
    .login-register {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 10px;
      
    }

    /* Đặt logo sang trái */
    .logo {
      margin-right: auto;
    }

    /* Kiểu chữ hoa mỹ cho chữ Booking */
    .booking-text {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      font-size: 24px;
      margin-right: 10px;
    }

    /* Dropdown styles */
    .dropdown-menu {
      min-width: auto;
      transform: translate(0, 0);
    }

    .dropdown-menu a {
      display: block;
      padding: 8px 12px;
    }
  </style>
</head>
<body>
<div class="login-register">
  <div class="logo">
    <a href="/" class="booking-text">Booking</a>
  </div>
  <!-- Hiển thị tên người dùng và liên kết đăng xuất khi đã đăng nhập -->
  @if(Auth::check())
    <div class="dropdown">
      <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="
    padding-right: 34px;
">
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
