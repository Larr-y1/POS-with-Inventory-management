@extends('dashboard.partials.layout')
@section('content')

    <h2>Add item</h2>
    <h4 style="color: grey">Fill in the form below to continue</h4><br>
    

    <section class="contain">
      <form action="{{route('dashboard.item-create.submit')}}" class="form" method="POST" enctype="multipart/form-data">
        @csrf
       


        <div class="input-box">
            <label>Barcode</label>
            <input type="text"   name="barcode"/>
          </div>

        <div class="input-box">
          <label>Item Name *</label>
          <input type="text"   name="name"/>
        </div>
        
        <div class="input-box">
            <label>Item Type *</label>
            <select name="item_type">
                <option value=""></option>
                <option value="product">Physical Products</option>
                <option value="service">Services</option>
            </select>
          </div>
          
        <div class="input-box">
            <label>Category *</label>
            <select  name="category_id">
             @foreach ($categories as $category)
             <option value=""></option>
             <option value="{{$category->id}}">{{$category->name}}</option>
             @endforeach   
            </select>
          </div>
          <div class="input-box">
            <label>Purchasing Price *</label>
            <input type="number" placeholder="0"  name="purchase_price"/>
          </div>
          
        <div class="input-box">
            <label>Selling Price *</label>
            <input type="number" placeholder="0"  name="selling_price"/>
          </div>

          <div class="gender-box">
            <div class="gender-option">
              <div class="gender">
                <input type="radio" id="check-male" name="track_inventory" checked />
                <label for="check-male">Track inventory?</label>
              </div>
            </div>
          </div>

          <div class="input-box">
            <label>Quantity </label>
            <input type="number" placeholder="0"  name="quantity"/>
          </div>

          <div class="input-box">
            <label>Low stock count </label>
            <input type="number" placeholder="0"  name="low_stock_count"/>
          </div>
          
        <div class="input-box">
            <label>SKU </label>
            <input type="text"  name="sku"/>
          </div>
          
        <div class="input-box">
            <label>Employee </label>
            <select name="employee_id">
                <option value=""></option>
                <option>Larry Otieno</option>
            </select>
          </div>
          <div class="input-box">
            <label>Image *<label>
            <input type="file"  name="image">
            </div>

        
        <div class="gender-box">
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="enabled" checked />
              <label for="check-male">Enabled</label>
            </div>
          </div>
        </div>
        
        <button>Submit</button>
      </form>
    </section>
 

@endsection