@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Neues Todo</h3>
        <hr/>
        <form method="POST" action="{{ route('todo.store')}}">

            @csrf
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Titel">
            </div>
            <div class="form-group">
                <label for="text">Aufgabe</label>
                <textarea class="form-control" id="text" name="text" placeholder="Aufgabe"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Absenden</button>
        </form>
    </div>

@endsection
