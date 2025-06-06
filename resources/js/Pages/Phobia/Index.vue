<script setup>
import { marked } from "marked";
import { debounce } from "lodash-es";
import { ref, computed } from "vue";
import { Head, router, Link } from "@inertiajs/vue3";
import NavBar from "@/Components/NavBar.vue";
import Footer from "@/Components/Footer.vue";

defineProps({ phobias: Object });

const input = ref("");

function search() {
    router.get("/phobias/search", { search: input.value }, { replace: true });
}
</script>

<template class="h-screen flex flex-col content-center gap-4 p-4">
    <Head title="All Phobias" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.png" />
    <NavBar />
    <div class="flex w-full justify-center content-center">
        <h2
            class="text-5xl p-4 font-bold inline-block bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text text-transparent"
        >
            All Phobias
        </h2>
    </div>
    <section class="h-screen flex flex-col content-center gap-4 p-4">
        <div class="mx-auto w-1/3 sm:px-6 lg:px-8">
            <div class="relative">
                <input
                    class="w-full bg-transparent placeholder:text-slate-400 text-slate-100 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                    placeholder="Phobias name"
                    v-model="input"
                />
                <button
                    class="absolute top-1 right-1 flex items-center rounded bg-slate-800 py-1 px-2.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button"
                    v-on:click="search()"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-4 h-4 mr-2"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                            clip-rule="evenodd"
                        />
                    </svg>

                    Search
                </button>
            </div>
        </div>

        <ul class="list w-full bg-base-200 shadow-md">
            <p v-if="phobias.length == 0">No results</p>
            <Link
                v-else
                v-for="phobia in phobias"
                :href="/phobia/ + phobia.id"
                class=""
            >
                <li class="list-row p-4 border-slate-800 border-b-2">
                    {{ phobia.title }}
                </li>
            </Link>
        </ul>
    </section>
    <Footer />
</template>
