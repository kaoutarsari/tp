@extends('layouts.app')

@section('content')
    <form method="POST" action="/payment">
        @csrf
        <input type="radio" name="payment" value="paypale"/>
        <input type="submit">
    </form>
@endsection