@extends('layouts.app')

@section('dashboard-content')
<section class="content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            {{ __('Enregistrer un projet de stage') }}
        </h3>
    </div>

    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('projets.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Titre du projet</label>
                <input type="text" name="titre"
                       class="form-control @error('titre') is-invalid @enderror"
                       value="{{ old('titre') }}" required>

                @error('titre')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Type de projet</label>
                <input type="text" name="type"
                       class="form-control @error('type') is-invalid @enderror"
                       value="{{ old('type') }}" required>

                @error('type')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Lien du projet</label>
                <input type="url" name="lien"
                       class="form-control @error('lien') is-invalid @enderror"
                       value="{{ old('lien') }}" required>

                @error('lien')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Date d’hébergement</label>
                <input type="date" name="date_hebergement"
                       class="form-control @error('date_hebergement') is-invalid @enderror"
                       value="{{ old('date_hebergement') }}" required>

                @error('date_hebergement')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="4"
                          class="form-control @error('description') is-invalid @enderror"
                          required>{{ old('description') }}</textarea>

                @error('description')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Image du projet</label>
                <input type="file" name="image"
                       class="form-control @error('image') is-invalid @enderror"
                       accept="image/*">

                @error('image')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success ">
                Enregistrer le projet
            </button>
        </form>

    </div>
</div>

</div>
</section>
@endsection
