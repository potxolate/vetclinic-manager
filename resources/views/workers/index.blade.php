@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Workers</h1>
    <a href="{{ route('workers.create') }}" class="btn btn-primary">Create Worker</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Mail</th>
                <th>Phone</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workers as $worker)
            <tr>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->mail }}</td>
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
    {{ $workers->links() }}
</div>
@endsection
