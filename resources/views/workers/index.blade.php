@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Workers</h1>
    <a href="{{ route('workers.create') }}" class="btn btn-primary">Create Worker</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Worker</th>
                <th>Mail</th>
                <th>Clinic</th>
                <th>Phone</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workers as $worker)
            <tr>
                <td>{{ $worker->name }} {{ $worker->surname }}</td>
                <td>{{ $worker->mail }}</td>
                <td>{{ $worker->clinic->name }}</td>
                <td>{{ $worker->phone }}</td>
                <td>
                    <a href="{{ route('workers.edit', $worker) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('workers.destroy', $worker) }}" method="POST" class="d-inline">
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
        {{ $workers->links() }}
    </div>
</div>
@endsection
