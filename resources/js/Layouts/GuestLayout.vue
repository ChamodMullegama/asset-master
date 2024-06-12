<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen justify-content-center pt-6 sm:pt-0 bg-gray-100 bg__login">
        <div class="row justify-content-center login-container">
            <div class="col-md-4">
                <Link href="/" class="d-flex align-items-center flex-column">
                <ApplicationLogo class="w-50 h-50 fill-current text-gray-500 " />
                </Link>
            </div>
        </div>
        <div class="row justify-content-center login-container">
            <div class="col-md-3">
                <div class="w-full mt-4 mb-4 sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.login-container {
    width: 100%;
}

.bg__login {
    /* background: url('/bg/login_bg.png') no-repeat;
    height: 100vh;
    background-position: center; */
}
</style>
