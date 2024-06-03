@extends('dashboard.partials.layout')
@section('content')

   
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<h1 class="title">Financial Report</h1>
<p class="text-muted">Display search results</p>
    

<div class="container" style="background: white"> <br>
    <div class="recent-order" >
         <table class="table table-bordered">
            <tbody > 
                <tr>
                    <td><b>Total Revenue</b></td>
                    <td>{{$totalRevenue}}</td>
                </tr>
                <tr>
                    <td ><b>Total Sales Cost</b></td>
                    <td >{{$total_sales_cost}}</td>
                </tr>
                <tr>
                    <td><b>Total Sales Profit</b></td>
                    <td>{{$total_sales_profit}}</td>
                </tr>
                <tr>
                    <td><b>Total Expenses</b></td>
                    <td>{{$totalExpenses}}</td>
                </tr>
                <tr>
                    <td><b>Total Tax</b></td>
                    <td>{{$total_tax}}</td>
                </tr>
                <tr>
                    <td><b>Net Income</b></td>
                    <td> {{$netIncome}}</td>
                </tr>
             </tbody>
        </table> 
     </div> <br>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>    

@endsection