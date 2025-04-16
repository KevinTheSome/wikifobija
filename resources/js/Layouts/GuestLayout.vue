<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-base-200 pt-6 sm:justify-center sm:pt-0"
    >
        <div class="">
            <a
                v-if="$page.props.auth.user"
                href="/dashboard"
                class="btn btn-ghost text-4xl bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text text-transparent"
                >wikiphobia</a
            >
            <a
                v-else="$page.props.auth.user"
                href="/"
                class="btn btn-ghost text-4xl bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text text-transparent"
                >wikiphobia</a
            >
        </div>

        <div
            class="mt-6 w-full overflow-hidden bg-base-300 px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
