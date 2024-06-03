@extends('app-dashboard')
@section('content')

    <change-password-component api_token="{{ Auth::user()->api_token }}" business_id="{{ Auth::user()->business_id ?? session('business_id') }}"/>

@endsection
