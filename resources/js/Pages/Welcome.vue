<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const isOpen = ref(false);
function toggleMenu() {
    isOpen.value = !isOpen.value;
}
</script>

<template>

    <Head title="Welcome to wikiphobia" />

    <nav class="bg-[#efe8ff] p-4 flex items-center justify-between">
        <!-- Brand -->
        <div class="text-lg text-[#222222] font-bold">wikiphobia</div>

        <!-- Hamburger Menu (visible on mobile) -->
        <button class="block text-white lg:hidden" @click="toggleMenu">
            <img src="/img/svg/menu.svg" alt="Hamburger Menu" />
        </button>

        <div v-if="$page.props.auth.user" class="hidden lg:flex space-x-6 text-white">
            <a href="/random" class="text-[#222222] text-xl">Random</a>
            <a href="/dashboard" class="text-[#222222] text-xl">Dashboard</a>
            <Link href="/logout" method="post" class="text-[#222222] text-xl">Logout</Link>
        </div>

        <div v-else class="hidden lg:flex space-x-6 text-white">
            <a href="/random" class="text-[#222222] text-xl">Random</a>
            <a href="/login" class="hover:text-gray-600 text-[#222222] text-xl">Login</a>
            <a href="/register" class="hover:text-gray-600 text-[#222222] text-xl">Register</a>
        </div>

    </nav>
    <!-- mobile manu , humbarger what ever drop down thig :) -->
    <div v-if="$page.props.auth.user">
        <div v-if="isOpen" class="lg:hidden grid bg-[#e5e1ee] text-[#222222] p-4">
            <a href="/random" class="text-[#222222] text-xl">Random</a>
            <a href="/dashboard" class="text-[#222222] text-xl">Dashboard</a>
            <Link href="/logout" method="post" class="text-[#222222] text-xl">Logout</Link>
        </div>
    </div>

    <div v-else>
        <div v-if="isOpen" class="lg:hidden grid bg-[#e5e1ee] text-[#222222] p-4">
            <a href="/random" class="text-[#222222] text-xl">Random</a>
            <a href="/login" class="text-[#222222] text-xl">Login</a>
            <a href="/register" class="text-[#222222] text-xl">Register</a>
        </div>
    </div>

    <section class="bg-[#f7f3ff] p-4 w-screen h-screen content-center">
        <div class="grid content-center justify-center">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-[#222222]">wikiphobia</h1>
                <p class="text-xl text-[#222222]">Find wikiphobia pages with different phobias.</p>
                <p class="text-l text-[#222222]">We have {{ $page.props.aNumber }} articls in our database.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="bg-[#efe8ff] p-4">
            <div class="text-center text-[#222222] text-xl">wikiphobia :)</div>
        </div>
    </footer>

</template>

<style>
.menu-open {
    display: block;
}
</style>
