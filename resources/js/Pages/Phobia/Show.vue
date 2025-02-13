<script setup>
import comment  from '@/Components/Comment.vue'
import commentInput  from '@/Components/CommentInput.vue'
import { marked } from 'marked'
import { debounce } from 'lodash-es'
import { ref, computed } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, Link,usePage } from '@inertiajs/vue3';

const page = usePage()

const { phobia, cantPin, pinCount, comments } = defineProps({
    phobia: Object,
    cantPin: Boolean,
    pinCount: Number,
    comments: Object
})

const errorPin = computed(() => page.props.error)

console.log(comments)
const output = marked(phobia.md)

function pin(event) {
    try {   
        router.post('/pin', { phobia: phobia.id })
    } catch (error) {
        console.log(error)
    }
}

function unpin(event) {
    try {   
        router.post('/pin/delete', { phobia: phobia.id })
    } catch (error) {
        console.log(error)
    }
}

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
                                as="button" @click="pin()" v-if="!cantPin">Pin</Link>
                                
                            <Link class="bg-blue-500 hover:bg-blue-200 text-white font-bold py-2 px-4 rounded "
                                as="button" @click="unpin()" v-else>Unpin</Link>

                            <p>Pins: {{ pinCount }}</p>
                        </div>
                        <p>{{ response }}</p>
                    </div>
                    <commentInput :phobia_id="phobia.id" />
                    <div v-for="comment in comments">
                        <comment>
                            <template v-slot:name>
                                <p>{{ comment.name }}</p>
                            </template>
                            <template v-slot:comment>
                                <p>{{ comment.comment }}</p>
                            </template>
                        </comment>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>