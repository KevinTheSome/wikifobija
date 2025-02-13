<script setup>
import { ref } from 'vue';
import { Head, router } from '@inertiajs/vue3';
const commentText = ref('');

const { phobia_id } = defineProps({
    phobia_id: Number
})
function handleInput(){

}

function handleCancel(){
    
}

function handleSubmit(){
    try {
        router.post('/comment', { comment: commentText.value, phobia_id: phobia_id })
    } catch (error) {
        console.log(error)
    }
}

</script>
<template>
    <div class="space-y-4 p-4 bg-white rounded-lg shadow-sm">
      <textarea
        v-model="commentText"
        @input="handleInput"
        placeholder="Write a comment..."
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 resize-none transition-all"
        rows="3"
      ></textarea>
  
      <div class="flex justify-end space-x-2">
        <button
          @click="handleCancel"
          class="px-4 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
        >
          Cancel
        </button>
        <button
          @click="handleSubmit"
          class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors"
        >
          Comment
        </button>
      </div>
    </div>
  </template>