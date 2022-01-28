<header class="bg-white py-6">

    <div class="container">

        <div class="flex justify-between items-center">
            <div class="text-center">
                <h1 class="text-2xl font-bold">To-Do Laravel</h1>
                <small class="block">By @brnpimentel</small>
            </div>

            @auth
                 
                <div class="">
                    Welcome <strong>{{ Auth::user()->name }}</strong>!
                    
                    <a href="{{ route('logout') }}" class="btn ml-2">Logout</a>
                </div>
            @endauth 


        </div>    


    </div>

</header>