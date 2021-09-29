@extends('layouts.app')
@section('content')

 <h1>Update Post it's ID:{{$posts->id}}</h1>
 <form action="/UDM/{{$posts->id}}" method="POST">
    {{-- /UDM/{{$posts->id}}هيك acionوصار بال UDM/{{$posts->id}}/edit لازم دائما نرجع بالمسار خطوه لورا لان مسار هالصفحه هوي --}}
    @csrf
   @method('PATCH') {{--  becase i edit fields isn't create fields --}}
    <label for="name">Your Name:</label>
    <input type="text" name="name" id="name" value='{{$posts->name}}'>
    <label for="name">The Price:</label>
    <input type="number" name="price" id="price" value='{{$posts->price}}'>
    <label for="name">Choose Pizza Type:</label>
    <select name="type" id="type" value='{{$posts->type}}'>
        <option value="margiraita">margiraita</option>
        <option value="veg sepreme">veg sepreme</option>
        <option value="volcano">volcano</option>
    </select>
    <label for="name">Choose Pizza base:</label>
    <select name="base" id="base" value='{{$posts->base}}'>
        <option value="chessy grest">chessy grest</option>
        <option value="garlic crust">garlic crust</option>
        <option value="crespy">crespy</option>
    </select>
   <fieldset class="gredaint">
    <label>Edit Tooping</label>
    <input type="checkbox" name="tooping[]" value="mushroom" {{(in_array('mushroom',$posts->tooping)) ?'checked':''}}>mushroom<br>
    <input type="checkbox" name="tooping[]" value="olives" {{(in_array('olives',$posts->tooping)) ?'checked':''}}>olives<br>
    <input type="checkbox" name="tooping[]" value="garlic" {{(in_array('garlic',$posts->tooping)) ?'checked':''}}>garlic<br>
    <input type="checkbox" name="tooping[]" value="peppers" {{(in_array('peppers',$posts->tooping)) ?'checked':''}}>peppers<br>
    <input type="checkbox" name="tooping[]" value="onion" {{(in_array('onion',$posts->tooping)) ?'checked':''}}>onion<br>
</fieldset>
    <input type="submit" value="order Pizza" class="btn btn-success btn-block">

</form>



{{-- <p class="mssg">{{session('mssg')}}</p> --}}
@endsection
