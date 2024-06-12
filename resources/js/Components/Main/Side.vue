<template>
    <nav
        class="bg-white sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light"
        id="sidenav-main"
    >
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="mb-4 text-center sidenav-header">
                <Link
                    class="navbar-brand text-primary"
                    :href="route('dashboard')"
                >
                    <img
                        src="/img/logo/logo2.png"
                        alt="ASSET MASTER"
                        class="home-logo mt-1 ml-1"
                    />
                </Link>
            </div>
            <br />
            <div class="mt-3 navbar-inner">
                <!-- Collapse -->
                <div
                    class="collapse navbar-collapse"
                    id="sidenav-collapse-main"
                >
                    <!-- Nav items -->
                    <ul class="mb-3 navbar-nav">
                        <li class="nav-item">
                            <Link
                                :class="{
                                    active__sidebar:
                                        route().current() == 'dashboard',
                                }"
                                class="nav-link active__sidebar-preloader"
                                :href="route('dashboard')"
                            >
                                <font-awesome-icon icon="fa-solid fa-desktop" />
                                <span class="ml-2 nav-link-text font-weight-400"
                                    >Dashboard</span
                                >
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link
                                class="nav-link active__sidebar-preloader"
                                :class="{
                                    active__sidebar:
                                        $page.url.startsWith('/product'),
                                }"
                                :href="route('product.index')"
                            >
                                <font-awesome-icon
                                    icon="fa-solid fa-hands-holding-circle"
                                />
                                <span class="ml-2 hide-menu font-weight-400"
                                    >Product
                                </span>
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link
                                class="nav-link active__sidebar-preloader"
                                :class="{
                                    active__sidebar:
                                        $page.url.startsWith('/type'),
                                }"
                                :href="route('type.index')"
                            >
                                <font-awesome-icon
                                    icon="fa-solid fa-hands-holding-circle"
                                />
                                <span class="ml-2 hide-menu font-weight-400"
                                    >Product Type</span
                                >
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link
                                class="nav-link active__sidebar-preloader"
                                :class="{
                                    active__sidebar:
                                        $page.url.startsWith('/category'),
                                }"
                                :href="route('category.index')"
                            >
                                <font-awesome-icon
                                    icon="fa-solid fa-hands-holding-circle"
                                />
                                <span class="ml-2 hide-menu font-weight-400"
                                    >Product Category</span
                                >
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
};
</script>

<style lang="scss" scoped>
.navbar-vertical .navbar-brand-img,
.navbar-vertical .navbar-brand > img {
    max-width: 100%;
    max-height: none;
    margin-top: -60px;
    margin-left: -10px;
}

.navbar-vertical.navbar-expand-xs .navbar-collapse {
    margin-top: -50px;
}

.bg__color {
    background-color: rgb(250, 205, 205) !important;
}

.active__sidebar {
    background-color: rgb(255, 235, 235) !important;
    border-radius: 5%;
}

.sidenav {
    width: 15rem !important;
}

.navbar-vertical
    .navbar-nav
    .nav-link[data-toggle="collapse"][aria-expanded="true"]:after {
    transform: rotate(90deg);
    color: #000;
}
</style>
