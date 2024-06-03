<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <link rel="stylesheet" href="{{asset('assets/Dashboard/css/style.verification.css')}}">
   <title>Create business | SingleCart POS</title>
</head>
<body>
 
   
  <div class="login-container d-flex align-items-center justify-content-center">
    <form  class="login-form text-center" action="{{ route('dashboard.business-create.submit')}}" method="POST">
        @csrf
        
        <h2 class="mb-5 font weight -light text-uppercase">Create Business</h2>
        @if ($errors->any())
  <div class="alert alert-danger">-->
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div><br 
@endif
        
        <div class="form-group ">
          <label for="">Business name</label>
              <input type="name" class="form-control rounded-pill form-control-lg"  name="name"value="{{old('name')}}" >
              <span class="text-primary">@error('name') {{$message}}@enderror</span>
        </div>
        <div class="form-group ">
          <label for="">Description</label>
          <textarea name="" id="" cols="30" rows="4"  class="form-control rounded-pill form-control-lg"  name="description"value="{{old('description')}}"></textarea>
          <span class="text-primary">@error('description') {{$message}}@enderror</span>
    </div>
    <div class="form-group ">
      <label for="">Phone number</label>
      <input type="number" class="form-control rounded-pill form-control-lg"  name="phone_number"value="{{old('phone_number')}}" >
      <span class="text-primary">@error('phone_number') {{$message}}@enderror</span>
    </div>
    <div class="form-group ">
      <label >Email</label>
      <input type="emailr" class="form-control rounded-pill form-control-lg" name="email"value="{{old('email')}}" >
      <span class="text-primary">@error('email') {{$message}}@enderror</span>
    </div>
    <div class="form-group ">
      <label >Website</label>
      <input type="name" class="form-control rounded-pill form-control-lg" name="website"value="{{old('website')}}" >
      <span class="text-primary">@error('website') {{$message}}@enderror</span>
    </div>
    <div class="form-group "> 
      <label for="">Address</label> 
      <input type="name" class="form-control rounded-pill form-control-lg" name="address" value="{{old('address')}}" >
      <span class="text-primary">@error('address') {{$message}}@enderror</span>
    </div>
    <div class="form-group ">
      <label for="">Business-industry</label>
      <select type="name" class="form-control rounded-pill form-control-lg"  name="business_industry"value="{{old('business_industry')}}">
        <option value=""></option>
        <option value="retail">Retail Industry</option>
<!--                        <option value="hospitality">Hospitality Industry</option>-->
    </select>
      <span class="text-primary">@error('business_industry') {{$message}}@enderror</span>
    </div>
        <button type="submit" class="btn mt-5 btn-custom btn-primary btn-block text-uppercase rounded-pill btn-lg">Submit</button>
        <p class="home">
            <a href="{{ route('home')}}">Home</a>
            <a href="{{route('home') }}#about">About Us</a>
            <a href="{{route('home') }}#contact">Contact Us</a>
        </p>
      </div>
    </form>
  </div>
  @if (Session::has('message'))
  <script>
    toastr.success("{{ Session::get('success')}}");
  </script>
    
  @endif




</body>
</html>