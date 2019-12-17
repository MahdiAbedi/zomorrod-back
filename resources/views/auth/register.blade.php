@extends('master')

@section('body')

<div class="container login-section">
          
            <!-- ورود به سایت -->
            <div class="panel">
                <h3>ورد به سایت</h3>
                <form method="POST" action="{{ route('login') }}" class="fields">
                        @csrf
                    <div class="field">
                        <label for=""> ایمیل</label>
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="field">
                        <label for="">رمز عبور</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="field">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label for="remember">مرا به خاطر بسپار</label>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn btn-green" value="ورود به سایت">
                    </div>
                    
                </form>
            </div>


            <!-- ثبت نام در سایت  -->

              <div class="panel">
                    <h3>ثبت نام در سایت</h3>
                    <form method="POST" action="{{ route('register') }}" class="fields">
                        @csrf
                        <div class="field">
                            <label for="">نام و نام خانوادگی</label>
                            <input type="text"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="field">
                            <label for="">ایمیل</label>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="field">
                            <label for="phone">شماره موبایل</label>
                            <input id="phone" type="text" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="field">
                            <label for="">رمز عبور</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="field">
                            <label for="">تکرار رمز عبور</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        </div>
                        <div class="field">
                            <input type="checkbox" name="roles" id="roles" required>
                            <label for="roles">با قوانین و مقررات ستاره زمرد موافقم *</label>
                        </div>
                        <div class="field">
                                <input type="submit" class="btn btn-green" value="ثبت نام">
                        </div>
                        
                    </form>
            </div>

        </div>
@endsection
