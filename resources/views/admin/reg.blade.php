<!DOCTYPE html>
<html>
<head>
 @include('admin.partials.head', ['title'=>'Login'])
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">User Registration</p>
      @if(count($errors->all())>0)
        <div class="alert alert-danger">
          @foreach($errors->all() as $err)
              <li>{{$err}}</li>
          @endforeach
        </div>
      @endif
    @if(session('msg'))
      <div class="alert alert-success">
        Successfully Registered
      </div>
    @endif
    <form action="{{url('admin/registration')}}" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Name" name="name">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <input type="password" class="form-control" placeholder="Retype Password" name="repassword">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          {{csrf_field()}}
          <button type="submit" class="btn btn-primary btn-block btn-flat">Signup</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <!-- /.social-auth-links -->

    <a href="{{url('admin/login')}}" class="text-center">Already Account, Login Here</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
@include('admin.partials.script')
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
