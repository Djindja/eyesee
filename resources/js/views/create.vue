<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h3>
            Create a new task
        </h3>
        <div class="form-group">
            <label for="name">Task Title</label>
            <input type="text" class="form-control" name="title" v-model="title" />
        </div>

        <div class="form-group">
            <label for="message">Task Description</label>
            <textarea class="form-control" name="description" v-model="description" rows="5"></textarea>
        </div>

        <button v-on:click="saveTask" type="submit" class="btn btn-primary">Save</button>
        <router-link to="/dashboard" class="btn btn-secondary">Back</router-link>
    </div>
</template>

<script>
import axios from "axios"
import 'bootstrap/dist/css/bootstrap.css'

export default {
    name: 'createResult',
    data() {
        return {
            hit: '',
            miss: '',
            left: ''
        }
    },
    methods: {
        saveTask() {
            axios.post(`/result`, { hit: this.hit, miss: this.miss, left: this.left })
            .then(response => {
                this.$router.push('/game');
            })
        }
    }
}
</script>