@extends('dashboard.partials.layout')
@section('content')
<head>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
   <!-- Include SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<h1 class="title">Sales Center</h1>
			<ul class="breadcrumbs">
				<li><a href="#" style="text-decoration: none">Home /</a></li>
				<li><a href="#" class="active" style="text-decoration: none">LOGGED IN USER:@if (auth()->check())
                    <b>{{ strtoupper(auth()->user()->first_name) }}</b>
                    <b>{{ strtoupper(auth()->user()->last_name) }}</b>
                    @endif</a></li>
                </ul>
            
                <div class="row">                          
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <a href="{{route('dashboard.category-create')}}"  style="display: inline;" class="btn btn-sm btn-success"> Categories</a>
                        <div class="portfolioFilter">
                            @foreach ($categories as $category)
                            <a href="{{route('dashboard.category')}}" data-filter=".webdesign" style="float: left;display: inline;">{{$category->name}}</a>
                            @endforeach
                        </div>
                </div>             
                <div class="row">
                    <div class="col-lg-6">
                        {{--<div class="panel" style=" position: relative;
                        max-width: 800px;
                        width: 100%;
                        background: var(--color-white);
                        padding:25px;
                        border-radius: 8px;">
                            <h4>Customer
                                <a href="{{route('dashboard.customer-create')}}" class="btn btn-sm btn-primary" style="float: right">Add Customer</a>
                            </h4>
                            <select class="form-control">
                                @foreach ($customers as $customer)
                                <option disabled="" selected="">Select customer</option>
                                <option >{{$customer->first_name}} {{$customer->last_name}}</option> 
                                @endforeach
                            </select>
                        </div>--}}
                        <div class="price_card text-center">
                            <ul class="price-features">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Sub total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   @php
                                        $carts = Cart::content();
                                   @endphp
                                   <tbody>
                                    <tr>
                                        @foreach ($carts as $cart)
                                    <td>{{$cart->name}}</td>
                                        <td>

                                            <form action="{{route('dashboard.carts.update',$cart->rowId)}}" method="POST">
                                                @csrf
                                                <input type="number"  value="{{$cart->qty}}" style="width: 30px">
                                                <button type="submit" class="btn btn-sm btn-success" style="margin-top: -2px"><i class="fa fa-check"></i></button>
                                            </form>
                                        </td>
                                        <td>{{$cart->price}}</td>
                                        <td>{{$cart->price*$cart->qty}}</td>
                                        <td><a href="{{route('dashboard.carts.remove', $cart->rowId)}}"><i class="fa fa-trash-alt danger" aria-hidden="true" style="margin-top: -2px"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </ul>
                            <br>
                            <div class="pricing-footer bg-primary ">
                                <p style="color: white; font-size:19x"> <h6 style="color: white; float:left ">SUB AMOUNT: {{Cart::subtotal();}}</h3></p>
                                <p style="color: white; "> <h4 style="color: white;  ">Kshs{{Cart::subtotal()}}</h3></p>
                                  <p style="color: white"> <h6 style="color: white; float:left ">TOTAL AMOUNT:{{Cart::subtotal()}}</h3></p>
                                    <br>
                                    <hr style="color: white">

                            </div>
                            <form action="{{route('dashboard.sales-create')}}" method="post">
                                @csrf
                                <div class="panel" style=" position: relative;
                            max-width: 800px;
                            width: 100%;
                            background: var(--color-white);
                            padding:25px;
                            border-radius: 8px;">
                                <h4>Customer
                                    <a href="{{route('dashboard.customer-create')}}" class="btn btn-sm btn-primary" style="float: right">Add Customer</a>
                                </h4>
                                <select class="form-control" name="customer_id">
                                    @foreach ($customers as $customer)
                                    <option  selected>Select customer</option>
                                    <option value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="panel" style=" position: relative;
                            max-width: 800px;
                            width: 100%;
                            background: var(--color-white);
                            padding:25px;
                            border-radius: 8px;">
                           
                                  <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a note here" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Notes</label>
                                  </div>
                                  <br>
                                  <select id="payment_method" name="payment_method" class="form-control">
                                    <option value="" selected>Select payment method</option>
                                    <option value="cash" >Cash</option>
                                    <option value="mpesa">M-Pesa</option>
                                    <option value="pending">Credit card</option>
                                </select>
                                
                                <div id="amount_input" style="display: none;" >
                                    <label for="amount">AMOUNT TENDERED:</label>
                                    <input type="text" id="amount" name="amount" class="form-control" value="{{Cart::subtotal()}}" placeholder="Enter amount tendered">
                                </div>
                                
                                <div id="mpesa_input" style="display: none;">
                                    <label for="mpesa_reference">MPESA REFERENCE:</label>
                                    <input type="text" id="mpesa_reference" name="amount" class="form-control" placeholder="Enter mpesa amount tendered" value="{{Cart::subtotal()}}">
                                </div> <br>
                                    <select name="payment_status" class="form-control">
                                        <option value="" selected>Payment status</option>
                                        <option value="pending">Pending</option>
                                        <option value="paid">Paid</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                  </div>   
                                  <input type="hidden" name="amount_received" value="{{Cart::subtotal()}}">                          
                            
                            <button class="btn btn-primary waves-effect waves-light w-md" type="submit"><i class="fa fa-cart-plus" aria-hidden="true" > </i> Complete sale
                                </button>
                            </form>
                        </div> <!-- end Pricing_card -->
                    </div>
                  

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>  
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>   
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script> 

<script>
    new DataTable('#example');
</script>



<script>
    document.getElementById('payment_method').addEventListener('change', function () {
        var selectedOption = this.value;

        if (selectedOption === 'cash') {
            document.getElementById('amount_input').style.display = 'block';
            document.getElementById('mpesa_input').style.display = 'none';
        } else if (selectedOption === 'mpesa') {
            document.getElementById('amount_input').style.display = 'none';
            document.getElementById('mpesa_input').style.display = 'block';
        } else {
            document.getElementById('amount_input').style.display = 'none';
            document.getElementById('mpesa_input').style.display = 'none';
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>             
@endsection