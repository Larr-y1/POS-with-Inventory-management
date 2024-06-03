@extends('dashboard.partials.layout')
@section('content')


<head>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

 
    <h1 class="title">Customer List</h1>
    <p class="text-muted">Display {{$totalCustomers}} search results</p>
        
    <div class="info-data" >
        <div class="bcard ">
            <div class="head">
                <div>
                    <h2>{{$totalCustomersOfWeek}}</h2><br>
                    <p>Customer of this week</p>
                </div>
                <span class="material-icons-sharp" >inventory</span>
            </div>
        </div>
        <div class="bcard">
            <div class="head">
                <div>
                    <h2>{{$totalCustomersOfMonth}}</h2><br>
                    <p>Customer of this month</p>
                </div>
                <span class="material-icons-sharp" style=" background: var(--color-danger);">category</span>
            </div>
        </div>
        <div class="bcard">
            <div class="head">
                <div>
                    <h2>{{$totalCustomersOfYear}}</h2><br>
                    <p>Customer of this year </p>
                </div>
                <span class="material-icons-sharp" >speed</span>
            </div>
            
        </div>
        <div class="bcard">
            <div class="head">
                <div>
                    <h2> {{$totalCustomers}}</h2><br>
                    <p>Total Customer</p>
                </div>
                <span class="material-icons-sharp" style=" background: var(--color-success);">summarize</span>
            </div>
        </div>
    </div>

    <div class="container" > 
        <div class="recent-order" >
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 
                 <a href="{{route('dashboard.customer-create')}}"><button class="btn btn-primary me-md-2" type="button">Add Customer</button></a>
             </div>
             <table class="table table-hover">
                <thead  class="table table-bordered">
                    <tr>
                        <th class="table-light" >No</th>
                        <th class="table-light">Name</th>                       
                        <th class="table-light">Email</th>
                        <th class="table-light">Phone Number</th>
                        <th class="table-light">Notes</th>
                        <th class="table-light">Action</th>
                    <tr>
                </thead>
                <tbody> 
                @foreach ($customers as $customer) 
                 <tr>
                   
                    <td>{{$loop->iteration}}</td>
                    <td>{{$customer->first_name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->phone_number}}</td>
                    <td>{{$customer->notes}}</td>
                    <td style="display: flex">
                        <a href="{{route('dashboard.customer-update', $customer->id)}}" class="success" style="cursor: pointer; text-decoration:none;"  >View</a> <!-- Button trigger modal -->
              
                        </div>
                        <form id="delete-form-{{$customer->id}}" action="{{route('dashboard.customer-delete',$customer->id)}}" method="POST" style="display: none;">
                            @csrf
                         @method('DELETE')
                      </form>
                         <a href="#" class="danger" style="text-decoration: none"  onclick="event.preventDefault();  confirmDelete({{$customer->id}})" >Delete</a>              
                    </td>
                    
                </tr> 
                @endforeach
                 </tbody>
            </table> 

            {{$customers->links('pagination::bootstrap-5')}} 
            
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