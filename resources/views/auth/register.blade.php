@extends('layouts.layout')

@section('title')
  TeamUp! - Registro
@endsection

@section('content')
  <div class="register_img">
    <div class="container caja">
      <div class="con_fb">
        <a class="btn-solid-lg" href="{{ route('register') }}" role="button">Registrate con Facebook</a>
        <hr>
      </div>
      <form class="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="register">
        {{ csrf_field() }}
        <div class="{{ $errors->has('username') ? ' has-error' : '' }}">
          <input id="username" type="text" placeholder="Nombre de Usuario" name="username" value="{{ old('username') }}"  autofocus>
          @if ($errors->has('username'))
            <span class="errores">
              <strong>{{ $errors->first('username') }}</strong>
            </span>
          @endif
        </div>
        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
          <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
          @if ($errors->has('email'))
            <span class="errores">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
          <input id="password" type="password" name="password" placeholder="Contraseña" >
          @if ($errors->has('password'))
            <span class="errores">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
        <div class="">
          <input id="password-confirm" type="password" placeholder="Repetir Contraseña" name="password_confirmation" >
        </div>
        {{-- <div class="file_div">
          <label for="upload-photo"><img class="profile_icon" src="{{asset('storage\images\users_img\userDefault.png')}}" alt="Subí tu foto de perfil"><span class="btn-solid-sm btn_upload">SUBI TU FOTO</span></label>
          <input type="file" name="photo" id="upload-photo" />
        </div> --}}
        {{-- <div class="">
        <div class="file_div">
        <label for="photo" id="profilePic_label">Foto de Perfil</label>
        <input type="file" name="photo" value="">
      </div> --}}

      <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="file" name="photo" value="">
        @if ($errors->has('photo'))
          <span class="errores">
            <strong>{{ $errors->first('photo') }}</strong>
          </span>
        @endif
      </div>
      <div class="legals {{ $errors->has('legals') ? ' has-error' : '' }}">
        <input type="checkbox" name="legals" value="1" >
        <h6 style="color:#555555">Acepto los Términos y Condiciones del servicio.</h6>
        <hr>
        <h6>Si hacés click en "REGISTRATE CON FACEBOOK" aceptarás los <a href="#">Términos y Condiciones</a> y <a href="#">Política de Privacidad</a> de TEAMup! </h6>
        @if ($errors->has('legals'))
          <span class="errores">
            <strong>{{ $errors->first('legals') }}</strong>
          </span>
        @endif
      </div>
      <button class="btn-solid-lg" type="submit" name="button" id="register">REGISTRARME</button>
    </form>
    <div class="linkeo">
      <h6>¿Ya tienes cuenta? <a href="{{ route('login') }}" >Iniciá Sesión</a></h6>
    </div>
  </div>
</div>
</div>
@endsection
