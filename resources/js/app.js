
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import chart from 'chart.js';
import swal from 'sweetalert2';


require('./bootstrap');

window.Vue = require('vue');


window.swal = swal;
window.Fire = new Vue();

let axios = require('axios');

Vue.component('allowance_type', require('./components/allowance_type.vue'));
Vue.component('all-users', require('./components/AllUsers.vue'));
//Vue.component('centers', require('./components/centers.vue'));

var app = new Vue({
  el: '#app',
  

});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */





  var context = document.getElementById("graph").getContext('2d');
  
	var graph = new Chart(context, {
	 type: 'bar',
  data: {
    datasets: [{
          label: 'Bar Dataset',
          data: [10, 5, 30, 40]
        }, {
          label: 'Line Dataset',
          data: [10, 2, 30, 40],
          backgroundColor: 'rgba(0, 0, 255, 0.5)',
          borderColor: 'rgba(0, 255, 0, 0.9)',

          // Changes this dataset to become a line
          type: 'line'
        }],
    labels: ['January', 'February', 'March', 'April']
  },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });