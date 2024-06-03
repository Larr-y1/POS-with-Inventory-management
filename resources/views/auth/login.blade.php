<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--------------- FAVICON ---------------->
    <link rel="shortcut icon" href="{{asset('assets/website/images/favicon.svg')}}" type="image/svg+xml">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="{{asset('assets/Auth/css/style.login.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Login | SingleCart Pos</title>
</head>

<body>
    <section class="main">
        <center><p class="title">Sign In</p></center>

        <center>
        <form action="{{ route('dashboard.login.submit') }}" method="post">
            @csrf
            @if (Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
          @endif
            <div class="form-control">
                <input type="text" placeholder="Email" name="email" value="{{ old('email')}}">
                <span class="text-primary">@error('email') {{$message}}@enderror</span>
                <div class="focused-border"></div>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-control">
                <input type="password" placeholder="Password" name="password">
                <span class="text-primary">@error('password') {{$message}}@enderror</span>
                <div class="focused-border"></div>
                <i class="fas fa-unlock"></i>
            </div>

            <button class="action">login</button>
        </form>
        
        <p class="register">Not a Member yet?<a href="{{route('dashboard.register')}}">Sign Up</a></p>
       </center>
    </section>


    <section class="side">
      <img src="{{asset('assets/Auth/images/At the office-rafiki.png')}}" >
      <p class="main-msg">
        Elevate Operations, Ignite Growth
      </p>
        
     <p> Empower your business with SingleCart Business Suite. Elevate operations, streamline sales,
      <br> and gain insights for growth. Experience seamless efficiency and <br>success in one comprehensive solution.</p>
    </section>

    
</body>
</html>