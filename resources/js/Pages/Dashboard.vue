<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h1 class="text-xl font-bold text-gray-900">Panel de Control</h1>
        </template>

        <div class="bg-white border border-gray-200 rounded p-6 shadow-sm mb-6">
            <h2 class="text-lg font-bold text-gray-800 mb-2">Bienvenido al Sistema de Inventario</h2>
            <p class="text-sm text-gray-600 mb-4 max-w-xl">
                La sesión se encuentra activa de forma segura. Desde este panel tienes acceso rápido al control centralizado de componentes y equipos registrados.
            </p>
            <Link :href="route('proyectos.index')" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded transition-colors shadow-sm">
                Acceder a Gestión de Proyectos
            </Link>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Estado del Entorno</span>
                <span class="text-2xl font-bold text-gray-800 block mt-1">Localhost</span>
                <span class="text-xs text-green-600 font-semibold mt-1 inline-block">● Servidor Listo</span>
            </div>
            <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Base de Datos</span>
                <span class="text-2xl font-bold text-gray-800 block mt-1">SQLite</span>
                <span class="text-xs text-blue-600 font-semibold mt-1 inline-block">Almacenamiento Local</span>
            </div>
            <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Motor de Renderizado</span>
                <span class="text-2xl font-bold text-gray-800 block mt-1">Vue.js 3</span>
                <span class="text-xs text-gray-500 font-semibold mt-1 inline-block">Inertia SPA</span>
            </div>
        </div>
    </AuthenticatedLayout>
</template>