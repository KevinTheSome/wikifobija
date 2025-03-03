<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

import Footer from "@/Components/Footer.vue";
import NavBar from "@/Components/NavBar.vue";
</script>

<template>
    <Head title="Welcome to wikiphobia" />
    <NavBar />

    <section>
        <div class="hero bg-base-200 min-h-screen">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <div class="content-center justify-center">
                    <h1 class="text-5xl text-center font-bold inline-block bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text text-7xl text-transparent">Wikiphobia</h1>
                    <div class="content-center justify-center flex flex-col">
                        <div class="flex flex-row">
                            <p class="py-6">A wiki for phobia. We have </p>
                            <p class="p-1 py-6 bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text text-transparent">{{ $page.props.aNumber }}</p>
                            <p class="py-6"> articals in our database.</p>
                        </div>
                        <Link class="btn btn-primary" as="button" href="/login">Get Started</Link>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <Footer />
</template>

<style>
.menu-open {
    display: block;
}
</style>
