@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{route ('admin.pizzas.store')}}" method="POST">
            @csrf

            <div class="mb-4">
              <label for="name" class="form-label"><h5>Nome Pizza</h5></label>
              <input    value="{{old('name')}}"
                        type="text"
                        class="form-control @error('name')is-invalid @enderror"
                        name="name"
                        placeholder="Inserisci il nome della pizza"
                        id="name">
                        @error('name')
                            <p class="text-danger"><strong>{{$message}}</strong></p>
                        @enderror
            </div>

            <div class="mb-4 d-flex flex-wrap">


              @foreach ($ingredients as $ingredient)

                <div class="mr-3">
                    <input type="checkbox" name="ingredients[]"
                    id="ingredient{{ $loop->iteration }}"
                    value="{{ $ingredient->id }}"
                    @if (in_array($ingredient->id , old('ingredients', [])))
                        checked
                    @endif>

                    <label for="ingredient{{ $loop->iteration }}" class="form-label"><h5>{{ $ingredient->name }}</h5></label>
                </div>

              @endforeach

            </div>

            <div class="mb-4">
              <label for="price" class="form-label"><h5>Prezzo</h5></label>
              <input    value="{{old('price')}}"
                        type="text"
                        class="form-control @error('price')is-invalid @enderror"
                        name="price"
                        placeholder="Inserire il prezzo"
                        id="price">
                        @error('price')
                            <p class="text-danger"><strong>{{$message}}</strong></p>
                        @enderror
            </div>

            <div class="mb-4">
              <label for="popularity" class="form-label"><h5>Voto Popolarità</h5></label>

              <input    value="{{old('popularity')}}"
                        type="text"
                        class="form-control @error('popularity')is-invalid @enderror"
                        name="popularity"
                        placeholder="Inserire il voto di popolarità"
                        id="popularity">
                        @error('popularity')
                            <p class="text-danger"><strong>{{$message}}</strong></p>
                        @enderror
            </div>

            <div class="d-flex">
                <div>Vegetariana</div>

                <div class="form-check mb-4 mx-4">
                    <input value="sì" class="form-check-input" type="radio" name="isVegetarian" id="isVegetarian1">
                    <label class="form-check-label" for="isVegetarian">
                    Sì
                    </label>
                </div>

                <div class="form-check">
                    <input value="no" class="form-check-input" type="radio" name="isVegetarian" id="isVegetarian2" checked>
                    <label class="form-check-label" for="isVegetarian">
                    No
                    </label>
                </div>
            </div>


            <button type="submit" class="btn btn-success">Crea</button>
          </form>

    </div>


@endsection
