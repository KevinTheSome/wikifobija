<script setup>
import { marked } from "marked";
import { debounce } from "lodash-es";
import { ref, computed } from "vue";
import { Head, router, Link, usePage } from "@inertiajs/vue3";

import comment from "@/Components/Comment.vue";
import commentInput from "@/Components/CommentInput.vue";
import NavBar from "@/Components/NavBar.vue";
import Footer from "@/Components/Footer.vue";

const page = usePage();

const { phobia, cantPin, pinCount, comments } = defineProps({
    phobia: Object,
    cantPin: Boolean,
    pinCount: Number,
    comments: Object,
});

const errorPin = computed(() => page.props.error);

console.log(comments);
const output = marked(phobia.md);

function pin(event) {
    try {
        router.post("/pin", { phobia: phobia.id });
    } catch (error) {
        console.log(error);
    }
}

function unpin(event) {
    try {
        router.post("/pin/delete", { phobia: phobia.id });
    } catch (error) {
        console.log(error);
    }
}
</script>

<template>
    <Head title="Phobia: " + {{ phobia.title }} />
    <NavBar />
    <div class="flex w-full justify-center content-center">
        <h2
            class="text-5xl p-4 font-bold inline-block bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text text-transparent"
        >
            {{ phobia.title }}
        </h2>
    </div>

    <section class="w-full min-h-screen">
        <div class="overflow-hidden bg-base shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="editor prose prose-slate">
                    <div class="output" v-html="output"></div>
                </div>
                <div
                    class="grid justify-center content-center grid-cols-2 gap-5"
                >
                    <div className="card-actions w-full">
                        <Link
                            as="button"
                            :href="'/phobia/' + phobia.id + '/edit'"
                            className="btn btn-primary w-full"
                            >Edit</Link
                        >
                    </div>

                    <div className="card-actions w-full">
                        <Link
                            as="button"
                            className="btn btn-primary w-full"
                            @click="pin()"
                            v-if="!cantPin"
                            >Pin</Link
                        >

                        <Link
                            as="button"
                            className="btn btn-secondary w-full "
                            @click="unpin()"
                            v-else
                            >Unpin</Link
                        >
                    </div>

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
    </section>
    <Footer />
</template>
