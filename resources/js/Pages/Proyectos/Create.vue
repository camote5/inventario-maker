<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const form = useForm({ nombre: '', descripcion: '' });
const submit = () => { form.post(route('proyectos.store')); };
</script>

<template>
    <Head title="Registrar Equipo" />
    <AuthenticatedLayout>
        <template #header><h2 class="font-semibold text-xl text-gray-800">Registrar Laptop</h2></template>
        <div class="py-12"><div class="max-w-2xl mx-auto sm:px-6 lg:px-8"><div class="bg-white shadow-sm sm:rounded-lg p-6">
            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label class="block font-bold mb-2">Nombre del Equipo</label>
                    <input v-model="form.nombre" type="text" class="border rounded w-full py-2 px-3" required>
                </div>
                <div class="mb-6">
                    <label class="block font-bold mb-2">Descripción</label>
                    <textarea v-model="form.descripcion" class="border rounded w-full py-2 px-3" rows="3" required></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded">Guardar</button>
            </form>
        </div></div></div>
    </AuthenticatedLayout>
</template>