@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')

<!-- Stats cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-500 text-sm">Stagiaires</h2>
        <p class="text-3xl font-bold">$user->count()</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-500 text-sm">Projets</h2>
        <p class="text-3xl font-bold">320</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-500 text-sm">Documents</h2>
        <p class="text-3xl font-bold">12 500 €</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-500 text-sm">Mémoires</h2>
        <p class="text-3xl font-bold">85</p>
    </div>
</div>

<!-- Table -->
<div class="bg-white rounded shadow p-6">
    <h2 class="text-lg font-semibold mb-4">Derniers utilisateurs</h2>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">Nom</th>
                <th class="p-2">Email</th>
                <th class="p-2">Rôle</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t">
                <td class="p-2">Jean Dupont</td>
                <td class="p-2">jean@email.com</td>
                <td class="p-2">Admin</td>
            </tr>
            <tr class="border-t">
                <td class="p-2">Marie Martin</td>
                <td class="p-2">marie@email.com</td>
                <td class="p-2">User</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
