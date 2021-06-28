<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h3>
            Play Game
        </h3>

        <br/>
    </div>
</template>

<script>
import axios from "axios"
import 'bootstrap/dist/css/bootstrap.css'

export default {
    name: 'resultList',
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