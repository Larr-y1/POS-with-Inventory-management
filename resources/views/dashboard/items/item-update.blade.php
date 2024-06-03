@extends('dashboard.partials.layout')
@section('content')

    <h2>Edit item</h2>
    <h4 style="color: grey">Fill in the form below to continue</h4><br>
    

    <section class="contain">
      <form action="{{route('dashboard.item-update.submit', $item->id)}}" class="form" method="POST">
        @csrf
       @method('PUT') 


        <div class="input-box">
            <label>Barcode</label>
            <input type="text"   name="barcode" value="{{$item->barcode}}"/>
          </div>

        <div class="input-box">
          <label>Item Name *</label>
          <input type="text"   name="name" value="{{$item->name}}"/>
        </div>
        
        <div class="input-box">
            <label>Item Type *</label>
            <select name="item_type">
                <option value="{{$item->item_type}}" selected>{{$item->item_type}}</option>
                <option value="product">Physical Products</option>
                <option value="service">Services</option>
            </select>
          </div>
          <div class="input-box">
            <label>Category *</label>
            <select  name="category_id">
                <option value="{{$item->category_id}}">{{$item->category->name}}</option>
             <option value=""></option>
            </select>
          </div>
       
          <div class="input-box">
            <label>Purchasing Price *</label>
            <input type="number" placeholder="0"  name="purchase_price" value="{{$item->purchase_price}}"/>
          </div>
          
        <div class="input-box">
            <label>Selling Price *</label>
            <input type="number" placeholder="0"  name="selling_price" value="{{$item->selling_price}}"/>
          </div>

          <div class="gender-box">
            <div class="gender-option">
              <div class="gender">
                <input type="radio" id="check-male" name="track_inventory" checked  />
                <label for="check-male">Track inventory?</label>
              </div>
            </div>
          </div>

          <div class="input-box">
            <label>Quantity </label>
            <input type="number" placeholder="0"  name="quantity" value="{{$item->quantity}}"/>
          </div>

          <div class="input-box">
            <label>Low stock count </label>
            <input type="number" placeholder="0"  name="low_stock_count" value="{{$item->low_stock_count}}"/>
          </div>
          
        <div class="input-box">
            <label>SKU </label>
            <input type="text"  name="sku" value="{{$item->sku}}"/>
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
            <input type="file"  name="image" />
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