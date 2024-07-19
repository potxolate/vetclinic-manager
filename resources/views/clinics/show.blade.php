@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h1 class="h3">{{ $clinic->name }}</h1>
        </div>
        <div class="card-body">            
            <div><span class="mx-2 p-2"><i class="bi bi-envelope"></i></span>{{ $clinic->mail }}</div>
            <div><span class="mx-2 p-2"><i class="bi bi-telephone"></i></span>{{ $clinic->phone }}</div>          
            <h2 class="h5 mt-4">{{ __('messages.Workers') }}</h2>
            @if(!empty($clinic->empleados))
                <p>No employees found for this clinic.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clinic->workers as $worker)
                            <tr>
                                <td>{{ $worker->name }} {{ $worker->surname }}</td>
                                <td>{{ $worker->mail }}</td>
                                <td>{{ $worker->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
