<template>
    <header
        class="h-[100vh] header-bg bg-no-repeat bg-cover grid grid-rows-[80%_20%] grid-cols-[15%_70%_15%] text-center relative">
        <div class="row-start-1 col-start-2 flex items-center justify-center flex-col">
            <h1 class="text-5xl font-serif mb-3">Mint & Jade</h1>
            <h2 class="mb-5">Open from 9 AM till 1 AM</h2>
            <p>~By Y.K</p>
        </div>
        <div class="absolute right-6 bottom-4 flex items-center justify-end w-fit gap-6">
            <Link href="./dashboard" v-if="isAuth" class="text-xl font-bold text-black/50">
            Dashboard
            </Link>
            <a href="https://www.instagram.com/mintandjade/" target="_blank" class=""><img class="w-8 opacity-50"
                    src="../../../public/img/instagram-brands.svg" alt="Instagram Logo"></a>
        </div>
    </header>
</template>

<script>

import { Link } from '@inertiajs/inertia-vue3';
export default {
    props: {
        isAuth: Boolean,
    },
    components: {
        Link,
    }
}
</script>

<style>
.header-bg {
    background-image: url('../../../public/img/head-background.png');
}
</style>



