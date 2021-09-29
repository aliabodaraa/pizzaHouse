
 @extends('layouts/app')
 @section('title','Index')
   @section('content')
    <h1>Pizzas</h1>

            {{-- <p>{{$type}}-{{$size}}-{{$price}}</p>
            @if($price>110)
            <p>This pizza is expensive</p>
            @elseif($price<110)
            <p>This pizza is cheap</p>
            @else <p>This pizza is normally priced</p>
            @endif
            {{-- Oposite If --}}
            {{-- @unless($type=='pizzavegetarian')
            <h2>Done type</h2>
            @endunless --}}
            {{-- PHP Directives --}}
            {{-- @php
            $name='ali';
            echo($name);
            @endphp --}}
            {{-- For Blade --}}
            {{-- @for($i=0;$i<5;$i++)
            <P>hello{{$i}}</P>
            @endfor  --}}
            {{-- @for($i=0;$i<count($pizza);$i++)
            <P>{{ $pizza[$i]['type'] }}</P>
            @endfor --}}
            {{-- Foreach --}}
            {{-- @foreach($pizza as $b)

                {{$loop->index}}{{$b['type']}}--{{$b['base']}}
                @if($loop->first)
                <span>--the first Iteration in the Loop</span>
                @elseif($loop->index==1)
                    <span>--the second Iteration in the Loop</span><span>--the second Iteration in the Loop</span>
                    @elseif($loop->last)
                    <span>--the last Iteration in the Loop</span>
                @endif

            @endforeach --}}

            {{-- <h1>{{$name}}-{{$age}}</h1> --}}

        <div class="wrapper pizza-index">
            @foreach($pizza11 as $p)
                <div class="pizza-item">
                    <img src="/imgs/تنزيل.jpg" alt="pizaLogo">
                    <h4><a href="/pizzas/{{$p->id}}">{{$p->name}}</a></h4>
                </div>
            {{-- <h2>{{$p->name}}--{{$p->price}}--{{$p->id}}--{{$p->base}}--{{$p->type}}</h2>--}}
            @endforeach
            {{-- <h3>{{$pizza11}}</h3> --}}
        </div>
        {{-- @each('index.blade.php', $pizza11, $p,'/home') --}}
        {{-- <p>{{$p->name}}</p> --}}
@endsection
