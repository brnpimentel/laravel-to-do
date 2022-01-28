@extends('layouts.web')

@section('content')

    <div class="container mt-12">
        <div class="grid gap-7 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach($todos as $todo)
        
            @include('components.todo_box', ['todo' => $todo])
        
        @endforeach
        </div>


        <div class="mt-10">
            <h2 class="text-2xl font-bold">New To-Do List</h2>
            <form method="post" action="{{ route('todos.store') }}" class="mt-2">
                    @csrf
                    <input type="text" name="title" placeholder="insert new name then enter">
                    <button type="submit" class="hidden">Submit</button>
                </form>
        </div>
    </div>

    @include('components.notification')

@endsection