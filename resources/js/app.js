
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import chart from 'chart.js';

import Vue from 'vue';



require('./bootstrap');

//window.Vue = require('vue');

let axios = require('axios');

//Vue.component('allowance_type', require('./components/allowance_type.vue'));

Vue.component('count-up', require('./components/CounterUp.vue'));

Vue.component('graph-line', require('./components/Graph.vue'));


//import Graph from './components/Graph.vue';

new Vue({
  el: '#ap',
  
//components: { Graph }

});

jQuery(document).ready(function( $ ) {
  $('.counter').counterUp({
      delay: 10,
      time: 1000
  });
});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
var ctx = document.getElementById('graph').getContext('2d');

var chart2 = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
          {
            label: 'My First dataset',
            backgroundColor: 'rgba(255, 255, 255,0.1)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
          }
      ]
    },

    // Configuration options go here
    options: {}
});




 
  

  
    


