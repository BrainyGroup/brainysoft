<template>

                       
                       <canvas></canvas>
                 


</template>


<script>

export default {

    props: ['labels','values','color', 'type'],

    // props:{
    //     labels: {},
    //     values: {},
    //     type: {},
    //     color:{
    //         default: 'blue'
    //     }


    // },
    



mounted(){

  var ctx = this.$el.getContext('2d');

  var chart3 = new Chart(ctx, {
    // The type of chart we want to create
    type: this.type,

    // The data for our dataset
    data: {
        labels: this.labels,
        datasets: [
          {
            label: 'My First da',
            backgroundColor: this.color,
            borderColor: 'rgb(255, 99, 132)',
            data: this.values
          },
          
      ]
    },

    // Configuration options go here
    options: {}
});


}




}
</script>