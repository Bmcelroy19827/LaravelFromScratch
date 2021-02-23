@extends('layout')

@section('content')
<div class="container">
    <form method="POST" action="/payments/create">
        @csrf

        <button class="btn btn-primary" type="submit" formmethod="POST">Make Payment</button>
    </form>
</div>

@endsection