<div class="flex items-center space-x-3 @if($item->deleted_at) pointer-events-none opacity-40 @endif">
    <a class="w-4 h-4 rounded-full @if($item->done_at) bg-cyan-500 @endif endif border border-cyan-500" href="{{ route('todos.items.toggle', [$todo, $item]) }}">
    </a>
    <div class="text-sm flex-1">
        {{ $item->title }} 
        
        @if($item->deleted_at)
            {{-- this text will be shown only for admins (backend dont get trashed items to normal users) --}}
            (<strong>deleted</strong>)
        @else 
            <a href="{{ route('todos.items.delete', [$todo, $item]) }}" class="hover:opacity-100 ml-2 opacity-40"><img src="/img/trash.png" class="w-4 inline-block align-text-top"></a>
        @endif

    </div>
</div>