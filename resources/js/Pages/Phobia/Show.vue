<script setup>
import { marked } from 'marked'
import { debounce } from 'lodash-es'
import { ref, computed } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, Link } from '@inertiajs/vue3';

const { phobia } = defineProps({
    phobia: Object
})

console.log(phobia)
const output = marked(phobia.md)

</script>

<template>

    <Head title="Phobia: " + {{ phobia.title }} />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ phobia.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="editor prose prose-slate">
                            <div class="output" v-html="output"></div>
                        </div>
                        <div class="grid justify-center content-center grid-cols-2 gap-5">
                            <Link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                as="button" :href="'/phobia/' + phobia.id + '/edit'">Edit</Link>
                            <Link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                as="button" :href="'/phobias'">Pin</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>