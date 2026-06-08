<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="flex h-screen bg-gray-100 font-sans text-gray-900 antialiased">
        
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col hidden md:flex">
            <div class="h-16 flex items-center px-6 border-b border-gray-200 bg-white">
                <Link :href="route('dashboard')" class="flex items-center gap-2">
                    <ApplicationLogo class="block h-8 w-auto fill-current text-blue-600" />
                    <span class="text-base font-bold text-gray-800 tracking-tight">Inventario Maker</span>
                </Link>
            </div>

            <nav class="flex-1 p-4 space-y-1 bg-white">
                <Link 
                    :href="route('dashboard')" 
                    class="flex items-center px-4 py-2.5 text-sm font-semibold rounded transition-colors"
                    :class="route().current('dashboard') ? 'bg-gray-100 text-blue-600 border-l-4 border-blue-600 pl-3' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900'"
                >
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </Link>
                
                <Link 
                    :href="route('proyectos.index')" 
                    class="flex items-center px-4 py-2.5 text-sm font-semibold rounded transition-colors"
                    :class="route().current('proyectos.*') ? 'bg-gray-100 text-blue-600 border-l-4 border-blue-600 pl-3' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900'"
                >
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    Inventario
                </Link>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 z-10">
                
                <div class="flex-1 flex items-center">
                    <div class="relative w-full max-w-md">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        </span>
                        <input type="text" placeholder="Buscar registros..." class="block w-full pl-9 pr-3 py-1.5 border border-gray-300 rounded bg-gray-50 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm transition-colors">
                    </div>
                </div>

                <div class="ml-4 flex items-center">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <button type="button" class="flex items-center gap-1 text-sm font-medium text-gray-600 hover:text-gray-900 focus:outline-none transition-colors">
                                <span>{{ $page.props.auth.user.name }}</span>
                                <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </button>
                        </template>

                        <template #content>
                            <DropdownLink :href="route('profile.edit')">Perfil</DropdownLink>
                            <DropdownLink :href="route('logout')" method="post" as="button">Cerrar Sesión</DropdownLink>
                        </template>
                    </Dropdown>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
                <div v-if="$slots.header" class="mb-4 pb-2 border-b border-gray-200">
                    <slot name="header" />
                </div>
                
                <slot />
            </main>
        </div>
    </div>
</template>