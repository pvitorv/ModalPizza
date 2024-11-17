@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-white">Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn bg-primary text-white hover:bg-primaryHover">Adicionar Produto</a>
    <table class="table mt-4 bg-gray-800 text-white">
        <thead>
            <tr>
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Descrição</th>
                <th class="px-4 py-2">Preço</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="bg-gray-700">
                <td class="px-4 py-2">{{ $product->name }}</td>
                <td class="px-4 py-2">{{ $product->description }}</td>
                <td class="px-4 py-2">{{ $product->price }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn bg-warning text-black hover:bg-yellow-600">Editar</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-danger text-white hover:bg-dangerHover">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

