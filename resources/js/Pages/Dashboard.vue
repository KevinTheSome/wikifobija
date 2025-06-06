<script setup>
import { marked } from "marked";
import { debounce } from "lodash-es";
import { ref, computed } from "vue";
import { Head, router, Link } from "@inertiajs/vue3";
import NavBar from "@/Components/NavBar.vue";
import Footer from "@/Components/Footer.vue";
</script>

<template>
    <Head title="Dashboard" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.png" />
    <NavBar />

    <section
        class="h-screen grid justify-center content-center gap-4 p-4 grid-cols-1 grid-rows-4 md:grid-cols-3 md:grid-rows-3"
    >
        <h2
            class="text-5xl text-center font-bold inline-block bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text text-transparent md:col-start-2 md:row-start-1 col-start-1 row-start-1"
        >
            Hello {{ $page.props.auth.user.name }}
        </h2>

        <div
            className="card w-full bg-base-300 card-lg shadow-sm col-start-1 row-start-2 md:col-start-1 md:row-start-2"
        >
            <div className="card-body">
                <h2 className="card-title">Make a new phobia</h2>
                <p>
                    A card component has a figure, a body part, and inside body
                    there are title and actions parts
                </p>
                <div className="justify-end card-actions">
                    <Link
                        as="button"
                        href="/phobia/create"
                        className="btn btn-primary"
                        >Go the the editor</Link
                    >
                </div>
            </div>
        </div>

        <div
            className="card w-full bg-base-300 card-lg shadow-sm col-start-1 row-start-3 md:col-start-2 md:row-start-2"
        >
            <div className="card-body">
                <h2 className="card-title">All phobias on the website</h2>
                <p>
                    A card component has a figure, a body part, and inside body
                    there are title and actions parts
                </p>
                <div className="justify-end card-actions">
                    <Link
                        as="button"
                        href="/phobias"
                        className="btn btn-primary"
                        >Go to list</Link
                    >
                </div>
            </div>
        </div>

        <div
            className="card w-full bg-base-300 card-lg shadow-sm col-start-1 row-start-4 md:col-start-3 md:row-start-2"
        >
            <div className="card-body">
                <h2 className="card-title">Pinned phobias</h2>
                <p>
                    A card component has a figure, a body part, and inside body
                    there are title and actions parts
                </p>
                <div className="justify-end card-actions">
                    <Link as="button" href="/pin" className="btn btn-primary"
                        >Go to pinned phobias</Link
                    >
                </div>
            </div>
        </div>
    </section>

    <Footer />
</template>
