@extends('layouts.app')
@section('content')
 <h1>Index</h1>
 <p class="mssg" style="display:
    <?php
    if(!empty(session('mssg')))
    {echo 'block';}
    else{echo 'none';}
    ?>"> {{session('mssg')}}</p>
@endsection
