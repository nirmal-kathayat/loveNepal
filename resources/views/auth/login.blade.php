
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Login</title>
    <!-- Favicon icon -->
    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    
</head>
<body>
    <div class="main-wrapper login">
        <div class="login-container">
            <div class="login-wrapper">
                <div class="logo-wrapper logo-large" style="text-align:center">
                    <img src="{{ asset('images/logo.jpg') }}" alt="logo" style="height:80px">
                </div>
                <div class="login-title">Login to continue</div>
                <div class="login-form">

                    {!! Form::open(['url'=>route('admin.login'),'class'=>'form-wrapper']) !!}
                
                    <div class="input-wrapper">
                            <label class="input-label required">Username</label>
                            {!! Form::text('name',old('name'),['class'=>'input-field','placeholder'=>'Enter username','data-validation'=>'required']) !!}
                            @if($errors->has('name'))
                                @foreach($errors->get('name') as $message)
                                    <label class="control-label red" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                                @endforeach
                            @endif
                        </div>
                        <div class="input-wrapper">
                            <label class="input-label">Password</label>
                            {!! Form::password('password',['class'=>'input-field','placeholder'=>'Enter password','data-validation'=>'required']) !!}
                            @if($errors->has('password'))
                                @foreach($errors->get('password') as $message)
                                    <label class="control-label red" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                                @endforeach
                            @endif
                        </div>
                        <div class="additional-info">
                            <div class="checkbox-wrapper">
                                <input type="checkbox" class="checkbox">
                                <span class="checkbox-label">Remember me</span>
                            </div>
                            <a class="forget-password link">Forget password</a>
                        </div>

                        <button class="btn btn--primary login-btn">Log in</button>
                        <div class="text">
                        <h3>Don't have an account? <a href="{{route('register')}}">Register now</a></h3>
                  </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
