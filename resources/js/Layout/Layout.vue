<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <main>
    <header class="bg-blue mx-12 my-4 flex justify-between items-center ">
        <h1 class="text-4xl">Luxury Recycle</h1>
        <div class="flex gap-6 uppercase">
            <Link href="/">Home</Link>
            <Link href="/contact">Shop</Link>
            <Link href="/about">sell with us</Link>
            <Link href="/contact">Authenticity</Link>
            <Link href="/contact">Contact</Link>
        </div>
    </header>
    <article>
      <slot />
    </article>
  </main>
</template>