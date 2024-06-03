@extends('dashboard.partials.layout')
@section('content')


<h2>Add Expenses</h2>
<h4 style="color: grey">Fill in the form below to continue</h4><br>


<section class="contain">
  <form action="{{route('dashboard.expenses-create.submit')}}" class="form" method="POST">
    @csrf

    <div class="input-box">
        <label>Expenses Type *</label>
        <select name="expense_type" class="form-select">
            <option value=""></option>
            <option value="general">General</option>
            <option value="wage">Wage</option>
            <option value="invoice">Invoice</option>
        </select>
      </div>
      <div class="input-box">
        <label>Beneficiary *</label>
        <input type="text"   name="beneficiary">
      </div>
      <div class="input-box">
        <label>Amount *</label>
        <input type="text"  name="amount">
      </div>
      <div class="input-box">
        <label>Payment Method *</label>
        <select name="payment_method">
            <option value=""></option>
            <option value="cash">Cash</option>
            <option value="credit">Credit</option>
            <option value="mobile_money">Mobile Money</option>
            <option value="card">Card</option>
            <option value="other">Other</option>
        </select>
      </div>
      <div class="input-box">
        <label>Payment Status *</label>
        <select name="status">
            <option value=""></option>
            <option value="pending">Pending</option>
            <option value="paid">Paid</option>
            <option value="cancelled">Cancelled</option>
        </select>
      </div>

    <button>Submit</button>
  </form>
</section>

@endsection