<template>
    <nav
        class="bg__nav navbar navbar-top navbar-expand navbar-red bg- border-bottom"
    >
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center ml-md-auto">
                    <li class="nav-item d-xl-none">
                    
                        <div
                            class="pr-3 sidenav-toggler sidenav-toggler-dark"
                            data-action="sidenav-pin"
                            data-target="#sidenav-main"
                        >
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link pr-0"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            color="#505050"
                        >
                            <div class="media align-items-center">
                                <i class="fa fa-user me-sm-1 text-white"></i>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span
                                        class="mb-0 text-sm font-weight-bold text-white"
                                    >
                                        {{ $page.props.auth.user.name }}</span
                                    >
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a
                                class="dropdown-item border-radius-md"
                                href="javascript:void(0)"
                                @click.prevent="viewProfile"
                            >
                                <font-awesome-icon
                                    icon="fa-solid fa-user "
                                    class="text-maroon"
                                />
                                <span class="text-maroon">Profile</span>
                            </a>
                            <Link
                                href="/logout"
                                as="button"
                                method="post"
                                class="dropdown-item text-maroon"
                            >
                                <i class="ni ni-user-run text-maroon"></i>
                                <span>Logout</span>
                            </Link>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<style lang="scss" scoped>
.bg__nav {
    background-color: hsl(0, 74%, 27%) !important;
}
.nav-link:hover .fa-user {
    color: #505050;
}
</style>
