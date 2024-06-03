@extends('dashboard.partials.layout')
@section('content')


<h2>Add Category</h2>
<h4 style="color: grey">Fill in the form below to continue</h4><br>


<section class="contain">
  <form action="{{route('dashboard.category-create.submit')}}" class="form" method="POST">
    @csrf

    <div class="input-box">
      <label> Name *</label>
      <input type="text"   name="name"/>
    </div>


    <div class="input-box">
        <label> Description </label>
        <textarea name="description"  cols="30" rows="3"></textarea>
      </div>
    <button>Submit</button>
  </form>
</section>

@endsection