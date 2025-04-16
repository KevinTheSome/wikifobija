<script setup></script>
<template>
    <div class="grid grid-rows-2 bg-base-200 p-4 gap-4 rounded shadow">
        <h3
            class="text-xl p-4 font-bold inline-block bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text text-transparent"
        >
            <slot name="name"></slot>
        </h3>
        <p class="text-md">
            <slot name="comment"></slot>
        </p>
    </div>
</template>
