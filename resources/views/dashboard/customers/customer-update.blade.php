@extends('dashboard.partials.layout')
@section('content')


<h2>Edit Customer</h2>
<h4 style="color: grey">Fill in the form below to continue</h4><br>


<section class="contain">
   <form action="{{route('dashboard.customer-update.submit', $customer->id)}}" class="form" method="POST">
    @csrf
    @method('PUT')
    <div class="input-box">
        <label> Firstname *</label>
        <input type="text"   name="first_name" value="{{$customer->first_name}}"/>
      </div>
      <div class="input-box">
          <label> Lastname *</label>
          <input type="text"   name="last_name" value="{{$customer->last_name}}"/>
        </div>
        <div class="input-box">
          <label> Phone Number </label>
          <input type="text"   name="phone_number" value="{{$customer->phone_number}}"/>
        </div>
        <div class="input-box">
          <label> Email</label>
          <input type="email"   name="email" value="{{$customer->email}}"/>
        </div>
      <div class="input-box">
          <label> Notes </label>
          <textarea name="notes"  cols="30" rows="3">{{$customer->notes}}</textarea>
        </div>
      
    <button>Update details</button>
  </form>
</section>

@endsection