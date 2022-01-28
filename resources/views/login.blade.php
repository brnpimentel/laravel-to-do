@extends('layouts.web')

@section('content')

    <div class="bg-white  rounded-2xl p-7 w-3/5 mx-auto mt-12 max-w-lg">

        <h2 class="text-center font-bold text-xl">Sign in</h2>

        @if ($errors->any())
        <div class="rounded-lg bg-red-200 px-2 py-2 my-4 text-center text-red-900 text-sm">
            Invalid credentials
        </div>
        @endif

        <form method="POST" action="/login" class="mt-4">
            @csrf
            <div class="space-y-4">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" autofocus autocomplete="off">
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password"  autocomplete="off">
                </div>

                <div>
                    <button type="submit" class="btn">Sign in</button>
                </div>

                <div class="">
                    <small>Use <strong>admin/admin</strong> for Administrator.<br>
                    <strong>peter/peter</strong> for Normal User 1, <strong>richard/richard</strong> for Normal User 2
                </div>
            </div>


        
        </form>
    </div>

@endsection