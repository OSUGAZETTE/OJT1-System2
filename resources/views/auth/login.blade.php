@extends('layouts.auth')

@section('formsubmit')
  method="post" action="{{ route('login') }}"
@endsection

@section('formtitle')
  OSU - LOGIN
@endsection

@section('formcontent')
          @if (count($errors))
              <ul>
                  @foreach($errors->all() as $error)
                  <div class="alert alert-danger" role="alert">
                    {{ $error }}
                  </div>
                  @endforeach
              </ul>
          @endif
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required">
            <input class="input100" value="{{ old('email') }}"  type="text" name="email" autocomplete="off">
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
          </div>
          
          
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" autocomplete="off">
            <span class="focus-input100"></span>
            <span class="label-input100">Password</span>
          </div>

          <div class="flex-sb-m w-full p-t-3 p-b-32">
            <div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember"
                {{ old('remember') ? 'checked' : '' }}>
              <label class="label-checkbox100" for="ckb1">
                Remember me
              </label>
            </div>

            <div>
              <a href="{{ route('password.request') }}" class="txt1">
                Forgot Password?
              </a>
            </div>
          </div>
      
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Login
            </button>
          </div>

@endsection