<template>
<div class="col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2 style="margin-top: 30px">Ranking </h2>
      <br>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <table class="table">
        <thead>
          <tr>
            <th style="text-align: left; width: 5%;">#</th>
            <th style="text-align: left; width: 20%;">Player Name</th>
            <th style="text-align: left; width: 20%;">Difficulty</th>
            <th style="text-align: left; width: 20%;">Hit</th>
            <th style="text-align: left; width: 20%;">Miss</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(result, index) in results" :key="index" >
            <th style="text-align: left; width: 5%;" scope="row">{{index+1}}</th>
            <td style="text-align: left; width: 30%;">{{result['user_name']}}</td>
            <td style="text-align: left; width: 30%;">{{result['difficulty']}}</td>
            <td style="text-align: left; width: 30%;">{{result['hit']}}</td>
            <td style="text-align: left; width: 30%;">{{result['miss']}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</template>

<script>
import axios from "axios"
import 'bootstrap/dist/css/bootstrap.css'

export default {
    name: 'list',
    data() {
        return {
            results: ''
        }
    },
    methods: {

    },
    mounted() {
         axios.get('/result').then(response => {
            this.results = response.data;
         })
    }
}
</script>