<script setup>
import { marked } from 'marked'
import { debounce } from 'lodash-es'
import { ref, computed } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

const inputTitle = ref('') //just a demo
const input = ref('# This is a heading \n this is a paragraph \n <br/> [A Link](https://laravel.com)\n') //just a demo

const output = computed(() => marked(input.value))

function saveMd(e) {
    console.log(input.value)
    try {
        router.post('/md', { md: input.value, title: inputTitle.value })
    } catch (error) {
        console.log(error)
    }
}

function deleteMd(e) {
    console.log(input.value)
    input.value = ''
}

const update = debounce((e) => {
    input.value = e.target.value
}, 100)
</script>

<template>

    <Head title="New Phobias" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                New Phobias
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <label for="title">
                            Title
                            <input type="text" placeholder="Title" v-on:input="inputTitle = $event.target.value"
                                :value="inputTitle">
                        </label>
                        <div class="editor prose prose-slate">
                            <textarea class="input" :value="input" @input="update"></textarea>
                            <div class="output" v-html="output"></div>
                        </div>
                        <div class="grid justify-center content-center grid-cols-2 gap-5">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                v-on:click="saveMd(e)">Save</button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                v-on:click="deleteMd(e)">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>