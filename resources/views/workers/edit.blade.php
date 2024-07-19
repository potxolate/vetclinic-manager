@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Worker</h1>
    <form action="{{ route('workers.update', $worker->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $worker->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ $worker->surname }}" required>
            @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror          
        </div>
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni', $worker->dni) }}" required>
            @error('dni')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">Email</label>
            <input type="email" class="form-control" id="mail" name="mail" value="{{ $worker->mail }}" required>
            @error('mail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $worker->phone }}" required>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
        <label for="clinic_id" class="form-label">Clinic</label>
            <select class="form-control" id="clinic_id" name="clinic_id" required>
                @foreach($clinics as $clinic)
                    <option value="{{ $clinic->id }}" {{ $worker->clinic_id == $clinic->id ? 'selected' : '' }}>
                        {{ $clinic->name }}
                    </option>
                @endforeach
            </select>
            @error('clinic_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>        
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
