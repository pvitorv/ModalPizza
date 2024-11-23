<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <div class="text-center mb-4 mt-4">
                        <h2>{{ config('app.name') }}</h2>
                        <!-- Adicione a logomarca aqui -->
                        <!-- <img src="{{ asset('path/to/logo.png') }}" alt="Logomarca"> -->
                    </div>

                    <a href="{{ route('products.index') }}" class="btn btn-primary mb-3">Gerenciar Produtos</a>

                    <!-- Outros conteúdos do dashboard existentes -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


