<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="rounded-md border-indigo-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-base-100"
        v-model="model"
        ref="input"
    />
</template>
