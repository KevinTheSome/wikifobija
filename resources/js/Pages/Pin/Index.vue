<script setup>
import { marked } from 'marked'
import { debounce } from 'lodash-es'
import { ref, computed } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, Link } from '@inertiajs/vue3';

const { phobia } = defineProps(
    { 
        phobias: Object 
    }
)

const input = ref('')

function search() {
    router.get('/pins/search', {search: input.value},{ replace: true })
}

</script>

<template>

    <Head title="All Phobias" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                All pinned phobias
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <input type="text" name="search" placeholder="Search" v-model="input">
                <input type="button" value="Search" v-on:click="search()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p v-for="phobia in phobias">
                            <Link :href="/phobia/ + phobia.id">
                            {{ phobia.title }}
                            </Link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>