@extends('dashboard.partials.layout')
@section('content')

<head>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

 
    <h1 class="title">Category List</h1>
    <p class="text-muted">Display {{$totalCategories}} search results</p>
        
        
    <div class="container" > 
        <div class="recent-order" style="color: white, width:100%, height:100%">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 
                 <a href="{{route('dashboard.category-create')}}"><button class="btn btn-primary me-md-2" type="button">Add Category</button></a>
              </div>

            <table class="table table-hover">
                <thead  class="table table-bordered">
                    <tr>
                        <th class="table-light" >No</th>
                        <th class="table-light">Name</th>
                        <th class="table-light">Description</th>
                        <th class="table-light">Item</th>
                        <th class="table-light">Action</th>
                    <tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr >
                     <td>{{$loop->iteration}}</td>
                     <td>{{$category->name}}</td>
                     <td>{{$category->description}}</td>
                   <td>
                    PRODUCT
                   {{$category->product_count}} /
                   SERVICE
                   {{$category->service_count}}
                   </td>

                   <td  style="display: flex"> 
                    <a href="{{route('dashboard.category-update', $category->id)}}" class="success" style="cursor: pointer; text-decoration:none;"  >View</a> 
                      
     <form id="delete-form-{{$category->id}}" action="{{route('dashboard.category-delete',$category->id)}}" method="POST" style="display: none;">
           @csrf
        @method('DELETE')
     </form>
                      <a href="#" class="danger" style="text-decoration: none"  onclick="event.preventDefault();  confirmDelete({{$category->id}})" >Delete</a>
                   </td>
                   @endforeach
                     </tr>
                  </tbody>
            </table>
           
              {{$categories->links('pagination::bootstrap-5')}}  
            
            
         </div>  
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to revert this category!',
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
                         text: "Category has been deleted successfully.",
                         icon: "success"
    });
                } else {
                    // User clicked "No, cancel"
                    Swal.fire('Cancelled', 'Your category is safe :)', 'info');
                }
            });
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
@endsection