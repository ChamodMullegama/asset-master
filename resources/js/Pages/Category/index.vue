<template>
    <AppLayout title="ASSET MASTER">
        <template #header>
            <div class="header pb-6">
                <div class="container-fluid">
                    <div class="header-body row">
                        <div class="col-lg-8 align-items-center py-4">
                            <h6 class="h2 text-maroon d-inline-block mb-0">
                                Product Category
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
                                        Product Category
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-4 text-right py-4">
                            <button
                                type="button"
                                class="btn btn-sm btn-neutral float-end text-maroon"
                                data-bs-toggle="modal"
                                data-bs-target="#addProductCategory"
                            >
                                Add New Product Category
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
                                        v-model="addCategory.name"
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
                                    class="col-md-4 column__left___padding column__right___padding"
                                >
                                    <label for="name" class="form-label"
                                        >Category Name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control form-control-sm"
                                        id="name"
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
                                        PRODUCT CATEGORY
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="textClassHead">
                                                    Status
                                                </th>
                                                <th class="textClassHead">
                                                    Code
                                                </th>
                                                <th class="valueClassHead">
                                                    Name
                                                </th>
                                                <th class="textClassHead">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="category in paginatedCategories"
                                                :key="category.id"
                                            >
                                                <td>
                                                    <span
                                                        class="badge bg-success"
                                                        v-if="
                                                            category.status == 1
                                                        "
                                                        >Available</span
                                                    >
                                                    <span
                                                        class="badge bg-danger"
                                                        v-if="
                                                            category.status == 0
                                                        "
                                                        >Unavailable</span
                                                    >
                                                </td>
                                                <td>{{ category.code }}</td>
                                                <td>{{ category.name }}</td>
                                                <td>
                                                    <a
                                                        @click="
                                                            getCategory(
                                                                category.id
                                                            )
                                                        "
                                                        class="btn me-2"
                                                    >
                                                        <i
                                                            class="fas fa-edit"
                                                        ></i>
                                                    </a>
                                                    <a
                                                        @click="
                                                            deleteCategory(
                                                                category.id
                                                            )
                                                        "
                                                        class="btn me-2"
                                                    >
                                                        <i
                                                            class="fas fa-trash"
                                                        ></i>
                                                    </a>
                                                    <a
                                                        v-if="
                                                            category.status == 0
                                                        "
                                                        @click="
                                                            changeStatus(
                                                                category.id
                                                            )
                                                        "
                                                        class="btn me-2"
                                                    >
                                                        <i
                                                            class="fas fa-check"
                                                        ></i>
                                                    </a>
                                                    <a
                                                        v-if="
                                                            category.status == 1
                                                        "
                                                        @click="
                                                            changeStatus(
                                                                category.id
                                                            )
                                                        "
                                                        class="btn"
                                                    >
                                                        <i
                                                            class="fas fa-ban"
                                                        ></i>
                                                    </a>
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
                                                categories.length
                                            )
                                        }}
                                        of {{ categories.length }} entries</span
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
                id="addProductCategory"
                tabindex="-1"
                aria-labelledby="addProductCategoryModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5
                                class="modal-title"
                                id="addProductCategoryModalLabel"
                            >
                                Add Product Category
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
                                @submit.prevent="addProductCategory"
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
                                        v-model="addCategory.code"
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
                                        v-model="addCategory.name"
                                    />
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="modal fade"
                id="editCategoryModel"
                tabindex="-1"
                aria-labelledby="editCategoryTypeLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCategoryTypeLabel">
                                Edit Product Category
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
                                @submit.prevent="updateCategory"
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
                                        v-model="editCategory.code"
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
                                        v-model="editCategory.name"
                                    />
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

const addCategory = ref({
    code: "",
    name: "",
});

const editCategory = ref({
    id: "",
    code: "",
    name: "",
});

const categories = ref([]);
const currentPage = ref(1);
const itemsPerPage = ref(10);

const totalPages = computed(() => {
    return Math.ceil(categories.value.length / itemsPerPage.value);
});

const paginatedCategories = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage.value;
    const end = start + itemsPerPage.value;
    return categories.value.slice(start, end);
});

const addProductCategory = async () => {
    try {
        await axios.post(route("category.store"), addCategory.value, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });

        alert("Product category added successfully");
        addCategory.value = { code: "", name: "" };

        const modal = bootstrap.Modal.getInstance(
            document.getElementById("addProductCategory")
        );
        modal.hide();

        allCategories();
    } catch (error) {
        alert("Failed to add product category");
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

const deleteCategory = async (id) => {
    try {
        const confirmDelete = confirm(
            "Do you want to delete this product category?"
        );
        if (!confirmDelete) return;

        await axios.delete(route("category.delete", id));

        alert("Product category deleted successfully");
        allCategories();
    } catch (error) {
        alert("Failed to delete product category");
    }
};

const changeStatus = async (id) => {
    try {
        await axios.get(route("category.status", id));
        alert("Product category status changed successfully");
        allCategories();
    } catch (error) {
        alert("Failed to change product category status");
    }
};

const getCategory = async (id) => {
    try {
        const response = await axios.get(route("category.get", id));
        editCategory.value = response.data;

        const modal = new bootstrap.Modal(
            document.getElementById("editCategoryModel")
        );
        modal.show();
    } catch (error) {
        alert("Failed to get product category");
    }
};

const updateCategory = async () => {
    try {
        await axios.post(
            route("category.update", editCategory.value.id),
            editCategory.value,
            {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            }
        );

        alert("Product category updated successfully");
        editCategory.value = {};

        const modal = bootstrap.Modal.getInstance(
            document.getElementById("editCategoryModel")
        );
        modal.hide();

        allCategories();
    } catch (error) {
        alert("Failed to update product category");
    }
};

const changePage = (page) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
};

onMounted(() => {
    allCategories();
});
</script>
