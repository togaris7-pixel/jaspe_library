@extends('layouts.app')

@section('dashboard-content')
<section class="content mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $documentsCount }}</h3>
                        <p>Documents disponibles</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <a href="{{ route('documents.index') }}" class="small-box-footer">Voir les documents <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $downloadsCount }}</h3>
                        <p>Documents téléchargés</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-download"></i>
                    </div>
                    <a href="{{ route('projets.create') }}" class="small-box-footer">Télécharger <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $memoiresCount }}</h3>
                        <p>Mémoires déposés</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-upload"></i>
                    </div>
                    <a href="{{ route('projets.create') }}" class="small-box-footer">Déposer mémoire <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $rapportsCount }}</h3>
                        <p>Rapports déposés</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <a href="{{ route('projets.create') }}" class="small-box-footer">Déposer rapport <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
