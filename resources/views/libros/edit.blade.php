@extends('layouts.main')

@section('title', 'Editar Libro')

@section('content')
    <h1 class="professional-title">Editar el libro</h1>
    <!-- Formulario para editar un libro -->
    <form action="{{ route('libros.update', $libro->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Esto asegura que el formulario utiliza el método PUT para actualizar -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del libro</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $libro->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ old('cantidad', $libro->cantidad) }}" required min="1">
        </div>
        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary ml-2">Cancelar</a>
        </div>
    </form>
@endsection
