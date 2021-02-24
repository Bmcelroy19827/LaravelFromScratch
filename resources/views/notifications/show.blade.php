@extends('layout')

@section('content')
<div class="centered-flex" ">
    <ul class="notifications">
        @forelse($notifications as $notification)
            <li>
                @if($notification->type === "App\Notifications\PaymentReceived")
                    <span style="display: block">
                        We received a ${{ $notification->data['amount'] }} payment from you on {{ $notification->created_at->format('l F dS Y')  }} 
                        at {{ $notification->created_at->format('g:i a T') }}
                    </span>
                @endif  
                {{ $notification->type }}</li>
        @empty
                <li>You have no unread notifications</li>     
        @endforelse
    </ul>
</div>

@endsection