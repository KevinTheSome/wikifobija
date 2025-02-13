<script setup>

</script>
<template>
    <div class="grid grid-cols-2 bg-gray-200 p-4 gap-4 rounded shadow">
        <div>
            <slot name="name"></slot>
        </div>
        <div>
            <slot name="comment"></slot>
        </div>
    </div>


</template>