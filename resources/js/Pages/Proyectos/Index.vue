<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({ proyectos: Array });
</script>

<template>
    <Head title="Inventario" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Laptops en Reacondicionamiento</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">Inventario de Equipos</h3>
                        <Link :href="route('proyectos.create')" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                            + Registrar Equipo
                        </Link>
                    </div>

                    <table class="min-w-full bg-white border rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Descripción</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="proyecto in proyectos" :key="proyecto.id" class="border-t">
                                <td class="px-6 py-4">{{ proyecto.nombre }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ proyecto.descripcion }}</td>
                                <td class="px-6 py-4 text-right">
                                    <Link :href="route('proyectos.show', proyecto.id)" class="text-indigo-600 hover:text-indigo-900 font-bold">
                                        Ver Componentes
                                    </Link>
                                </td>
                            </tr>
                            <tr v-if="proyectos.length === 0">
                                <td colspan="3" class="px-6 py-8 text-center text-gray-500">Aún no hay equipos.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>