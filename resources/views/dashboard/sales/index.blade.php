@extends('dashboard.partials.layout')
@section('content')
<head>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">     
   <!-- Include SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
 <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
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
                        <a href="{{route('dashboard.category-create')}}"  style="display: inline;" class="btn btn-lg btn-danger"> Categories</a>
                        <a href="{{route('dashboard.sales')}}"  style="display: inline;" class="btn btn-lg btn-success" id="initiateSale"><i class="fa fa-plus" aria-hidden="true"></i>
                            New sale</a>
                        <a style="color: white" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"  style="display: inline;" class="btn btn-lg btn-warning"><i class="fa fa-file" aria-hidden="true"></i>
                            Pending </a>
                </div>             
                <div class="row">
                    <div class="col-lg-6">
                        
                        <div class="price_card text-center">
                            <ul class="price-features">
                                <table class="table" id="cartTable">
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
                            <div class="pricing-footer bg-primary "  >
                                <p id="subAmount" style="color: white; font-size:19x"> <h6 style="color: white; float:left ">SUB AMOUNT: {{Cart::subtotal();}}</h3></p>
                                <p id="subAmount" style="color: white; "> <h4 style="color: white;  ">Kshs{{Cart::subtotal()}}</h3></p>
                                  <p id="subAmount" style="color: white"> <h6 style="color: white; float:left ">TOTAL AMOUNT:{{Cart::subtotal()}}</h3></p>
                                    <br>
                                    <hr style="color: white">
                            </div>
                            
                           
                            <a href="{{route('dashboard.sales-complete')}}" class="btn btn-primary waves-effect waves-light w-md"><i class="fa fa-cart-plus" aria-hidden="true" > </i> Complete sale</a>
                        </div> <!-- end Pricing_card -->
                    </div>
                    <div class="col-lg-6">
                        All products
                    <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Barcode</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($item as $row)
                               <tr>
                                <form action="{{route('dashboard.carts',$row->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$row->id}}">
                                    <input type="hidden" name="name" value="{{$row->name}}">
                                    <input type="hidden" name="qty" value="1"> 
                                    <input type="hidden" name="price" value="{{$row->selling_price}}">

                                    <td >
                                        {{--<a href="#" style="font-size: 23px"><i class="fa fa-plus-square" aria-hidden="true" style="float: left; text-align: center; "></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
                                        <img src="{{asset('storage/unilever.png')}}" width="60px" height="60px"/>
                                        </td>
                                         <td>{{$row->name}}</td>
                                         <td>{{$row->categoryName}}</td>
                                         <td>{{$row->barcode}}</td>
                                         <td><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus-square dark" aria-hidden="true" ></i></button></td>
                                     
                                </form>
                               </tr>
                               @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Barcode</th>
                                    <th>Action</th>                                   
                                </tr>
                            </tfoot>
                        </table>


                        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pending sales</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-light">No</th>
                        <th class="table-light">Receipt No</th>
                        <th class="table-light">Amount</th>
                        <th class="table-light">Customer</th>
                        <th class="table-light">Sold By</th>
                        <th class="table-light">Notes</th>
                        <th class="table-light">Date</th>
                        <th class="table-light">Action</th>
                    <tr>
                </thead>
                <tbody>
                   @foreach ($pendingSales as $pendingSale )
                   <tr>
                    <td>{{$loop->iteration}}</td> 
                   <td>{{$pendingSale->receipt_no}}</td>
                   <td>{{$pendingSale->amount}}</td>
                   <td>{{$pendingSale->customer->first_name}}{{$pendingSale->customer->last_name}}</td>
                   <td>Larry otieno</td>
                   <td>{{$pendingSale->notes}}</td>
                   <td>{{$pendingSale->created_at}}</td>
                   <td><a href=""><i class="fa fa-trash danger" aria-hidden="true"></i>
                   </a></td> 
                   </tr>
                   @endforeach
                </tbody>
              </table>
              {{$pendingSales->links('pagination::bootstrap-5')}}  

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


<script>
    new DataTable('#example');
</script>

{{--<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "searching": true, // Enable search feature
            "paging": true,    // Enable pagination (optional)
            "ordering": true,  // Enable column sorting (optional)
            "info": true       // Show table information (optional)
        });
    });
</script>--}}

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
<!-- JavaScript code -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Event listener for "Initiate Sale" button click
        document.getElementById('initiateSale').addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default behavior of the anchor tag
            
            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'This will clear the current cart and return to the sale page. Do you want to proceed?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, initiate sale!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user clicks "Yes", clear the cart table and p tags
                    clearCartTable();
                    clearPtags();
                }
            });
        });
    
        // Function to clear the cart table
        function clearCartTable() {
            // Get the cart table element
            var cartTable = document.getElementById('cartTable');
            
            // Clear all rows except the header row
            while (cartTable.rows.length > 1) {
                cartTable.deleteRow(1);
            }
        }
    
        // Function to clear the p tags
        function clearPtags() {
            var subAmount = document.getElementById('subAmount');

            // Set innerHTML to empty string
            subAmount.innerHTML = '00.00';
        }
    });
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>             
@endsection 
   
