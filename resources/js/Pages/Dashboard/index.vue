<template>
  <AppLayout title="ASSET MASTER">
    <template #header>
      <div class="pb-6 header">
        <div class="container-fluid">
          <div class="header-body">
            <div class="py-4 col align-items-center">
              <h6 class="mb-0 h2 text-maroon d-inline-block">Dashboard</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-block">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item">
                    <Link href="/">
                      <font-awesome-icon
                        icon="fa-solid fa-house"
                        class="text-maroon"
                      />
                    </Link>
                  </li>
                  <li
                    class="breadcrumb-item active text-maroon"
                    aria-current="page"
                  >
                    Dashboard
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </template>
  </AppLayout>
</template>
<script setup>
import AppLayout from "@/Layouts/App.vue";
import { library } from "@fortawesome/fontawesome-svg-core";
import {
  faHouse
} from "@fortawesome/free-solid-svg-icons";
</script>

<style lang="scss" scoped></style>
