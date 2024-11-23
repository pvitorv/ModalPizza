@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-white mb-4">Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>

    <!-- Produtos em Formato de Tabela -->
    <div class="table-responsive">
        <table class="table table-dark table-striped w-100">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->category }}</td>
                    <td>
                        <div class="d-flex flex-column flex-sm-row">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning mb-2 mb-sm-0 mr-sm-2">Editar</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection






