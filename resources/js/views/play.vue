<template>
    <div style="text-align: center;" class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h3>
            Play Game
        </h3>
        <br>
        <div class="form-group">
            Game Difficulty: <span style="color: red; font-weight: bold;">{{difficulty}}</span>
        <br>
        </div>
        <div class="form-group">
            <button @click="startGame" type="submit" class="btn btn-primary">Start Game</button>
        </div>

        <div class="form-group">
            {{number}}
        </div>

        <div class="form-group">
            <input type="text" placeholder="Input Letter" v-model="letter" @input="checkChar"/>
        </div>

        <div class="form-group">
            <span v-for="(c, index) in char" :key="index">
                <span v-if="index !== 0" v-bind:class="getClass(index)">
                    {{c}} ({{index}})
                </span>
            </span>
        </div>

        <div class="form-group">
            Hits: {{hit.length}}
            <br>
            Miss: {{miss.length}}
        </div>

        <router-link to="/dashboard" class="btn btn-secondary">Back</router-link>
    </div>
</template>

<script>
import axios from "axios"
import 'bootstrap/dist/css/bootstrap.css'

export default {
    name: 'play',
    data() {
        return {
            number: 0,
            char: ['','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'],
            generatedNumbers: [],
            id: this.$route.params.id,
            difficulty: null,
            letter: '',
            hit: [],
            miss: [],
            left: ''
        }
    },
    methods: {
        getClass(index) {
            if (this.hit.indexOf(index) != -1) {
                return ['green']
            }
            if (this.miss.indexOf(index) != -1) {
                return ['red']
            }
        },
        checkChar() {
            let c = this.letter || '';
            if (this.char.indexOf(c.toUpperCase()) != this.number) {
                if (this.miss.indexOf(this.number) == -1) {
                    this.miss.push(this.number)
                }
            } else {
                if (this.hit.indexOf(this.number) == -1) {
                    this.hit.push(this.number)
                }
            }
        },
        saveResult() {
            axios.post(`/create`, { hit: this.hit.length, miss: this.miss.length, difficulty: this.difficulty })
            .then(response => {
                this.$router.push('/dashboard');
            })
        },
        randNumber() {
            var nums = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26],
            i = nums.length,
            j = 0;
            while (i--) {
                j = Math.floor(Math.random() * (i+1));
                let n = nums[j];
                if (this.generatedNumbers.indexOf(n) != -1) {
                    return this.randNumber()
                }
                this.generatedNumbers.push(nums[j]);
                return nums.splice(j,1);
            }
        },
        startGame() {
            axios.get(`/game/get/${this.id}`).then(response => {
            this.difficulty = response.data

            if (response.data === 'easy') {
                response.data = 5000;
            } else if(response.data === 'medium') {
                response.data = 3500;
            } else {
                response.data = 2000;
            }

            var self = this;
            var handle = setInterval(function() {
                self.number = self.randNumber()[0]
                self.checkChar()
                self.letter = '';
                if (self.generatedNumbers.length >= 26) {
                    clearInterval(handle)
                    self.saveResult()
                }

            }, response.data);
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    },
    mounted() {
         axios.get(`/game/get/${this.id}`).then(response => {
            this.difficulty = response.data
         })
    }
}
</script>

<style scoped>
.green {
    color: green;
}

.red {
    color: red;
}
</style>