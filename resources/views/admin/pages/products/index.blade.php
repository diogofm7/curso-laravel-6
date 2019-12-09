@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')

    <h1>Exibindo Produtos</h1>

    <a href="{{ route('products.create') }}">Cadastrar</a>

    <hr>

    @component('admin.components.card')
        @slot('title')
            <h1>Titulo Card</h1>
        @endslot
        Um card de exemplo
    @endcomponent

    <hr>

    @include('admin.includes.alerts', ['content' => 'Alerta de Preços de Produtos'])

    <hr>

    @if(isset($products))
        @foreach($products as $product)
            <p class="@if($loop->last) last @endif">{{ $product }}</p>
        @endforeach
    @endif

    <hr>

    @forelse($products as $product)
        <p class="@if($loop->first) last @endif">{{ $product }}</p>
    @empty
        <p>Não existem produtos cadastrados!</p>
    @endforelse

    <hr>

    @if($teste === '123')
        É Igual
    @elseif($teste == 123)
        É Igual a 123
    @else
        É Diferente
    @endif

    @unless($teste === '123')
        dfdf
    @else
        dsadsda
    @endunless

    @isset($teste2)
        <p>{{ $teste2 }}</p>
    @endisset

    @empty($teste3)
        <p>Vazio...</p>
    @else
        <p>Cheio...</p>
    @endempty

    @auth
        <p>Autenticado...</p>
    @endauth

    @guest
        <p>Não Autenticado...</p>
    @endguest

    @switch($teste)
        @case(1)
            Igual a 1
            @break
        @case(2)
            Igual a 2
            @break
        @case(123)
            Igual a 123
            @break
        @default
        Default
    @endswitch

@endsection


@push('styles')
    <style>
        .last {
            background: #CCC;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef'
    </script>
@endpush
