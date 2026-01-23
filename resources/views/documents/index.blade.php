@extends('layouts.app')

@section('dashboard-content')
<section class="content">
<div class="container-fluid">

    <!-- Card principal -->
    <div class="card card-primary card-outline">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Liste des documents</h3>
            <a href="{{ route('documents.create') }}" class="btn btn-sm btn-primary">
                + Ajouter un document
            </a>
        </div>

        <div class="card-body">

            <!-- Message de succès -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                @forelse ($documents as $document)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100 shadow-sm d-flex flex-column">

                            <!-- Image du document -->
                            @if($document->image)
                                <img src="{{ asset('storage/'.$document->image) }}" 
                                     class="card-img-top img-fluid" alt="Image du document">
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $document->titre }}</h5>
                                <p class="text-muted flex-grow-1">{{ $document->theme }}</p>

                                <span class="badge bg-info mb-2">{{ $document->type_stage }}</span>

                                <p class="text-sm text-muted mb-1">Déposé le : {{ $document->date_depot }}</p>
                                <p class="text-sm text-muted mb-2">Stagiaire ID : {{ $document->stagiaire_id }}</p>

                                @if($document->fichier)
                                    <a href="{{ asset('storage/'.$document->fichier) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-primary mt-auto">
                                        Télécharger
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Aucun document disponible.
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination si nécessaire -->
            <div class="mt-3">
                {{ $documents->links() }}
            </div>

        </div>
    </div>

</div>
</section>
@endsection
