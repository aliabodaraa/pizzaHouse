@extends('layouts/layout')
@section('content')
<div class="wrapper create-pizza">
    <h1>Creat A New Pizza</h1>
    <form action="/pizzas" method="POST">
        @csrf
        <label for="name">Your Name:</label>
        <input type="text" name="name" id="name">
        <label for="name">The Price:</label>
        <input type="number" name="price" id="price">
        <label for="name">Choose Pizza Type:</label>
        <select name="type" id="type">
            <option value="margiraita">margiraita</option>
            <option value="veg sepreme">veg sepreme</option>
            <option value="volcano">volcano</option>
        </select>
        <label for="name">Choose Pizza base:</label>
        <select name="base" id="base">
            <option value="chessy grest">chessy grest</option>
            <option value="garlic crust">garlic crust</option>
            <option value="crespy">crespy</option>
        </select>
        <fieldset>
            <label></label>
            <input type="checkbox" name="tooping[]" value="mushroom">mushroom<br>
            <input type="checkbox" name="tooping[]" value="olives">olives<br>
            <input type="checkbox" name="tooping[]" value="garlic">garlic<br>
            <input type="checkbox" name="tooping[]" value="peppers">peppers<br>
            <input type="checkbox" name="tooping[]" value="onion">onion<br>
        </fieldset>
        <input type="submit" value="order Pizza">
    </form>
</div>

@endsection
