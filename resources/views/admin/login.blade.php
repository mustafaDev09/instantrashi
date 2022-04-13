<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Welcome Admin InstantRashi</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;                  
}
</style>
</head>
<body style="background-color:#3359FF;">
<div class="login-form pt-5">
     <form action="{{route('admin.login')}}" method="POST">
        @csrf 
        <h2 class="text-center">Admin Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control active"  name="username"  placeholder="Username" value="{{old('username')}}">
        </div>
        @if ($errors->has('username'))
           <p class="help-block text-danger"> {{ $errors->first('username') }} </p>
        @endif
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        @if ($errors->has('password'))
           <p class="help-block text-danger"> {{ $errors->first('password') }} </p>
        @endif
        <div class="form-group">
            <input type="submit" class="btn btn-warning btn-block" name="submit" id="submit" value="Log in" />
        </div>
    </form>
</div>
</body>
</html>