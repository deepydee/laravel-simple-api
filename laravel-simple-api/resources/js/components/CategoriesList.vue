<template>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="#!">All Products</a></li>
        <li>
            <hr class="dropdown-divider" />
        </li>
        <li v-for="category in categories.data"><a class="dropdown-item" href="#!">{{ category.name }}</a></li>
    </ul>
</template>

<script setup>
import { ref } from 'vue';

let categories = ref({});

const getCategories = () => {
    axios.get('/api/categories')
        .then((response) => {
            categories.value = response.data
        })
        .catch((error) => {
            console.error(error.message);
        });
};

getCategories();
// export default {
//     data() {
//         return {
//             categories: []
//         }
//     },
//     methods: {
//         getCategories() {
//             axios.get('/api/categories')
//                 .then((response) => {
//                     this.categories = response.data.data;
//                 })
//                 .catch((error) => {
//                     console.error(error.message);
//                 });
//         }
//     },
//     mounted() {
//         this.getCategories();
//     }
// }
</script>
