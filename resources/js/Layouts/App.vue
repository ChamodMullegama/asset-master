<template>
    <div>
        <Head :title="title ? title : 'ASSET MASTER'">
            <link rel="icon" type="image/svg+xml" href="/img/logo/logo.png" />
            <slot name="meta_head" />
        </Head>
        <Side />
            <div class="main-content" id="panel">
                <div class="ml--6 fixed-content">
                    <Nav />
                </div>
                <div class="fixed-content">
                    <slot name="header" />
                </div>
                <div class="container-fluid mt--6 fixed-content">
                    <slot name="content" />
                </div>
            </div>
        <Footer />
        <slot name="modals" />
    </div>
</template>
<script setup>
import Side from "@/Components/Main/Side.vue";
import Nav from "@/Components/Main/Nav.vue";
import Footer from "@/Components/Main/Footer.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>
