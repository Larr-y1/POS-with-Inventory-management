<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--------------- FAVICON ---------------->
     <link rel="shortcut icon" href="{{asset('assets/website/images/favicon.svg')}}" type="image/svg+xml">
         <!--------------- FONT AWESOME -------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="{{asset('assets/Auth/css/style.register.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Create Account | SingleCart</title>
</head>

<body>
    <section class="main">
        <center><p class="title">Create Account</p></center>

        <center>
        <form action="{{ route('dashboard.register.submit') }}" method="post">
            @csrf
            <div class="form-control">
                <input type="text" placeholder="Firstname" name="first_name" value="{{ old('first_name') }}">
                <div class="focused-border"></div>
                <i class="fas fa-user"></i>
                <span class="text-danger">@error('first_name') {{$message}}@enderror</span>
            </div>
            <div class="form-control">
                <input type="password" placeholder="Lastname" name="last_name" value="{{ old('last_name') }}">
                <div class="focused-border"></div>
                <i class="fas fa-user"></i>
                <span class="text-danger">@error('last_name') {{$message}}@enderror</span>
            </div>
            <div class="form-control">
                <input type="password" placeholder="Email" name="email" value="{{ old('email') }}">
                <div class="focused-border"></div>
                <i class="fa fa-envelope"></i>
                <span class="text-danger">@error('email') {{$message}}@enderror</span>
            </div>
            <div class="form-control">
                <input type="password" placeholder="Phone Number" name="phone_number" value="{{ old('phone_number') }}">
                <div class="focused-border"></div>
                <i class="fa fa-phone"></i>
                <span class="text-danger">@error('phone_number') {{$message}}@enderror</span>
            </div>
            <div class="form-control">
                <input type="password" placeholder="Password" name="password" value="{{ old('password') }}">
                <div class="focused-border"></div>
                <i class="fas fa-unlock"></i>
                <span class="text-danger">@error('password') {{$message}}@enderror</span>
            </div>
            
                <label class="checkbox">
                    
                    I Accept the&nbsp;<a href="#" class="ms-1 link-primary"> Terms &amp; Conditions</a>
                </label>
           
            <button class="action">Sign Up</button>
        </form>
        
        <p class="register">Already have an Account?<a href="{{route('dashboard.login')}}">Sign In</a></p>
        <p class="home">
            <a href="{{ route('home')}}">Home</a>
            <a href="{{route('home') }}#about">About Us</a>
            <a href="{{route('home') }}#contact">Contact Us</a>
        </p>
       </center>
    </section>


    <section class="side">
      <img src="{{asset('assets/Auth/images/Business Plan-bro.png')}}" >
      <p class="main-msg">
        Fast, Efficient and Productive
      </p>
        
     <p> Elevate your business with SingleCart Business Suite. Seamlessly manage sales,
        <br>inventory, and customer insights. Empower growth through intuitive tools <br> and data-driven strategies. Your success, our mission
    </p>
   
    </section>
    
</body>
</html>