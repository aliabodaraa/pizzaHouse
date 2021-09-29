
 @extends('layouts/app')
 @section('content')
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <div class="">
              <h1>PizzaHouse<br>
                the North's best Pizza</h1>
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
               <img src="/imgs/images.jpg" alt="imagePizzaHouse" class="imgPizza">
                </div>

{{-- <a href="/pizzas/create" >Ordered A Pizza</a> --}}
<a href="{{route('pizzas.create')}}" >Ordered A Pizza</a>
<p class="mssg">{{session('mssg')}}</p>

{{-- Testing --}}
@auth
{{$name}}
 @endauth
 @guest
<p>Visiter</p>
 @endguest
@endsection


