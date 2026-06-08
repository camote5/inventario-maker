<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    proyectos: Array,
});
</script>

<template>
    <Head title="Inventario" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-900">Laptops en Reacondicionamiento</h1>
                <Link :href="route('proyectos.create')" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded transition-colors shadow-sm">
                    + Registrar Equipo
                </Link>
            </div>
        </template>

        <div class="bg-white border border-gray-200 rounded shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase tracking-wider">
                        <th class="p-3.5">Nombre del Equipo</th>
                        <th class="p-3.5">Descripción / Estado</th>
                        <th class="p-3.5 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                    <tr v-for="proyecto in proyectos" :key="proyecto.id" class="hover:bg-gray-50/70 transition-colors">
                        <td class="p-3.5 font-semibold text-gray-900">{{ proyecto.nombre }}</td>
                        <td class="p-3.5 text-gray-500">{{ proyecto.descripcion }}</td>
                        <td class="p-3.5 text-right">
                            <Link :href="route('proyectos.show', proyecto.id)" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition-colors">
                                Ver Componentes →
                            </Link>
                        </td>
                    </tr>
                    
                    <tr v-if="proyectos.length === 0">
                        <td colspan="3" class="p-8 text-center text-gray-400 italic bg-gray-50/30">
                            No hay equipos registrados en el inventario actual.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>