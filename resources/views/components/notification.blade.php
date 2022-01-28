@if(session('success'))
    <div class="absolute top-0 right-0 mr-8 w-96 rounded-lg bg-green-200 px-2 py-2  text-center text-green-900 text-sm shadow bg-opacity-70 -mt-10" id="notification">
        <h1>{{session('success')}}</h1>
    </div>
@endif