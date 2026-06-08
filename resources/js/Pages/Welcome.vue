<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Bienvenido" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-100 selection:bg-blue-500 selection:text-white">
        
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Iniciar Sesión</Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Registrarse</Link>
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8 text-center">
            
            <h1 class="text-5xl font-bold text-gray-900 mb-6 tracking-tight">
                Inventario <span class="text-blue-600">Maker</span>
            </h1>
            
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                Sistema para la gestión, registro y reacondicionamiento de equipos y componentes de hardware.
            </p>

            <div class="flex justify-center gap-4 mt-8">
                <Link v-if="!$page.props.auth.user" :href="route('login')" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-150 ease-in-out shadow-lg hover:shadow-xl">
                    Ingresar al Sistema
                </Link>
                <Link v-if="$page.props.auth.user" :href="route('proyectos.index')" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-150 ease-in-out shadow-lg hover:shadow-xl">
                    Ir al Inventario
                </Link>
            </div>
            
        </div>
    </div>
</template>