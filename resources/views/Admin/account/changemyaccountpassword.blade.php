@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change My Account Password</div>

                <div class="card-body">
                    <!-- Hiển thị thông tin tài khoản -->
                    <p>Name: {{ $user->name }}</p>
                    <p>Email: {{ $user->email }}</p>

                    <!-- Biểu mẫu thay đổi mật khẩu -->
                    <form method="POST" action="{{ route('admin.account.updatePassword') }}">
                        @csrf
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                        <a href="{{ route('admin.main') }}" class="btn btn-default">Back</a> <!-- Nút Back -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection