@extends('layouts.customer_layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Faça seu Pedido</h1>

    <!-- Cardápio Section -->
    <section id="cardapio" class="mb-4">
        <h2 class="text-xl font-bold mb-2">Cardápio</h2>
        <div class="row">
            @foreach($pizzas as $pizza)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">{{ $pizza->name }}</h3>
                        <p class="card-text">{{ $pizza->description }}</p>
                        <p class="card-text font-bold">R$ {{ number_format($pizza->price, 2, ',', '.') }}</p>
                        <button class="btn btn-primary" onclick="addToCart('{{ $pizza->id }}')">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Acréscimos Section -->
    <section id="acrescimos" class="mb-4">
        <h2 class="text-xl font-bold mb-2">Acréscimos</h2>
        <div class="row">
            @foreach($acrescimos as $acrescimo)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">{{ $acrescimo->name }}</h3>
                        <p class="card-text">{{ $acrescimo->description }}</p>
                        <p class="card-text font-bold">R$ {{ number_format($acrescimo->price, 2, ',', '.') }}</p>
                        <button class="btn btn-primary" onclick="addToCart('{{ $acrescimo->id }}')">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Bebidas Section -->
    <section id="bebidas" class="mb-4">
        <h2 class="text-xl font-bold mb-2">Bebidas</h2>
        <div class="row">
            @foreach($bebidas as $bebida)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">{{ $bebida->name }}</h3>
                        <p class="card-text">{{ $bebida->description }}</p>
                        <p class="card-text font-bold">R$ {{ number_format($bebida->price, 2, ',', '.') }}</p>
                        <button class="btn btn-primary" onclick="addToCart('{{ $bebida->id }}')">Adicionar ao Carrinho</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    function addToCart(productId) {
        // Adicione a lógica para adicionar o produto ao carrinho
        alert('Produto ' + productId + ' adicionado ao carrinho!');
    }
</script>
@endsection


