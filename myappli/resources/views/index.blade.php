@extends('layouts.app')

@section('content')
    <h1>Liste des produits</h1>
    @foreach($products as $product)
        <div>
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Prix: {{ $product->price }} €</p>
            <p>Quantité: {{ $product->quantity }}</p>
        </div>
    @endforeach
@endsection
