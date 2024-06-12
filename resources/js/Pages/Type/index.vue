<template>
    <AppLayout title="ASSET MASTER">
        <template #header>
            <div class="header pb-6">
                <div class="container-fluid">
                    <div class="header-body row">
                        <div class="col-lg-8 align-items-center py-4">
                            <h6 class="h2 text-maroon d-inline-block mb-0">
                                Product Type
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
                                        Product Type
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-4 text-right py-4">
                            <button
                                type="button"
                                class="btn btn-sm btn-neutral float-end text-maroon"
                                data-bs-toggle="modal"
                                data-bs-target="#addProductType"
                            >
                                Add New Product Type
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
                                    <label for="type" class="form-label"
                                        >Type</label
                                    >
                                    <select
                                        class="form-select"
                                        id="type"
                                        v-model="addProductType.name"
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
                                        >Type Name</label
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
                                        PRODUCT TYPES
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
                                                v-for="type in paginatedTypes"
                                                :key="type.id"
                                            >
                                                <td>
                                                    <span
                                                        class="badge bg-success"
                                                        v-if="type.status == 1"
                                                        >Available</span
                                                    >
                                                    <span
                                                        class="badge bg-danger"
                                                        v-if="type.status == 0"
                                                        >Unavailable</span
                                                    >
                                                </td>
                                                <td>{{ type.code }}</td>
                                                <td>{{ type.name }}</td>
                                                <td>
                                                    <a
                                                        @click="
                                                            getType(type.id)
                                                        "
                                                        class="btn me-2"
                                                    >
                                                        <i
                                                            class="fas fa-edit"
                                                        ></i>
                                                    </a>
                                                    <a
                                                        @click="
                                                            deleteType(type.id)
                                                        "
                                                        class="btn me-2"
                                                    >
                                                        <i
                                                            class="fas fa-trash"
                                                        ></i>
                                                    </a>
                                                    <a
                                                        v-if="type.status == 0"
                                                        @click="
                                                            changeStatus(
                                                                type.id
                                                            )
                                                        "
                                                        class="btn me-2"
                                                    >
                                                        <i
                                                            class="fas fa-check"
                                                        ></i>
                                                    </a>
                                                    <a
                                                        v-if="type.status == 1"
                                                        @click="
                                                            changeStatus(
                                                                type.id
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
                                                types.length
                                            )
                                        }}
                                        of {{ types.length }} entries</span
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
                id="addProductType"
                tabindex="-1"
                aria-labelledby="addProductModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModalLabel">
                                Add Product Type
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
                                @submit.prevent="addProductTypes"
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
                                        v-model="addProductType.code"
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
                                        v-model="addProductType.name"
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
                id="editTypeModel"
                tabindex="-1"
                aria-labelledby="editTypeTypeLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editTypeModalLabel">
                                Edit Product Type
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
                                @submit.prevent="updateType"
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
                                        v-model="editProductType.code"
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
                                        v-model="editProductType.name"
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
import { ref, onMounted, computed } from "vue";
import AppLayout from "@/Layouts/App.vue";
import axios from "axios";

const addProductType = ref({
    code: "",
    name: "",
});

const editProductType = ref({
    id: "",
    code: "",
    name: "",
});

const types = ref([]);
const currentPage = ref(1);
const itemsPerPage = ref(10);

const totalPages = computed(() => {
    return Math.ceil(types.value.length / itemsPerPage.value);
});

const paginatedTypes = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage.value;
    const end = start + itemsPerPage.value;
    return types.value.slice(start, end);
});

const addProductTypes = async () => {
    try {
        await axios.post(route("type.store"), addProductType.value, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });

        alert("Product type added successfully");
        addProductType.value = { code: "", name: "" };

        const modal = bootstrap.Modal.getInstance(
            document.getElementById("addProductType")
        );
        modal.hide();

        allTypes();
    } catch (error) {
        alert("Failed to add product type");
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

const deleteType = async (id) => {
    try {
        const confirmDelete = confirm(
            "Do you want to delete this product type?"
        );
        if (!confirmDelete) return;

        await axios.delete(route("type.delete", id));

        alert("Product type deleted successfully");
        allTypes();
    } catch (error) {
        alert("Failed to delete product type");
    }
};

const changeStatus = async (id) => {
    try {
        await axios.get(route("type.status", id));
        alert("Product Type changed successfully");
        allTypes();
    } catch (error) {
        alert("Failed to change Product Type status");
    }
};

const getType = async (id) => {
    try {
        const response = await axios.get(route("type.get", id));
        editProductType.value = response.data;

        const modal = new bootstrap.Modal(
            document.getElementById("editTypeModel")
        );
        modal.show();
    } catch (error) {
        alert("Failed to get Product Type");
    }
};

const updateType = async () => {
    try {
        await axios.post(
            route("type.update", editProductType.value.id),
            editProductType.value,
            {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            }
        );

        alert("Product Type updated successfully");
        editProductType.value = {};

        const modal = bootstrap.Modal.getInstance(
            document.getElementById("editTypeModel")
        );
        modal.hide();

        allTypes();
    } catch (error) {
        alert("Failed to update Product Type");
    }
};

const changePage = (page) => {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
    }
};

onMounted(() => {
    allTypes();
});
</script>
