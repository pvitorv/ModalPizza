@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Produto</h1>
    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <p><strong>Descrição: </strong>{{ $product->description }}</p>
            <p><strong>Preço: </strong>{{ $product->price }}</p>
        </div>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
