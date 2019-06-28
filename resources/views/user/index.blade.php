@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($tickets as $ticket)
                <p>
                    {{ $ticket->title }}
                </p>
            @endforeach
        </div>
    </div>
@endsection