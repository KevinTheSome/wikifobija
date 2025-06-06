<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import { ref, computed } from "vue";
import { Head, router, Link } from "@inertiajs/vue3";
import NavBar from "@/Components/NavBar.vue";
import Footer from "@/Components/Footer.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <div>
            <div class="">
                <div class="card w-full bg-base-300 card-lg shadow-sm p-4 m-4">
                    <UpdateProfileInformationForm
                        :must-verify-email="mustVerifyEmail"
                        :status="status"
                        class="max-w-xl"
                    />
                </div>

                <div class="card w-full bg-base-300 card-lg shadow-sm p-4 m-4">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="card w-full bg-base-300 card-lg shadow-sm p-4 m-4">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
