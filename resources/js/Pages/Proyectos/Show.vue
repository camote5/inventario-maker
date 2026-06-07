<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3'; // Importamos router

defineProps({ proyecto: Object });

// Función para confirmar y eliminar
const eliminarComponente = (id) => {
    if (confirm('¿Estás seguro de que deseas eliminar este repuesto del inventario?')) {
        router.delete(route('componentes.destroy', id));
    }
};
</script>

<template>
    <Head :title="proyecto.nombre" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800">Detalles: {{ proyecto.nombre }}</h2>
                <Link :href="route('proyectos.index')" class="text-sm text-gray-500 font-bold">← Volver</Link>
            </div>
        </template>

        <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6 border-l-4 border-blue-500">
                <h3 class="font-bold mb-2">Estado / Observaciones:</h3><p class="text-gray-600">{{ proyecto.descripcion }}</p>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Repuestos Instalados</h3>
                    <Link :href="route('componentes.create', { proyecto_id: proyecto.id })" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-sm transition shadow">
                        + Agregar Repuesto
                    </Link>
                </div>

                <table v-if="proyecto.componentes.length > 0" class="min-w-full mt-4 border">
                    <thead>
                        <tr class="bg-gray-100 text-left text-xs text-gray-500 uppercase border-b">
                            <th class="px-4 py-3">Foto</th>
                            <th class="px-4 py-3">Pieza</th>
                            <th class="px-4 py-3">Cant.</th>
                            <th class="px-4 py-3 text-right">Acciones</th> </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pieza in proyecto.componentes" :key="pieza.id" class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">
                                <img v-if="pieza.imagen" :src="`/storage/${pieza.imagen}`" class="w-16 h-16 object-cover rounded shadow border">
                                <span v-else class="text-xs text-gray-400">Sin foto</span>
                            </td>
                            <td class="px-4 py-2 font-bold text-gray-700">{{ pieza.nombre }}</td>
                            <td class="px-4 py-2 text-gray-600">{{ pieza.cantidad }} uni.</td>
                            <td class="px-4 py-2 text-right">
                                <button @click="eliminarComponente(pieza.id)" class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs px-3 py-1.5 rounded-lg transition shadow-sm">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-else class="text-center py-8 text-gray-500 bg-gray-50 rounded border border-dashed">Aún no hay repuestos registrados para esta laptop.</div>
            </div>
        </div></div>
    </AuthenticatedLayout>
</template>