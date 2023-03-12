@extends('plantilla')
@section('titulo', 'Llista de ganges')
@section('contenido')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('gangas.update', $ganga->id) }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <!-- Email Address -->
            <div>
                <x-input-label for="title" :value="__('Titol')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $ganga->title }}" autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Descripció')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $ganga->description }}" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="url" :value="__('URL')" />
                <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" value="{{ $ganga->url }}" />
                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="category" :value="__('Categoria')" />
                <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" value="{{ $ganga->category }}" />
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="price" :value="__('Preu normal')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" value="{{ $ganga->price }}" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="price_sale" :value="__('Preu reduit')" />
                <x-text-input id="price_sale" class="block mt-1 w-full" type="text" name="price_sale" value="{{ $ganga->price_sale }}" />
                <x-input-error :messages="$errors->get('price_sale')" class="mt-2" />
            </div>



            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Editar ganga') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
@endsection
<style>
    .disabled {
        background-color: #1a1a1a;
    }
</style>