<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

// Recibimos el ID de la laptop a la que le vamos a agregar la pieza
const props = defineProps({
    proyecto_id: String
});

// Preparamos el formulario, incluyendo un espacio nulo para la imagen
const form = useForm({
    proyecto_id: props.proyecto_id,
    nombre: '',
    cantidad: 1,
    imagen: null,
});

// Esta función se activa cuando seleccionas una foto de tu PC
const handleImageUpload = (event) => {
    form.imagen = event.target.files[0];
};

// Función para enviar los datos y la foto a Laravel
const submit = () => {
    form.post(route('componentes.store'));
};
</script>

<template>
    <Head title="Agregar Repuesto" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Agregar Repuesto al Equipo</h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    
                    <form @submit.prevent="submit" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Nombre del Repuesto (Ej. SSD M.2 1TB, Memoria RAM DDR5)
                            </label>
                            <input v-model="form.nombre" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-300" required>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Cantidad a instalar
                            </label>
                            <input v-model="form.cantidad" type="number" min="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-gray-300" required>
                        </div>

                        <div class="mb-6 border-2 border-dashed border-gray-300 p-4 rounded-lg text-center bg-gray-50">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Fotografía del Repuesto
                            </label>
                            <input type="file" @change="handleImageUpload" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer" required>
                            <p class="text-xs text-gray-500 mt-2">Formatos aceptados: JPG, PNG, WEBP (Max: 2MB)</p>
                            <div v-if="form.errors.imagen" class="text-red-500 text-sm mt-2">{{ form.errors.imagen }}</div>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition" :disabled="form.processing">
                                Guardar y Subir Foto
                            </button>
                            <Link :href="route('proyectos.show', props.proyecto_id)" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800">
                                Cancelar
                            </Link>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>