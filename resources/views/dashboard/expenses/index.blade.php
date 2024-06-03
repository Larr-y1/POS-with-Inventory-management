@extends('dashboard.partials.layout')
@section('content')

<head>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Include SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

 
    <h1 class="title">Expense List</h1>
    <p class="text-muted">Display {{$totalExpenses}} search results</p>
        
    <div class="info-data" >
        <div class="bcard ">
            <div class="head">
                <div>
                    <h2> {{ $monthlyExpenses }}</h2><br>
                    <p>Expense this month</p>
                </div>
                <span class="material-icons-sharp" >inventory</span>
            </div>
        </div>
        <div class="bcard">
            <div class="head">
                <div>
                    <h2>{{$pendingExpenses}}</h2><br>
                    <p>Pending Expenses</p>
                </div>
                <span class="material-icons-sharp" style=" background: var(--color-danger);">category</span>
            </div>
        </div>
        <div class="bcard">
            <div class="head">
                <div>
                    <h2>{{$paidExpenses}}</h2><br>
                    <p>Paid Expenses </p>
                </div>
                <span class="material-icons-sharp" >speed</span>
            </div>
            
        </div>
        <div class="bcard">
            <div class="head">
                <div>
                    <h2> {{$totalExpenses}}</h2><br>
                    <p>Total Expenses</p>
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
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="{{route('dashboard.expenses-create')}}"><button class="btn btn-primary me-md-2" type="button">Add Expense</button></a>
             </div>
             <table class="table table-hover">
                <thead  class="table table-bordered">
                    <tr>
                        <th class="table-light" >No</th>
                        <th class="table-light">Expense Type</th>                       
                        <th class="table-light">Beneficiary</th>
                        <th class="table-light">Payment Method</th>
                        <th class="table-light">Status</th>
                        <th class="table-light">Date</th>
                        <th class="table-light">Action</th>
                    <tr>
                </thead>
                <tbody> 
                 @foreach ($expenses as $expense)
                 <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$expense->expense_type}}</td>
                    <td>{{$expense->beneficiary}}</td>
                    <td>{{$expense->payment_method}}</td>
                    <td>{{$expense->status}}</td>
                    <td>{{$expense->created_at}}</td>
                    <td style="display: flex">
                        <a href="{{route('dashboard.expense-update', $expense->id)}}"style="cursor: pointer; text-decoration:none;" class="success">View</a>
                        <form id="delete-form-{{$expense->id}}" action="{{route('dashboard.expense-delete',$expense->id)}}" method="POST" style="display: none;">
                            @csrf
                         @method('DELETE')
                      </form>
                        <a href="#" class="danger delete-expense" style="text-decoration: none"  onclick="event.preventDefault();  confirmDelete({{$expense->id}})" >Delete</a>
                                   
                    </td>
                    
                </tr> 
                 @endforeach
                 </tbody>
            </table> 
            {{$expenses->links('pagination::bootstrap-5')}}  

         </div>  
    </div>

   
    
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to revert this expense!',
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
                         text: "Expense has been deleted successfully.",
                         icon: "success"
    });
                } else {
                    // User clicked "No, cancel"
                    Swal.fire('Cancelled', 'Your expense is safe :)', 'info');
                }
            });
        }
    </script>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>



@endsection