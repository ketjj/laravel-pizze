@extends('layouts.app')

@section('content')
    <div class="container">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Ingredienti</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($pizze as $pizza)

                <tr>
                    <th scope="row">{{$pizza->id}}</th>
                    <td>{{$pizza->name}}</td>
                    <td>
                        @forelse ($pizza->ingredients as $ingredient)
                            <span class="mx-2">{{ $ingredient->name }}</span>
                        @empty
                            <span class="mx-2">-</span>
                        @endforelse
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route ('admin.pizzas.show', $pizza)}}">MOSTRA</a>
                        <a class="btn btn-warning mx-3" href="{{route ('admin.pizzas.edit', $pizza)}}">MODIFICA</a>
                        <form   class="d-inline"
                                onsubmit="return confirm('Sei sicuro di voler cancellare {{$pizza->name}}?')"
                                action="{{route('admin.pizzas.destroy', $pizza)}}"
                                method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="CANCELLA"></form>
                    </td>

                </tr>
                @endforeach

            </tbody>
          </table>
    </div>
@endsection
