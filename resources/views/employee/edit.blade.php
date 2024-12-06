@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <div class="container">
        <h1>{{ $pageTitle }}</h1>
        <form action="{{ route('employees.update', $employee->employee_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName"
                    value="{{ old('firstName', $employee->firstname) }}">
                @error('firstName')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName"
                    value="{{ old('lastName', $employee->lastname) }}">
                @error('lastName')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $employee->email) }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age"
                    value="{{ old('age', $employee->age) }}">
                @error('age')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select class="form-select" id="position" name="position">
                    <option value="">-- Select Position --</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}"
                            {{ old('position', $employee->position_id) == $position->id ? 'selected' : '' }}>
                            {{ $position->name }}
                        </option>
                    @endforeach
                </select>
                @error('position')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
