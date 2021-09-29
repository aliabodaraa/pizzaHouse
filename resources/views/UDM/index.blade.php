@extends('../layouts/app')
@section('content')



<div class="container">
    <p class="mssg" style="display:
    <?php
    if(!empty(session('mssg')))
    {echo 'block';}
    else{echo 'none';}
    ?>"> {{session('mssg')}}</p>
    <h1>UDM Index the best Pizza</h1>
    <button class="btn btn-primary btn-block"><a href='{{route('UDM.create')}}'>Create A New Order</a> </button>

            @foreach ($posts as $post)
            <div class="info">
                <p><span>ID: </span>{{$post->id}}</p>
                <p><span>NAME: </span>{{$post->name}}</p>
                <p><span>CREATED_AT: </span>{{$post->created_at}}</p>
                <p><span>PRICE: </span>{{$post->price}}</p>
                <p><span>TYPE: </span>{{$post->type}}</p>
                <ul>
                    <span>TOOPINGS: </span>
                @foreach ($post->tooping as $tooping)
                <li>
                    {{$tooping}}
                </li>

                @endforeach
                <button class="btn btn-success btn-block"><a href="UDM/{{$post->id}}/edit">Edit</a></button>

           {{-- for delete --}}
            <form action="/UDM/{{$post->id}}" method="POST">
                @csrf
                @method("DELETE")
              <input type="submit" value="Delete Row" name="delete" class="btn btn-danger btn-block">
            </form>
            </ul>

        </div>
            @endforeach




</div>
{{-- <a href="/pizzas/create" >Ordered A Pizza</a> --}}

@endsection
