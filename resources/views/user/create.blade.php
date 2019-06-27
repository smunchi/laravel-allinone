@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br/>
        @endif
        <div class="row">
            <form method="post" action="{{ url('/create/ticket') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Ticket Title</label>
                    <input type="text" name="title" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="title">Ticket Description</label>
                    <textarea cols="5" rows="5" class="form-control" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection