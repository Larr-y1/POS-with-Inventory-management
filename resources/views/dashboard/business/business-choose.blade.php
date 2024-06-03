<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <link rel="stylesheet" href="{{asset('assets/Dashboard/css/style.verification.css')}}">
   <title>Choose business | SingleCart POS</title>
</head>
<body>
 
   
  <div class="login-container d-flex align-items-center justify-content-center">
    <form  class="login-form text-center" action="{{ route('dashboard.business-session')}}" method="POST">
        @csrf
        
      <h2 class="mb-4 font weight -light text-uppercase" >Choose Business</h2>
      <h6 mb-3 font weight -light text-uppercase>Select business below to continue.</h6>

    <div class="form-group ">
        <select class="form-control rounded-pill form-control-lg" name="business_id" required>
            <option value="">Select Business</option>
            @foreach ($businesses as $business)
                <option value="{{ $business->id }}">{{ $business->name }}</option>
            @endforeach
        </select>
    </select>
      <span class="text-primary">@error('business_industry') {{$message}}@enderror</span>
    </div>
        <button type="submit" class="btn mt-5 btn-custom btn-primary btn-block text-uppercase rounded-pill btn-lg">Submit</button><br>
        
        <p class="home">
            <a href="{{route('dashboard.business-create')}}">Add new business</a>
        </p>
      </div>
    </form>
  </div>

  </body>
</html>