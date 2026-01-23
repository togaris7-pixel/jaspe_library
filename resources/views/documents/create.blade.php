@extends('layouts.app')

@section('dashboard-content')
<section class="content">
<div class="container-fluid">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ajouter un document</h3>
        </div>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success m-3">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror"
                           value="{{ old('titre') }}" required>
                    @error('titre')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Type de stage</label>
                    <input type="text" name="type_stage" class="form-control @error('type_stage') is-invalid @enderror"
                           value="{{ old('type_stage') }}" required>
                    @error('type_stage')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Thème</label>
                    <input type="text" name="theme" class="form-control @error('theme') is-invalid @enderror"
                           value="{{ old('theme') }}" required>
                    @error('theme')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Période</label>
                    <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror"
                           value="{{ old('periode') }}" required>
                    @error('periode')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Date de dépôt</label>
                    <input type="date" name="date_depot" class="form-control @error('date_depot') is-invalid @enderror"
                           value="{{ old('date_depot') }}" required>
                    @error('date_depot')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Fichier (pdf, doc, docx)</label>
                    <input type="file" name="fichier" class="form-control @error('fichier') is-invalid @enderror" required>
                    @error('fichier')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Image (optionnelle)</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="hidden" name="stagiaire_id" value="{{ Auth::id() }}">
                    @error('stagiaire_id')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('documents.index') }}" class="btn btn-secondary">Annuler</a>
            </div>

        </form>
    </div>

</div>
</section>
@endsection
