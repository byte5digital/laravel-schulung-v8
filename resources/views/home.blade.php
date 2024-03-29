@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>ToDos</h1>
        <div>
            <?php
            use Weegy\Todos\App\Models\Todo; /** @var Todo $todo */ ?>
            @foreach ($todos as $todo)
                <div class="row">
                    <div class="col-4">
                        <a href="{{route('todo.show', $todo)}}">
                        {{$todo->title}}
                        </a>
                    </div>
                    <div class="col-4">
                        {{$todo->user->name}}

                    </div>
                    <div class="col-4">
                        <a href="{{route('validate.user', $todo->user)}}">
                            {{$todo->user->email}}
                        </a>

                    </div>
                </div>
            @endforeach

        </div>
    </div>


@endsection
