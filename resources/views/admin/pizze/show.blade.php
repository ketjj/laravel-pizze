@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="ror">
            <div class="col">
                <h1>Nome Pizza: {{$pizza->name}}</h1>
                @if (count($pizza->ingredients) != 0)
                    <p>Ingredienti:
                        @foreach ($pizza->ingredients as $ingredient)
                            <span class="mx-2">{{ $ingredient->name }}</span>
                        @endforeach
                    </p>
                @endif
                <p>Prezzo: {{$pizza->price}}</p>
                <p>Popolarità: {{$pizza->popularity == null ? 'NC' : $pizza->popularity}}</p>
                <p>Vegetariana: {{$pizza->isVegetarian == 0 ? 'no' : 'sì'}}</p>
            </div>
        </div>
    </div>

@endsection
