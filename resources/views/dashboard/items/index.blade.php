@extends('dashboard.partials.layout')
@section('content')

<head>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Include SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>



    <h1 class="title">Item List</h1>
    <p class="text-muted">Display {{$totalItems}} search results</p>
        
        <div class="info-data" >
            <div class="bcard ">
                <div class="head">
                    <div>
                        <h2>{{$totalItems}}</h2><br>
                        <p>Total inventory</p>
                    </div>
                    <span class="material-icons-sharp" >inventory</span>
                </div>
            </div>
            <div class="bcard">
                <div class="head">
                    <div>
                        <h2>{{$itemCategories}}</h2><br>
                        <p>Item Categories</p>
                    </div>
                    <span class="material-icons-sharp" style=" background: var(--color-danger);">category</span>
                </div>
            </div>
            <div class="bcard">
                <div class="head">
                    <div>
                        <h2>{{$totalLowStockCount}}</h2><br>
                        <p>Low stock items </p>
                    </div>
                    <span class="material-icons-sharp" >speed</span>
                </div>
                
            </div>
            <div class="bcard">
                <div class="head">
                    <div>
                        <h2>{{$totalPurchasePrice}} </h2><br>
                        <p>Inventory value</p>
                    </div>
                    <span class="material-icons-sharp" style=" background: var(--color-success);">summarize</span>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            <a href="{{route('dashboard.item-create')}}"><button class="btn btn-primary me-md-2" type="button">Add Item</button></a>
        </div>

        <div class="recent-order">  
            <table style="border: 1rem" class="table table-hover">
                <thead class="table table-bordered">
                    <tr>
                        <th class="table-light">No</th>
                        <th class="table-light">SKU</th>
                        <th class="table-light">Item Name</th>
                        <th class="table-light">Item Type</th>
                        <th class="table-light">Category</th>
                        <th class="table-light">Price</th>
                        <th class="table-light">Reoder Level</th>
                        <th class="table-light">Status</th>
                        <th class="table-light">Action</th>
                    <tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                     <td>{{$loop->iteration}}</td>
                     <td>{{$item->sku}}</td>
                     <td>{{$item->name}}</td>
                     <td>{{strtoupper($item->item_type)}}</td>
                     <td>{{$item->category->name}}</td>
                     <td>{{$item->selling_price}}</td>
                     <td>{{$item->low_stock_count}}</td>
                     <td class="primary">@if ($item->enabled == '1') Enabled
                        @else
                        Disabled    
                    @endif
                     </td>
                     
                     <td  style="display: flex">
                        <a href="" class="warning" style="cursor: pointer; text-decoration:none;">Details</a>
                        <a href="{{route('dashboard.item-update', $item->id)}}" class="success" style="cursor: pointer; text-decoration:none;"  >View</a> <!-- Button trigger modal -->
                        <form id="delete-form-{{$item->id}}" action="{{route('dashboard.item-delete',$item->id)}}" method="POST" style="display: none;">
                            @csrf
                         @method('DELETE')
                      </form>
                         <a href="#" class="danger" style="text-decoration: none"  onclick="event.preventDefault();  confirmDelete({{$item->id}})" >Delete</a>                                      
                     </td>
                 </tr>
                    @endforeach
   
                </tbody>
            </table><br>
            
              {{$items->links('pagination::bootstrap-5')}}  
            
            
         </div>  
         
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to revert this item!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonColor: "#3085d6",
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes, delete it!"
                    // Submit the form for actual delete
                    document.getElementById('delete-form-'+id).submit();
                    Swal.fire({
                         title: "",
                         text: "Item has been deleted successfully.",
                         icon: "success"
    });
                } else {
                    // User clicked "No, cancel"
                    Swal.fire('Cancelled', 'Your item is safe :)', 'info');
                }
            });
        }
    </script>

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


@endsection