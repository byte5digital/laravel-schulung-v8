@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{$todo->title}}</h3>
        <p>{{$todo->text}}</p>
    </div>
@endsection
