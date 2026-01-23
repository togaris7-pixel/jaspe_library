<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS (simple & efficace) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white">
        <div class="p-4 text-xl font-bold border-b border-gray-700">
            Admin Panel
        </div>
        <nav class="p-4 space-y-2">
            <a href="#" class="block p-2 rounded hover:bg-gray-700">Dashboard</a>
            <a href="#" class="block p-2 rounded hover:bg-gray-700">Stagiaires</a>
            <a href="#" class="block p-2 rounded hover:bg-gray-700">Documents</a>
            <a href="#" class="block p-2 rounded hover:bg-gray-700">Projets</a>
        </nav>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-6">
        <!-- Header -->
        <header class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">@yield('page-title')</h1>
            <div>
                <span class="mr-4">Admin</span>
                <a href="#" class="text-red-600 font-semibold">Déconnexion</a>
            </div>
        </header>

        <!-- Page Content -->
        @yield('content')
    </main>

</div>

</body>
</html>
