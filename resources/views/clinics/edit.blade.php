@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Clínica</h1>
    <form action="{{ route('clinics.update', $clinic) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $clinic->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">Email</label>
            <input type="email" class="form-control" id="mail" name="mail" value="{{ old('mail', $clinic->mail) }}" required>
            @error('mail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $clinic->phone) }}" required>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
