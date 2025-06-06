<script setup>
import { marked } from "marked";
import { debounce } from "lodash-es";
import { ref, computed } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";

const inputTitle = ref(""); //just a demo
const input = ref(
    "# This is a heading \n this is a paragraph \n <br/> [A Link](https://laravel.com)\n"
); //just a demo

const output = computed(() => marked(input.value));

function saveMd(e) {
    console.log(input.value);
    try {
        router.post("/md", { md: input.value, title: inputTitle.value });
    } catch (error) {
        console.log(error);
    }
}

function deleteMd(e) {
    console.log(input.value);
    input.value = "";
}

const update = debounce((e) => {
    input.value = e.target.value;
}, 100);
</script>

<template>
    <Head title="New Phobias" />
    <link rel="icon" type="image/x-icon" href="./img/favicon.png" />
    <NavBar />
    <div class="flex w-full justify-center content-center">
        <h2
            class="text-5xl p-4 font-bold inline-block bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text text-transparent"
        >
            New Phobias
        </h2>
    </div>

    <section class="w-full min-h-screen">
        <div class="overflow-hidden bg-base shadow-sm sm:rounded-lg">
            <div class="p-1 grid grid-cols-2 h-screen w-screen">
                <div class="border-r p-1">
                    <div class="editor flex flex-col w-full gap-1 h-full">
                        <input
                            type="text"
                            placeholder="Title"
                            class="input border-white border-1 h-18 focus:ring-0 focus:ring-offset-0"
                            v-on:input="inputTitle = $event.target.value"
                            :value="inputTitle"
                        />
                        <textarea
                            class="input border-white border-1 resize-none h-full focus:ring-0 focus:ring-offset-0"
                            :value="input"
                            @input="update"
                            rows="1"
                        ></textarea>
                    </div>
                </div>
                <div class="p-1">
                    <h2
                        class="text-5xl p-4 font-bold inline-block bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text text-transparent"
                    >
                        {{ inputTitle }}
                    </h2>
                    <div class="editor prose prose-slate">
                        <div class="output" v-html="output"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky bottom-0">
            <div class="grid justify-center content-center grid-cols-2 gap-5">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    v-on:click="saveMd(e)"
                >
                    Save
                </button>
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                    v-on:click="deleteMd(e)"
                >
                    Delete
                </button>
            </div>
        </div>
    </section>
    <Footer />
</template>
