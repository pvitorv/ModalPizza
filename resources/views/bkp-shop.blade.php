@extends('layouts.customer_layout')

@section('content')
<div class="mx-auto max-w-7xl ml-3 my-2 mb-8">
    <h2 class="font-bold text-3xl">Cardápio</h2>
</div>

<div id="menu">
    <main class="grid grid-cols-1 gap-6 mx-auto max-w-7xl px-3 mb-16">
        @foreach($pizzas as $pizza)
        <div class="flex gap-4 p-4 bg-white rounded-md shadow-md items-center md:items-start">
            <img src="{{ asset('storage/' . $pizza->image) }}" alt="{{ $pizza->name }}" class="w-20 h-20 rounded-md object-cover"> <!-- Aumentando o tamanho da imagem -->
            <div class="flex flex-col flex-grow text-center md:text-left">
                <p class="font-bold text-xl">{{ $pizza->name }}</p>
                <p class="text-sm mb-2">{{ $pizza->description }}</p>
                <p class="font-bold text-lg mb-2">R$ {{ number_format($pizza->price, 2, ',', '.') }}</p>
                <button style="background-color: #1d4ed8; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; margin-top: 1rem;" class="add-to-cart-btn self-start" data-name="{{ $pizza->name }}" data-price="{{ $pizza->price }}">
                    Adicionar ao Carrinho
                </button> <!-- Diminuindo o tamanho do botão -->
            </div>
        </div>
        @endforeach
    </main>
</div>

<!-- INÍCIO ACRÉSCIMOS -->
<div class="mx-auto max-w-7xl px-3 ml-3 my-2">
    <h2 class="font-bold text-3xl">Acréscimos</h2>
</div>

<div class="grid grid-cols-1 gap-6 mx-auto max-w-7xl px-3 mb-16" id="menu">
    @foreach($acrescimos as $acrescimo)
    <div class="flex gap-4 p-4 bg-white rounded-md shadow-md items-center md:items-start">
        <img src="{{ asset('storage/' . $acrescimo->image) }}" alt="{{ $acrescimo->name }}" class="w-20 h-20 rounded-md object-cover"> <!-- Aumentando o tamanho da imagem -->
        <div class="flex flex-col flex-grow text-center md:text-left">
            <p class="font-bold text-xl">{{ $acrescimo->name }}</p>
            <p class="text-sm mb-2">{{ $acrescimo->description }}</p>
            <p class="font-bold text-lg mb-2">R$ {{ number_format($acrescimo->price, 2, ',', '.') }}</p>
            <button style="background-color: #1d4ed8; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; margin-top: 1rem;" class="add-to-cart-btn self-start" data-name="{{ $acrescimo->name }}" data-price="{{ $acrescimo->price }}">
                Adicionar ao Carrinho
            </button> <!-- Diminuindo o tamanho do botão -->
        </div>
    </div>
    @endforeach
</div>

<!-- INÍCIO BEBIDAS -->
<div class="mx-auto max-w-7xl px-3 ml-3 my-2">
    <h2 class="font-bold text-3xl">Bebidas</h2>
</div>

<div class="grid grid-cols-1 gap-6 mx-auto max-w-7xl px-3 mb-16" id="menu">
    @foreach($bebidas as $bebida)
    <div class="flex gap-4 p-4 bg-white rounded-md shadow-md items-center md:items-start">
        <img src="{{ asset('storage/' . $bebida->image) }}" alt="{{ $bebida->name }}" class="w-20 h-20 rounded-md object-cover"> <!-- Aumentando o tamanho da imagem -->
        <div class="flex flex-col flex-grow text-center md:text-left">
            <p class="font-bold text-xl">{{ $bebida->name }}</p>
            <p class="text-sm mb-2">{{ $bebida->description }}</p>
            <p class="font-bold text-lg mb-2">R$ {{ number_format($bebida->price, 2, ',', '.') }}</p>
            <button style="background-color: #1d4ed8; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; margin-top: 1rem;" class="add-to-cart-btn self-start" data-name="{{ $bebida->name }}" data-price="{{ $bebida->price }}">
                Adicionar ao Carrinho
            </button> <!-- Diminuindo o tamanho do botão -->
        </div>
    </div>
    @endforeach
</div>
@endsection
