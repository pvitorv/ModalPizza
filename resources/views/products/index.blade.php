@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-white mb-4">Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


