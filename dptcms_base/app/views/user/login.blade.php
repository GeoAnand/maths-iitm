@extends('layout.main')

  @section('header-title')
      <title>Department of Mathematics | Indian Institute Of Technology Madras , Chennai</title>
  @stop

@section('content')

  <div class="row m-n">
      <div class="col-md-4 col-md-offset-4 m-t-lg">
        <section class="panel panellogin">
          <header class="panel-heading text-center dpt-text-dark h2">
            Login
          </header>
          <form class="panel-body" id="userlogin" action="{{url('authenticate_user')}}">
            <div class="form-group">
              <label class="control-label">ADS Username/Email</label>
              <input type="text" id="username" placeholder="ADS Username or Email" class="form-control" name="username" required>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember"> Keep me logged in
              </label>
            </div>
            {{-- <a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a> --}}
            <button type="submit" class="btn dpt-btn-dark">Sign in</button>
            <p class="text-muted text-center"><small class="error">Error!</small></p>
          </form>
        </section>
      </div>
    </div>
@stop

@section('footer-scripts')
  @parent
    <script type="text/javascript">
    $(document).ready(function(){
        $("#headerNavBar").css('display',"none");
        $("#userprofilelink").css('display',"none");
        $(".error").css('display',"none");
    });
    </script>
@stop
