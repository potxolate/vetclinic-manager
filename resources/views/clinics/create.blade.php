@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h1 class="h3">Crear Clínica</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('clinics.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter clinic name" value="{{ old('name') }}" required>
                    </div>
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter clinic email" required>
                    </div>
                    @error('mail')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter clinic phone number" required>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" style="width: 50%;">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

