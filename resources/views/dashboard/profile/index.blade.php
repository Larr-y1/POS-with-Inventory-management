@extends('dashboard.partials.layout')
@section('content')

<h2>Profile Details</h2>
<h4 style="color: grey">Fill in the form below to continue</h4><br>

<section class="contain">
    @foreach ($profiles as $profile)
    <form action="{{route('dashboard.profile.update', $profile->id)}}" class="form" method="POST">
      @csrf
      @method('PUT')
      
      <div class="input-box">
        <label> Firstname <span style="color: red">*</span></label>
        <input type="text"   name="first_name" value="{{$profile->first_name}}"  />
      </div>
      <div class="input-box">
          <label> Lastname <span style="color: red">*</span></label>
          <input type="text"   name="last_name" value="{{$profile->last_name}}"/>
      </div>
        </div>
        <div class="input-box">
          <label> Phone Number <span style="color: red">*</span></label>
          <input type="text"   name="phone_number" value="{{$profile->phone_number}}"/>
        </div>
        <div class="input-box">
          <label> Email <span style="color: red">*</span></label>
          <input type="email"   name="email" value="{{$profile->email}}"/>
        </div>
        <div class="input-box">
            <label> Date of birth <span style="color: red">*</span></label>
            <input type="date"   name="date_of_birth" value="{{$profile->date_of_birth}}"/>
          </div>
          <div class="input-box">
            <label> Gender <span style="color: red">*</span></label>
          <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="gender" >  
            <option value="{{$profile->gender}}"></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            </div>
          </select>
          <div class="input-box">
            <label> National Id <span style="color: red">*</span></label>
            <input type="number"   name="national_id" value="{{$profile->national_id}}"/>
          </div>     
        
      <button>Update Details</button>
    </form>
  @endforeach
  </section>

@endsection
