<template>
  <AppLayout title="ASSET MASTER">
    <template #header>
      <div class="header pb-6">
        <div class="container-fluid">
          <div class="header-body row">
            <div class="col-lg-8 align-items-center py-4">
              <h6 class="h2 text-maroon d-inline-block mb-0">
                Product Management
              </h6>
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
                  <li class="breadcrumb-item">
                    <Link :href="`/products`" class="text-maroon">
                      Product Management
                    </Link>
                  </li>
                  <li
                    class="breadcrumb-item active text-maroon"
                    aria-current="page"
                  >
                    {{ product.name }}
                  </li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-4 text-right py-4"></div>
          </div>
        </div>
      </div>
    </template>
    <template #content>
      <div class="row my-2 mx-2">
        <div class="col-lg-2 col-md-2">
          <div class="nav-wrapper-loc">
            <ul
              class="nav nav-pills nav-fill flex-column"
              id="tabs-icons-text"
              role="tablist"
            >
              <li class="mb-2 nav-item">
                <a
                  class="nav-link active font-weight-400"
                  data-toggle="tab"
                  href="#product-data"
                  role="tab"
                  aria-controls="customer-data"
                  aria-selected="true"
                >
                  Basic Product Data
                </a>
              </li>
              <li class="mb-2 nav-item">
                <a
                  class="nav-link font-weight-400"
                  data-toggle="tab"
                  href="#image-data"
                  role="tab"
                  aria-controls="password-data"
                  aria-selected="false"
                >
                  Images
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-10 col-md-10">
          <div class="shadow card">
            <div class="card-body">
              <div class="tab-content" id="myTabContent">
                <div
                  class="tab-pane fade show active"
                  id="product-data"
                  role="tabpanel"
                >
                  <div class="">
                    <div class="mt-2 mx-2">
                      <div class="row mt-0">
                        <div class="h3 col-12 text-dark">Basic Data</div>
                      </div>
                    </div>
                    <div class="card-body px-2">
                      <form
                        role="form text-left"
                        @submit.prevent="updateProduct"
                      >
                        <div class="row mb-1">
                          <label for="name" class="col-md-3 col-form-label"
                            >Name</label
                          >
                          <div class="col-md-9">
                            <input
                              type="text"
                              class="form-control form-control-sm"
                              v-model="product.name"
                              id="name"
                              placeholder="Name"
                            />
                          </div>
                        </div>
                        <div class="row mb-1">
                          <label for="code" class="col-md-3 col-form-label"
                            >Code</label
                          >
                          <div class="col-md-9">
                            <input
                              type="text"
                              class="form-control form-control-sm"
                              v-model="product.code"
                              id="code"
                              placeholder="Code"
                            />
                          </div>
                        </div>
                        <div class="row mb-1">
                          <label for="type" class="col-md-3 col-form-label"
                            >Type</label
                          >
                          <div class="col-md-9">
                            <input
                              type="text"
                              class="form-control form-control-sm"
                              v-model="product.type"
                              id="type"
                              placeholder="Type"
                            />
                          </div>
                        </div>
                        <div class="row mb-1">
                          <label for="category" class="col-md-3 col-form-label"
                            >Category</label
                          >
                          <div class="col-md-9">
                            <input
                              type="text"
                              class="form-control form-control-sm"
                              v-model="product.category"
                              id="category"
                              placeholder="Category"
                            />
                          </div>
                        </div>
                        <div class="row mb-1">
                          <label for="price" class="col-md-3 col-form-label"
                            >Price</label
                          >
                          <div class="col-md-9">
                            <input
                              type="text"
                              class="form-control form-control-sm"
                              v-model="product.price"
                              id="price"
                              placeholder="Price"
                            />
                          </div>
                        </div>
                        <div class="row mb-1">
                          <label for="quantity" class="col-md-3 col-form-label"
                            >Quantity</label
                          >
                          <div class="col-md-9">
                            <input
                              type="text"
                              class="form-control form-control-sm"
                              v-model="product.quantity"
                              id="quantity"
                              placeholder="Quantity"
                            />
                          </div>
                        </div>
                        <div class="row mb-1">
                          <label
                            for="description"
                            class="col-md-3 col-form-label"
                            >Description</label
                          >
                          <div class="col-md-9">
                            <input
                              type="text"
                              class="form-control form-control-sm"
                              v-model="product.description"
                              id="description"
                              placeholder="Description"
                            />
                          </div>
                        </div>
                        <div class="text-right mt-2">
                          <button
                            type="button"
                            class="btn btn-round btn-outline-danger btn-sm mb-0"
                            @click="deleteProduct"
                          >
                            DELETE
                          </button>
                          <button
                            type="submit"
                            class="btn btn-round btn-outline-success btn-sm mb-0"
                          >
                            UPDATE
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="image-data" role="tabpanel">
                  <div class="">
                    <div class="mx-2">
                      <div class="row mt-2 pb-0">
                        <div class="h3 col-12 text-dark">Image Update</div>
                      </div>
                    </div>
                    <div class="card-body px-2">
                      <form
                        @submit.prevent="uploadImages"
                        enctype="multipart/form-data"
                      >
                        <div class="mb-3">
                          <label for="images" class="form-label">Images</label>
                          <input
                            type="file"
                            class="form-control"
                            id="product_image"
                            @input="(e) => (product_image = e.target.files[0])"
                          />
                        </div>
                        <div class="text-right mt-2">
                          <button
                            type="submit"
                            class="btn btn-round btn-outline-success btn-sm mb-0"
                          >
                            UPDATE
                          </button>
                        </div>
                      </form>
                      <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Status</th>
                              <th scope="col">Image</th>
                              <th scope="col">Change Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="image in productImages" :key="image.id">
                              <td>
                                <span
                                  class="badge bg-success"
                                  v-if="image.is_primary == 1"
                                  >Primary Image</span
                                >
                                <span
                                  class="badge bg-danger"
                                  v-if="image.is_primary == 0"
                                  >Secondry Image
                                </span>
                              </td>
                              <td>
                                <img
                                  :src="image.image_url"
                                  class="img-thumbnail"
                                  alt="Product Image"
                                  style="max-width: 150px"
                                />
                              </td>
                              <td>
                                <a
                                  v-if="image.is_primary == 0"
                                  @click="changeImageStatus(image.id)"
                                  class="btn me-2"
                                >
                                  <i class="fas fa-check"></i>
                                </a>
                                <a
                                  v-if="image.is_primary == 1"
                                  @click="changeImageStatus(image.id)"
                                  class="btn"
                                >
                                  <i class="fas fa-ban"></i>
                                </a>
                                <span v-if="image.is_primary === 0">
                                  <a
                                    @click="imageDelete(image.id)"
                                    class="btn me-2"
                                  >
                                    <i class="fas fa-trash"></i>
                                  </a>
                                </span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
  </AppLayout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/App.vue";
