@extends('app-dashboard')
@section('content')

    <reset-pin-component api_token="{{ Auth::user()->api_token }}" business_id="{{ Auth::user()->business_id ?? session('business_id') }}"/>

@endsection
