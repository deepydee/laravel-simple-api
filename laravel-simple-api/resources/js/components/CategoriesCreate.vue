<template>
    <div class="container">
        <form @submit.prevent="createCategory()" class="form-floating">
            <input v-model="name" type="text" class="form-control mb-3" id="floatingInputValue" placeholder="Category name">
            <label for="floatingInputValue">Name</label>

            <button type="submit" class="btn btn-outline-primary">Create</button>
        </form>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';

let name = ref('');

const createCategory = () => {
    console.log('Creating category...');
    axios.post('/api/categories', {
        // name: name.value
    })
    .then((response) => {
        console.log(`New Category ID: ${response.data.data.id}`);
    })
    .catch((error) => {
        console.error(error.response.data.errors);
    });
};
</script>