import axios from "axios";
import { Link } from "@inertiajs/vue3";

const product = ref({});
const product_image = ref(null);
const { props } = usePage();
const productImages = ref([]);
const uploadingImage = ref({});

const getProduct = async () => {
  try {
    const response = await axios.get(route("product.get", props.productId));
    product.value = response.data;
  } catch (error) {
    console.error(error.message);
  }
};

const getProductImages = async () => {
  try {
    const response = await axios.get(
      route("product.images.get", props.productId)
    );
    productImages.value = response.data.data;
  } catch (error) {
    console.error(error.message);
  }
};

const updateProduct = async () => {
  try {
    await axios.post(route("product.update", props.productId), product.value);
    alert("Product updated successfully");
  } catch (error) {
    alert("Failed to update product");
    console.error(error.message);
  }
};

const deleteProduct = async () => {
  if (confirm("Are you sure you want to delete this product?")) {
    try {
      await axios.delete(route("product.delete", props.productId));
      alert("Product deleted successfully");
      window.location.href = route("product.index");
    } catch (error) {
      alert("Failed to delete product");
      console.error(error.message);
    }
  }
};

const uploadImages = async () => {
  if (product_image.value) {
    uploadingImage.value.image = product_image.value;
  } else {
    uploadingImage.value.image = null;
  }

  try {
    await axios.post(
      route("product.upload_images", props.productId),
      uploadingImage.value,
      {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      }
    );
    alert("Images uploaded successfully");
    product_image.value = null;
    getProductImages();
  } catch (error) {
    alert("Failed to upload images");
    console.error(error.message);
  }
};

const changeImageStatus = async (id) => {
  try {
    await axios.get(route("product.images.status", id));
    alert("Image Status changed successfully");
    getProductImages();
  } catch (error) {
    console.error(error.message);
  }
};

const imageDelete = async (id) => {
  if (confirm("Are you sure you want to delete this image?")) {
    try {
      await axios.delete(route("product.images.delete", id));
      alert("Image deleted successfully");
      getProductImages();
    } catch (error) {
      alert("Failed to delete image");
      console.error(error.message);
    }
  }
};

onMounted(() => {
  getProduct();
  getProductImages();
});
</script>
