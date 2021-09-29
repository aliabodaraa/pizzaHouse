@extends('../layouts/app')
@section('content')



<div class="container">
    <h1>UDM Show For ID:{{$postshow->id}} the best Pizza</h1>


            <div class="info">
                <p><span>ID: </span>{{$postshow->id}}</p>
                <p><span>NAME: </span>{{$postshow->name}}</p>
                <p><span>CREATED_AT: </span>{{$postshow->created_at}}</p>
                <p><span>PRICE: </span>{{$postshow->price}}</p>
                <p><span>TYPE: </span>{{$postshow->type}}</p>
                <ul>
                <span>TOOPINGS: </span>
                @foreach ($postshow->tooping as $tooping)
                <li>
                    {{$tooping}}
                </li>

                @endforeach
                <button class="btn btn-success btn-block"><a href="{{$postshow->id}}/edit">Edit</a></button>
                <button class="btn btn-primary btn-block"><a href='{{route("UDM.create")}}'>Create A New Order</a> </button>
             {{-- for delete --}}
             <form action="/UDM/{{$postshow->id}}" method="POST">
                {{-- destroy($id)لانو الطريقه
               بهالشكل action بدها وسيط لهيم ال كان  --}}
                @csrf
                @method("DELETE")
              <input type="submit" value="Delete Row" name="delete" class="btn btn-danger btn-block">
            </form>
            </ul>

        </div>


            <a href="{{route('pizzas.create')}}" >Ordered A Pizza</a>


</div>


@endsection
