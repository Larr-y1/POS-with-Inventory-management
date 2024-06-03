@extends('dashboard.partials.layout')
@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<h1 class="title">Sales by Product Report</h1>
<p class="text-muted">Display {{$totalSalesItem}} search results</p>
    

<div class="container" style="background: white"> <br>
    <div class="recent-order" >
         <table class="table table-bordered">
            <thead  class="table table-bordered">
                <tr>
                    <th class="table-light" >No</th>
                    <th class="table-light">Receipt No</th> 
                    <th class="table-light">Item name</th>
                    <th class="table-light">Price</th>
                    <th class="table-light"> Quantity</th>                      
                    <th class="table-light"> Total amount</th>
                    <th class="table-light">Sold by</th>
                    <th class="table-light">Date</th>
                <tr>
            </thead>
            <tbody> 
            @foreach ($salesItems as $saleItem) 
             <tr>
                <td>No.{{$loop->iteration}}</td>
                <td class="text-primary">{{$saleItem->sales_id}}</td>
                <td >{{$saleItem->item->name}}</td>
                <td>{{$saleItem->price}}</td>
                <td>{{$saleItem->quantity}}</td>
                <td>{{$saleItem->total_amount}}</td>
                    <td>Benard Paul</td>
                <td>{{$saleItem->created_at}}</td>
                
            </tr> 
            @endforeach
             </tbody>
        </table> 

        {{$salesItems->links('pagination::bootstrap-5')}} 
        
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

