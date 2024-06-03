@extends('dashboard.partials.layout')
@section('content')

<div class="container">   
<h1 class="title">Sales History</h1>
<ul class="breadcrumbs">
    <li><a href="#">Home /</a></li>
    <li><a href="#" class="active">LOGGED IN USER:@if (auth()->check())
        <b>{{ strtoupper(auth()->user()->first_name) }}</b>
        <b>{{ strtoupper(auth()->user()->last_name) }}</b>
        @endif</a></li>
    </ul>
    <div class="recent-order">  
        <table style="border: 1rem">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Receipt No</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th>Customer</th>
                    <th>Sold By</th>
                    <th>Notes</th>
                    <th>Date</th>
                    <th>Action</th>
                <tr>
            </thead>
            <tbody>
               @foreach ($sales as $sale)
               <tr>
                <td>N0.{{$sale->id}}</td>
                <td>{{$sale->receipt_no}}</td>
                <td>{{$sale->amount}}</td>
                <td class="warning">{{$sale->payment_method}}</td>
                <td class="primary">@if ($sale->payment_status == 'pending') PENDING
                    @else
                    PAID
                    
                @endif
                </td>
                <td>{{$sale->customer->first_name}} {{$sale->customer->last_name}}</td>
                <td>Larry Otieno</td>
                <td>{{$sale->notes}}</td>
                <td>{{$sale->created_at}}</td>
                <td></td>
            </tr>
               @endforeach
                
            </tbody>
        </table>
        
     </div>  
</div>


@endsection