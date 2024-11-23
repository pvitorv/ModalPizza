@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-white mb-4">Editar Produto</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-dark p-4 rounded">
        @csrf
        @method('PUT')
        <div class="form-group mb-4">
            <label for="name" class="form-label text-white">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group mb-4">
            <label for="description" class="form-label text-white">Descrição</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group mb-4">
            <label for="price" class="form-label text-white">Preço</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <div class="form-group mb-4">
            <label for="category" class="form-label text-white">Categoria</label>
            <select class="form-control" id="category" name="category" required>
                <option value="Cardapio" {{ $product->category == 'Cardapio' ? 'selected' : '' }}>Cardápio</option>
                <option value="Acréscimos" {{ $product->category == 'Acréscimos' ? 'selected' : '' }}>Acréscimos</option>
                <option value="Bebidas" {{ $product->category == 'Bebidas' ? 'selected' : '' }}>Bebidas</option>
            </select>
        </div>
        <div class="form-group mb-4">
            <label for="image" class="form-label text-white">Imagem do Produto</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection

