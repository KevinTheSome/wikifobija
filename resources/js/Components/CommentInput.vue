<script setup>
import { ref } from "vue";
import { Head, router } from "@inertiajs/vue3";
const commentText = ref("");

const { phobia_id } = defineProps({
    phobia_id: Number,
});
function handleInput() {}

function handleCancel() {}

function handleSubmit() {
    try {
        router.post("/comment", {
            comment: commentText.value,
            phobia_id: phobia_id,
        });
    } catch (error) {
        console.log(error);
    }
}
</script>
<template>
    <div class="space-y-4 p-4 bg-base rounded-lg shadow-sm">
        <textarea
            v-model="commentText"
            @input="handleInput"
            placeholder="Write a comment..."
            class="w-full px-4 py-2 border border-indigo-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 resize-none transition-all bg-base-300"
            rows="3"
        ></textarea>

        <div class="flex justify-end space-x-2">
            <button @click="handleCancel" class="btn btn-secondary">
                Cancel
            </button>
            <button @click="handleSubmit" class="btn btn-primary">
                Comment
            </button>
        </div>
    </div>
</template>
