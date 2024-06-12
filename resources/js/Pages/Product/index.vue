<template>
    <AppLayout title="ASSET MASTER">
        <template #header>
            <div class="header pb-6">
                <div class="container-fluid">
                    <div class="header-body row">
                        <div class="col-lg-8 align-items-center py-4">
                            <h6 class="h2 text-maroon d-inline-block mb-0">
                                Product
                            </h6>
                            <nav
                                aria-label="breadcrumb"
                                class="d-none d-md-block"
                            >
                                <ol
                                    class="breadcrumb breadcrumb-links breadcrumb-dark"
                                >
                                    <li class="breadcrumb-item">
                                        <Link href="/">
                                            <font-awesome-icon
                                                icon="fa-solid fa-house"
                                                class="text-maroon"
                                            />
                                        </Link>
                                    </li>
                                    <li
                                        class="breadcrumb-item active breadcrumb-yellow"
                                        aria-current="page"
                                    >
                                        Product
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-4 text-right py-4">
                            <button
                                type="button"
                                class="btn btn-sm btn-neutral float-end text-maroon"
                                data-bs-toggle="modal"
                                data-bs-target="#addProduct"
                            >
                                Add New Product
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template #content>
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow card">
                        <div class="pb-3 filters-margin mx-2 text-sm card-body">
                            <div class="row mb-2 mx-1">
                                <div
                                    class="col-md-3 column__left___padding column__right___padding"
                                >
                                    <label for="category" class="form-label"
                                        >Category</label
                                    >
                                    <select
                                        class="form-select"
                                        id="category"
                                        v-model="addProduct.category"
                                    >
                                        <option value="">
                                            Select Category
                                        </option>
                                        <option
                                            v-for="category in categories"
                                            :key="category.name"
                                            :value="category.name"
                                        >
                                            {{ category.name }}
                                        </option>
                                    </select>
                                </div>
                                <div
                                    class="col-md-3 column__left___padding column__right___padding"
                                >
                                    <label for="type" class="form-label"
                                        >Type</label
                                    >
                                    <select
                                        class="form-select"
                                        id="type"
                                        v-model="addProduct.type"
                                    >
                                        <option value="">Select Type</option>
                                        <option
                                            v-for="type in types"
                                            :key="type.name"
                                            :value="type.name"
                                        >
                                            {{ type.name }}
                                        </option>
                                    </select>
                                </div>
                                <div
                                    class="col-md-4 column__left___padding column__right___padding"
                                >
                                    <label for="name" class="form-label"
                                        >Product Name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control form-control-sm"
                                        id="name"
                                        v-model="addProduct.name"
                                        placeholder="Name"
                                    />
                                </div>
                                <div
                                    class="col-md-1 mt-3 column__left___padding column__right___padding d-flex align-items-center justify-content-end"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-ash me-2"
                                        @click="clearForm"
                                    >
                                        Clear
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mt-2 mx-2">
                                <div class="row mt-0">
                                    <div class="h3 mx-2 col-12 text-maroon">
                                        PRODUCTS
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="textClassHead">
                                                    Code
                                                </th>
                                                <th class="textClassHead">
                                                    Name
                                                </th>
                                                <th class="valueClassHead">
                                                    Type
                                                </th>
                                                <th class="textClassHead">
                                                    Category
                                                </th>
                                                <th class="textClassHead">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="product in paginatedProducts"
                                                :key="product.id"
                                                :class="rowClass"
                                                @click.prevent="
                                                    editProduct(product.id)
                                                "
                                            >
                                                <td class="textClassBody">
                                                    {{ product.code }}
                                                </td>
                                                <td class="textClassBody">
                                                    {{ product.name }}
                                                </td>
                                                <td class="valueClassBody">
                                                    {{ product.type }}
                                                </td>
                                                <td class="textClassBody">
                                                    {{ product.category }}
                                                </td>
                                                <td>
                                                    <button class="btn me-2">
                                                        <i
                                                            class="fas fa-edit"
                                                        ></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div
                                    class="d-flex justify-content-between align-items-center"
                                >
                                    <span
                                        >Showing
                                        {{
                                            (currentPage - 1) * itemsPerPage + 1
                                        }}
                                        to
                                        {{
                                            Math.min(
                                                currentPage * itemsPerPage,
                                                products.length
                                            )
                                        }}
                                        of {{ products.length }} entries</span
                                    >
                                    <nav>
                                        <ul class="pagination">
                                            <li
                                                class="page-item"
                                                :class="{
                                                    disabled: currentPage === 1,
                                                }"
                                            >
                                                <a
                                                    class="page-link"
                                                    href="#"
                                                    @click.prevent="
                                                        changePage(
                                                            currentPage - 1
                                                        )
                                                    "
                                                    >Previous</a
                                                >
                                            </li>
                                            <li
                                                class="page-item"
                                                v-for="page in totalPages"
                                                :class="{
                                                    active:
                                                        currentPage === page,
                                                }"
                                                :key="page"
                                            >
                                                <a
                                                    class="page-link"
                                                    href="#"
                                                    @click.prevent="
                                                        changePage(page)
                                                    "
                                                    >{{ page }}</a
                                                >
                                            </li>
                                            <li
                                                class="page-item"
                                                :class="{
                                                    disabled:
                                                        currentPage ===
                                                        totalPages,
                                                }"
                                            >
                                                <a
                                                    class="page-link"
                                                    href="#"
                                                    @click.prevent="
                                                        changePage(
                                                            currentPage + 1
                                                        )
                                                    "
                                                    >Next</a
                                                >
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template #modals>
            <div
                class="modal fade"
                id="addProduct"
                tabindex="-1"
                aria-labelledby="addProductLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductLabel">
                                Add Product
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <form
                                @submit.prevent="addProducts"
                                enctype="multipart/form-data"
                            >
                                <div class="mb-3">
                                    <label for="code" class="form-label"
                                        >Code</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="code"
                                        v-model="addProduct.code"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label"
                                        >Name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        v-model="addProduct.name"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label"
                                        >Type</label
                                    >
                                    <select
                                        class="form-control"
                                        id="type"
                                        v-model="addProduct.type"
                                    >
                                        <option
                                            v-for="type in types"
                                            :key="type.name"
                                            :value="type.name"
                                        >
                                            {{ type.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label"
                                        >Category</label
                                    >
                                    <select
                                        class="form-control"
                                        id="category"
                                        v-model="addProduct.category"
                                    >
                                        <option
                                            v-for="category in categories"
                                            :key="category.name"
                                            :value="category.name"
                                        >
                                            {{ category.name }}
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import AppLayout from "@/Layouts/App.vue";
import axios from "axios";
import { Link } from "@inertiajs/vue3";

const products = ref([]);
const types = ref([]);
const categories = ref([]);
const addProduct = ref({ code: "", name: "", type: "", category: "" });

const currentPage = ref(1);
const itemsPerPage = ref(10);

const totalPages = computed(() => {
    return Math.ceil(products.value.length / itemsPerPage.value);
});

const paginatedProducts = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage.value;
    const end = start + itemsPerPage.value;
    return products.value.slice(start, end);
});

const allProducts = async () => {
    try {
        const response = await axios.get(route("product.all"));
        products.value = response.data;
    } catch (error) {
        alert("Failed to get products");
    }
};

const allTypes = async () => {
    try {
        const response = await axios.get(route("type.all"));
        types.value = response.data;
    } catch (error) {
        alert("Failed to get product types");
    }
};

const allCategories = async () => {
    try {
        const response = await axios.get(route("category.all"));
        categories.value = response.data;
    } catch (error) {
        alert("Failed to get product categories");
    }
};

const addProducts = async () => {
    try {
        await axios.post(route("product.store"), addProduct.value, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });

        alert("Product added successfully");
        addProduct.value = { code: "", name: "", type: "", category: "" };

        const modal = bootstrap.Modal.getInstance(
            document.getElementById("addProduct")
        );
        modal.hide();

        allProducts();
    } catch (error) {
        alert("Failed to add product");
    }
};

const editProduct = async (id) => {
    try {
        window.location.href = route("product.edit", id);
    } catch (error) {
        alert("Failed to edit product");
    }
};

const changePage = (page) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
};

onMounted(() => {
    allProducts();
    allTypes();
    allCategories();
});
</script>
