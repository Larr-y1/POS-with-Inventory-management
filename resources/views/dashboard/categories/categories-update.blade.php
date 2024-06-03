@extends('dashboard.partials.layout')
@section('content')


<h2>Edit Category</h2>
<h4 style="color: grey">Fill in the form below to continue</h4><br>


<section class="contain">
  <form action="{{route('dashboard.category-update.submit', $category->id)}}" class="form" method="POST">
    @csrf

    <div class="input-box">
      <label> Name *</label>
      <input type="text"   name="name" value="{{$category->name}}"/>
    </div>


    <div class="input-box">
        <label> Description </label>
        <textarea name="description"  cols="30" rows="3">{{$category->description}}</textarea>
      </div>
    <button>Submit</button>
  </form>
</section>

@endsection