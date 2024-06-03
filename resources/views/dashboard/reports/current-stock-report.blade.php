@extends('dashboard.partials.layout')
@section('content')

   
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


<h1 class="title">Current stock Report</h1>
<p class="text-muted">Display {{$totalItems}} search results</p>
    

<div class="container" style="background: white"> <br>
    <div class="recent-order" >
         <table class="table table-bordered">
            <thead  class="table table-bordered">
                <tr>
                    <th class="table-light" >No</th>
                    <th class="table-light">SKU </th>
                    <th class="table-light">Name</th>
                    <th class="table-light">Amount</th>                      
                    <th class="table-light">Quantity</th>
                    <th class="table-light">Total Value</th>
                    <th class="table-light">Low Stock</th>
                <tr>
            </thead>
            <tbody> 
           @foreach ($items as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->sku}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->selling_price}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->quantity*$item->purchase_price}}</td>
            <td>{{$item->low_stock_count}}</td>
          </tr>
           @endforeach
             </tbody>
        </table> 

        
     </div>  
</div>



<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to revert this customer!',
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
                     text: "Customer has been deleted successfully.",
                     icon: "success"
});
            } else {
                // User clicked "No, cancel"
                Swal.fire('Cancelled', 'Your customer is safe :)', 'info');
            }
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>    

   
 
 

@endsection

