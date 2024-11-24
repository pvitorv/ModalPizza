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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let cart = [];

        // Adicionar ao carrinho
        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', function () {
                const name = this.getAttribute('data-name');
                const price = this.getAttribute('data-price');
                cart.push({ name, price });
                updateCart();
            });
        });

        // Atualizar carrinho
        function updateCart() {
            const cartCount = document.getElementById('cart-count');
            cartCount.innerText = cart.length;

            const cartItems = document.getElementById('cart-items');
            cartItems.innerHTML = '';
            let total = 0;
            cart.forEach((item, index) => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `
                    ${item.name} - R$ ${parseFloat(item.price).toFixed(2).replace('.', ',')}
                    <button class="remove-from-cart" data-index="${index}" style="color: red; margin-left: 1rem;">Remover</button>
                `;
                cartItems.appendChild(listItem);
                total += parseFloat(item.price);
            });

            // Adicionar evento de remoção
            document.querySelectorAll('.remove-from-cart').forEach(button => {
                button.addEventListener('click', function () {
                    const index = this.getAttribute('data-index');
                    cart.splice(index, 1);
                    updateCart();
                });
            });

            const totalElement = document.createElement('li');
            totalElement.setAttribute('id', 'total-amount');
            totalElement.innerHTML = `Total: R$ ${total.toFixed(2).replace('.', ',')}`;
            cartItems.appendChild(totalElement);
        }

        // Abrir/Fechar modal do carrinho
        const cartButton = document.getElementById('cart-button');
        const cartModal = document.getElementById('cart-modal');
        const closeCart = document.getElementById('close-cart');

        cartButton.addEventListener('click', () => cartModal.classList.remove('hidden'));
        closeCart.addEventListener('click', () => cartModal.classList.add('hidden'));

        // Finalizar pedido
        document.getElementById('finalize-order').addEventListener('click', function () {
            const address = document.getElementById('address').value;
            const cartDetails = cart.map(item => `${item.name} - R$ ${parseFloat(item.price).toFixed(2).replace('.', ',')}`).join('\n');
            const message = `Pedido:\n${cartDetails}\nTotal: R$ ${cart.reduce((sum, item) => sum + parseFloat(item.price), 0).toFixed(2).replace('.', ',')}\nEndereço: ${address}`;
            const whatsappURL = `https://api.whatsapp.com/send?phone=YOUR_PHONE_NUMBER&text=${encodeURIComponent(message)}`;
            window.open(whatsappURL, '_blank');
        });
    });
</script>

<!-- Script do WhatsApp -->
<script type="text/javascript">
    window.onload = function(){
    (function(d, script) {
    script = d.createElement('script');
    script.type = 'text/javascript';
    script.async = true;
    script.src = 'https://w.app/widget-v1/cf0u29.js';
    d.getElementsByTagName('head')[0].appendChild(script);
    }(document));
    };
</script>













