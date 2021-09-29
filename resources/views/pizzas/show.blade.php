@extends('layouts.app')
@section('title','Index')
@section('content')
 <h1>Pizzas</h1>
     <div class="wrapper pizza-details">
         <h1>Order Pizza For {{ $pizzadetails->name}}</h1>
         <p class="type">{{ $pizzadetails->type}}</p>
         <p class="base">{{ $pizzadetails->base}}</p>
         <p class="base">Tooping</p>
         <ul>
             @foreach($pizzadetails->tooping as $toop)
             <li>{{$toop}}</li>
             @endforeach
         </ul>
         {{-- <form action="/pizzas/{{$pizzadetails->id}}" method="POST"> --}}
            <form action="{{route('pizzas.destroy',$pizzadetails->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button>CompleteOrder</button>
    </form>
     </div>
     <a href="/pizzas">Back To All Pizzas</a>

@endsection
