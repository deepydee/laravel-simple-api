<template>
    <div class="container px-4 px-lg-5 mt-5" :class="{ 'loading': loading }">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div v-for="product in products.data" class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ product.name }}</h5>
                            <!-- Product price-->
                            {{ product.price }}
                            <p class="card-text">
                                {{ product.description }}
                            </p>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View
                                options</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Bootstrap5Pagination :data="products" @pagination-change-page="getProducts" class="justify-content-center" />
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

let loading = ref(true);
let products = ref({});

const getProducts = async (page = 1) => {
    const response = await fetch(`/api/products?page=${page}&per_page=3`);
    products.value = await response.json();
    loading.value = false;
}

getProducts();

// export default {
//     data() {
//         return {
//             products: [],
//             loading: true,
//         }
//     },
//     methods: {
//         getProducts(page = 1) {
//             axios.get(`/api/products?page=${page}`)
//                 .then((response) => {
//                     this.products = response.data.data;
//                     this.loading = false;
//                 })
//                 .catch((error) => {
//                     console.error(error.message);
//                 });
//         }
//     },
//     mounted() {
//         this.getProducts();
//     }
// }

</script>
