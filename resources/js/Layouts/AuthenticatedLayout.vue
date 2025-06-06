<script setup>
import { ref } from "vue";
import NavBar from "@/Components/NavBar.vue";
import Footer from "@/Components/Footer.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <link rel="icon" type="image/x-icon" href="./img/favicon.png" />
    <NavBar />
    <div>
        <div class="min-h-screen justify-center content-center p-4">
            <main>
                <slot />
            </main>
        </div>
    </div>
    <Footer />
</template>
