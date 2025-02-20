<script setup>
import { ref } from 'vue';

const isOpen = ref(false);

function toggleMenu() {
    isOpen.value = !isOpen.value;
}
</script>

<template>
<div class="navbar bg-base-100 overscroll-contain">
  <div class="flex-1">
    <a class="btn btn-ghost text-xl bg-gradient-to-r from-indigo-300 to-indigo-400 bg-clip-text text-transparent">wikiphobia</a>
  </div>
  <div class="flex-none navbar-end mr-5">
    <ul class="menu menu-horizontal px-1">
      <li><a href="/random" class="ms-8">Random</a></li>
      <li class="">
        <details>
          <summary>More</summary>
          <ul v-if="$page.props.auth.user" dir="rtl" class="bg-base-100 rounded-t-none w-25 flex flex-col items-center ms-8">
            <li><a href="/dashboard" class="ms-8">Dashboard</a></li>
            <li><Link href="/logout" method="post" class="ms-8">Logout</Link></li>
          </ul>
          <ul v-else dir="rtl" class="bg-base-100 rounded-t-none w-25 flex flex-col items-center ms-8">
            <li><a href="/login" class="ms-8">Login</a></li>
            <li><Link href="/register" method="post" class="ms-8">Register</Link></li>
          </ul>
        </details>
      </li>
    </ul>
  </div>
</div>
</template>