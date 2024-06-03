@extends('dashboard.partials.layout')
@section('content')

<h2>Business Settings</h2>
@foreach ($businesses as $business)
<h4 style="color: grey">{{$business->name}}</h4><br>
<button type="button" style="background: var(--color-info-light);text-decoration: none;border:none;"><h3 style="color: var(--color-primary)">Edit details</h2></button>

<section class="contain">
 
    <form action="{{route('dashboard.business-update.submit', $business->id)}}" class="form" method="POST">
      @csrf
      @method('PUT')
      
      <div class="input-box">
        <label> Name of business <span style="color: red">*</span></label>
        <input type="text"   name="name" value="{{$business->name}}"  />
      </div>
      <div class="input-box">
        <label>  Description of Business <span style="color: red">*</span></label>
        <textarea name="description"  cols="30" rows="3">{{$business->description}}</textarea>
      </div>
        </div>
        <div class="input-box">
          <label> Phone Number <span style="color: red">*</span></label>
          <input type="text"   name="phone_number" value="{{$business->phone_number}}"/>
        </div>
        <div class="input-box">
          <label> Email <span style="color: red">*</span></label>
          <input type="email"   name="email" value="{{$business->email}}"/>
        </div>
        <div class="input-box">
            <label> Address<span style="color: red">*</span></label>
            <input type="text"   name="address" value="{{$business->address}}"/>
          </div>
          
          <div class="input-box">
            <label> Website <span style="color: red">*</span></label>
            <input type="text"   name="website" value="{{$business->website}}"/>
          </div>     
        
      <button>Update Details</button>
    </form>
 
  </section>
@endforeach


@endsection