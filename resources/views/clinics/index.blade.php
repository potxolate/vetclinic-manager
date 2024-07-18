@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clínicas</h1>
    <a href="{{ route('clinics.create') }}" class="btn btn-primary">Crear Clínica</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clinics as $clinic)
            <tr>
                <td>{{ $clinic->name }}</td>
                <td>{{ $clinic->mail }}</td>
                <td>{{ $clinic->phone }}</td>
                <td>
                    <a href="{{ route('clinics.edit', $clinic) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('clinics.destroy', $clinic) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex my-2 justify-content-center">
        {{ $clinics->links() }}
    </div>
    
</div>
@endsection
