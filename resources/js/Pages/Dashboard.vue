<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

// Declaramos que este componente recibe la variable 'totalProyectos' desde web.php
defineProps({
    totalProyectos: Number,
});
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Proyectos Registrados</span>
                <span class="text-2xl font-bold text-gray-800 block mt-1">{{ totalProyectos || 0 }}</span>
                <span class="text-xs text-blue-600 font-semibold mt-1 inline-block">● Equipos en el inventario de esta cuenta</span>
            </div>
            
            <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Estado del Servidor</span>
                <span class="text-2xl font-bold text-green-600 block mt-1">En Línea</span>
                <span class="text-xs text-gray-500 font-semibold mt-1 inline-block">✓ Sincronizado y operativo en la nube</span>
            </div>

        </div>
    </AuthenticatedLayout>
</template>