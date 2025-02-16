@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Proyek Baru</h1>

        <!-- Formulir untuk membuat proyek baru -->
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Proyek</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required>

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="description">Deskripsi Proyek</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" rows="4">{{ old('description') }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="deadline">Tenggat Waktu</label>
                <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline"
                    name="deadline" value="{{ old('deadline') }}" required>

                @error('deadline')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk tanggal fase design -->
            <div class="form-group my-3">
                <label for="design_date">Design Phase</label>
                <input type="date" class="form-control @error('design_date') is-invalid @enderror" id="design_date"
                    name="design_date" value="{{ old('design_date') }}" min="{{ now()->toDateString() }}" required>

                @error('design_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk tanggal fase development -->
            <div class="form-group my-3">
                <label for="dev_phase">Development phase</label>
                <input type="date" class="form-control @error('dev_phase') is-invalid @enderror" id="dev_phase"
                    name="dev_phase" value="{{ old('dev_phase') }}" min="{{ now()->toDateString() }}" required>

                @error('dev_phase')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk tanggal fase testing -->
            <div class="form-group my-3 mb-5">
                <label for="uat_phase">UAT Phase</label>
                <input type="date" class="form-control @error('uat_phase') is-invalid @enderror" id="uat_phase"
                    name="uat_phase" value="{{ old('uat_phase') }}" min="{{ now()->toDateString() }}" required>

                @error('uat_phase')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Proyek</button>
        </form>
    </div>
@endsection