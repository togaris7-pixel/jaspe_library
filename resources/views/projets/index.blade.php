@extends('layouts.app')

@section('dashboard-content')
<section class="content">
<div class="container-fluid">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Les projets') }}</h3>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-3">
        @forelse ($projets as $projet)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 d-flex flex-column">

                    @if ($projet->image)
                        <div class="project-image-wrapper">
                            <img src="{{ asset('storage/'.$projet->image) }}"
                                 alt="Image du projet">
                        </div>
                    @endif

                    <div class="card-header">
                        <h3 class="card-title">{{ $projet->titre }}</h3>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <p class="text-muted flex-grow-1">
                            {{ Str::limit($projet->description, 80) }}
                        </p>

                        <a href="{{ $projet->lien }}"
                           target="_blank"
                           class="btn btn-sm btn-primary mt-auto">
                            Voir le projet
                        </a>
                    </div>

                </div>
            </div>

        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Aucun projet enregistré.
                </div>
            </div>
        @endforelse
    </div>

</div>
</section>
@endsection
