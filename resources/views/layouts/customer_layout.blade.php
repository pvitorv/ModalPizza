<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ModalPizza</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-light text-dark">
    <header class="bg-dark text-white py-4">
        <div class="container d-flex align-items-center justify-content-between">
            <img src="{{ asset('build/assets/pizz.svg') }}" alt="ModalPizza Logo" class="img-fluid" style="max-height: 60px;"> <!-- Ajuste o tamanho aqui -->
            <h1 class="m-0">ModalPizza</h1>
            <!-- Botão do Carrinho no Cabeçalho -->
            <button id="cart-button" style="background-color: #1d4ed8; color: white; padding: 0.5rem 1rem; border-radius: 0.25rem;">
                Carrinho (<span id="cart-count">0</span>)
            </button>
        </div>
    </header>

    <!-- Page Content -->
    <main class="py-4">
        <div class="container">
            @yield('content') <!-- Certifique-se de que esta linha está presente -->
        </div>
    </main>

    <!-- Modal do Carrinho -->
    <div id="cart-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg max-w-lg mx-auto mt-24 p-6">
            <h2 class="font-bold text-2xl mb-4">Seu Carrinho</h2>
            <ul id="cart-items">
                <!-- Itens do carrinho serão adicionados aqui -->
            </ul>
            <input type="text" id="address" placeholder="Digite seu endereço ou localização" class="w-full border p-2 my-2">
            <button id="finalize-order" style="background-color: #1d4ed8; color: white; padding: 0.5rem 1rem; border-radius: 0.25rem;">
                Finalizar Pedido
            </button>
            <button id="close-cart" style="background-color: #d80027; color: white; padding: 0.5rem 1rem; border-radius: 0.25rem; margin-top: 1rem;">
                Fechar
            </button>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Carrinho JS -->
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
                cart.forEach((item, index) => {
                    const listItem = document.createElement('li');
                    listItem.innerHTML = `
                        ${item.name} - R$ ${parseFloat(item.price).toFixed(2).replace('.', ',')}
                        <button class="remove-from-cart" data-index="${index}">Remover</button>
                    `;
                    cartItems.appendChild(listItem);
                });

                // Adicionar evento de remoção
                document.querySelectorAll('.remove-from-cart').forEach(button => {
                    button.addEventListener('click', function () {
                        const index = this.getAttribute('data-index');
                        cart.splice(index, 1);
                        updateCart();
                    });
                });
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
                const message = `Pedido:\n${cartDetails}\nEndereço: ${address}`;
                const whatsappURL = `https://api.whatsapp.com/send?phone=YOUR_PHONE_NUMBER&text=${encodeURIComponent(message)}`;
                window.open(whatsappURL, '_blank');
            });
        });
    </script>
</body>
</html>



