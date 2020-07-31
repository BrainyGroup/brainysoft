
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import chart from 'chart.js';
import swal from 'sweetalert2';

import Vue from 'vue';



require('./bootstrap');



window.swal = swal;
window.Fire = new Vue();

let axios = require('axios');

Vue.component('allowance_type', require('./components/allowance_type.vue'));
Vue.component('all-users', require('./components/AllUsers.vue'));
//Vue.component('centers', require('./components/centers.vue'));
//Vue.component('allowance_type', require('./components/allowance_type.vue'));

//import UserDataTable from './components/Users'

Vue.component('count-up', require('./components/CounterUp.vue'));

Vue.component('graph-line', require('./components/Graph.vue'));

Vue.component('data-table', require('./components/Users.vue'));









var app = new Vue({
  el: '#app',
  data: {
    searchQuery: '',
   
  }

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

String.prototype.toProperCase = function() {
  var words = this.split(' ');
  var results = [];
  for (var i=0; i < words.length; i++) {
      var letter = words[i].charAt(0).toUpperCase();
      results.push(letter + words[i].slice(1));
  }
  return results.join(' ');
};




 
  

  
    


