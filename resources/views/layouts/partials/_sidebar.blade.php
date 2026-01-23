<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('projets.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Consulter les projets</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('documents.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-download"></i>
                    <p>Consulter les documents</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('projets.create') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-upload"></i>
                    <p>Déposer Mémoire</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('projets.create') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Déposer Rapport de Stage</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
