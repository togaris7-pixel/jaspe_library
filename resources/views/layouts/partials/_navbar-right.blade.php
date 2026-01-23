@php
    $initials = strtoupper(substr(Auth::user()->surname, 0, 1) . substr(Auth::user()->name, 0, 1));
@endphp

<ul class="navbar-nav ml-auto align-items-center">

    {{-- MODE SOMBRE / CLAIR --}}
    <li class="nav-item">
        <a class="nav-link" href="#" id="themeToggle" title="Mode sombre / clair">
            <i class="fas fa-moon"></i>
        </a>
    </li>

    {{-- NOTIFICATIONS --}}
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-book mr-2 text-success"></i> Nouveau livre ajouté
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-user mr-2 text-warning"></i> Profil mis à jour
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Voir tout</a>
        </div>
    </li>

    {{-- PROFIL UTILISATEUR --}}
    <li class="nav-item dropdown">
        <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">
            <div class="user-avatar">
                {{ $initials }}
            </div>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-item text-center font-weight-bold">
                {{ Auth::user()->surname }} {{ Auth::user()->name }}
            </div>

            <div class="dropdown-divider"></div>

            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                <i class="fas fa-user-cog mr-2 text-primary"></i> {{ __('Profile') }}
            </a>

            <div class="dropdown-divider"></div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                   onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </li>

</ul>

{{-- STYLE --}}
<style>
    .user-avatar {
        width: 36px;
        height: 36px;
        background-color: #1f9d55;
        color: white;
        border-radius: 50%;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0,0,0,.2);
    }
</style>

{{-- SCRIPT MODE SOMBRE --}}
<script>
    const toggle = document.getElementById('themeToggle');
    const body = document.body;

    // Charger préférence
    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
        toggle.innerHTML = '<i class="fas fa-sun"></i>';
    }

    toggle.addEventListener('click', function () {
        body.classList.toggle('dark-mode');

        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
            toggle.innerHTML = '<i class="fas fa-sun"></i>';
        } else {
            localStorage.setItem('theme', 'light');
            toggle.innerHTML = '<i class="fas fa-moon"></i>';
        }
    });
</script>
