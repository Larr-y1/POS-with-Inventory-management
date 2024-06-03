@extends('dashboard.partials.layout')
@section('content')


<h2>Add Customer</h2>
<h4 style="color: grey">Fill in the form below to continue</h4><br>


<section class="contain">
  <form action="{{route('dashboard.customer-create.submit')}}" class="form" method="POST">
    @csrf

    <div class="input-box">
      <label> Firstname *</label>
      <input type="text"   name="first_name" />
    </div>
    <div class="input-box">
        <label> Lastname *</label>
        <input type="text"   name="last_name"/>
      </div>
      <div class="input-box">
        <label> Phone Number </label>
        <input type="text"   name="phone_number"/>
      </div>
      <div class="input-box">
        <label> Email</label>
        <input type="email"   name="email"/>
      </div>
    <div class="input-box">
        <label> Notes </label>
        <textarea name="notes"  cols="30" rows="3"></textarea>
      </div>
    <button>Submit</button>
  </form>
</section>


@endsection