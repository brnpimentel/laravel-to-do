<div class="bg-white rounded-2xl p-7 @if($todo->deleted_at) pointer-events-none opacity-40 @endif">
    <div class="mb-4">
        <h3 class="text-lg font-bold">{{ $todo->title }} 
        @if($todo->deleted_at)
            (<strong>deleted</strong>)
        @else
            <a href="{{ route('todos.delete', [$todo]) }}" class="ml-2 hover:opacity-100 opacity-40"><img src="/img/trash.png" class="inline-block w-4 align-baseline"></a>
        @endif
        </h3>

        @if(Auth::user()->is_admin)
        <small class="block">from <span class="italic font-bold">{{$todo->user->name}}</span></small>
        @endif
    </div>

    <div class="space-y-2">
    @forelse($todo->items as $item)
       @include('components.todo_item', ['todo' => $todo, 'item' => $item])
    @empty
        <p class="text-sm text-center">No to-dos! 😩 <br>Insert new one!</p>
    @endforelse

    </div>

    <form method="post" action="{{ route('todos.items.store', [$todo]) }}" class="mt-4">
        @csrf
        <input type="text" name="title" placeholder="insert new to-do then enter">
        <button type="submit" class="hidden">Submit</button>
    </form>
    
</div>