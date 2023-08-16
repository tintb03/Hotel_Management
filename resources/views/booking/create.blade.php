
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Đặt Phòng') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">

                        <div class="form-group row">
                            <label for="orderer" class="col-md-4 col-form-label text-md-right">{{ __('Người Đặt') }}</label>

                            <div class="col-md-6">
                                <input id="orderer" type="text" class="form-control @error('orderer') is-invalid @enderror" name="orderer" value="{{ old('orderer') }}" required autocomplete="orderer" autofocus>

                                @error('orderer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Số Điện Thoại') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đặt Phòng') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
/* Reset CSS */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* Global Styles */
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #f4f4f4;
  color: #333;
  font-size: 16px;
  line-height: 1.6;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.card {
  width: 100%;
  max-width: 600px;
  background-color: #fff;
  border: 1px solid #e0e0e0;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  padding: 30px;
  margin: 20px;
}

.card-header {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.form-label {
  font-weight: bold;
  margin-bottom: 5px;
  display: block;
}

.form-control {
  width: 100%;
  padding: 10px;
  border: 1px solid #e0e0e0;
  border-radius: 5px;
  transition: border-color 0.3s;
}

.form-control:focus {
  border-color: #007bff;
}

.invalid-feedback {
  color: #dc3545;
  font-size: 14px;
}

.btn-primary {
  background-color: #007bff;
  border: none;
  padding: 10px 20px;
  color: #fff;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s;
}

.btn-primary:hover {
  background-color: #0056b3;
}

/* Media Queries */
@media screen and (max-width: 768px) {
  .container {
    padding: 20px;
  }
}

</style>