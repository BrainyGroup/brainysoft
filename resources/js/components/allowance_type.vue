<template>
	<div>
		
		

		<form action="#" @submit.prevent="edit ? updateAllowanceType(allowance_type.id): createAllowanceType()">

			<div class="form-group">
								
				 <input v-model="allowance_type.name" type="text" name="name" class="form-control" placeholder="Name">
		
			</div>

			<div class="form-group">				
				<input v-model="allowance_type.description" type="text" name="description" class="form-control" placeholder="Description">
			</div>

			<div class="form-group">
				<button v-show="!edit" type="submit" class="btn btn-primary">New allowance type</button> 
				<button v-show="edit" type="submit" class="btn btn-primary">Update allowance type</button> 
			</div>


		</form>

		

		
		<div class="table-responsive">

              <table class="table  table-hover table-striped table-bordered table-sm">   

                  <thead>
	<tr>
		<th>id</th>
		<th>Name</th>
		<th>Description</th>
	
		<th>Edit</th>
		<th>Actions</th>
	</tr>
                  </thead>
                  <tbody>
					        <tr class="" v-if="list.length === 0">
        <td class="lead text-center" :colspan="4">No data found.</td>
      </tr>

     
                    <tr  v-for="allowance_type in list" :key="allowance_type.id">
                      <td>{{allowance_type.id }}</td>

                    <td>{{ allowance_type.name }}</td>

					<td>{{ allowance_type.description }}</td>

                    <td><button @click="showAllowanceType(allowance_type.id)"  class="btn btn-default btn-sm">edit</button></td>

					

                    <td><button @click="deleteAllowanceType(allowance_type.id)"  class="btn btn-danger btn-sm">delete</button>
                    </td>

                    </tr>
     

        </tbody>
      </table>
  </div>
    

	</div>
</template>

<script>

	export default{
		data: function(){			
			return {
				renderComponent: true,
				edit:false,
				list:[],
				allowance_type: {
					id:'',
					name:'',
					description:''
				},			
				
			}
		},

		created() {
			this.fetchAllowanceTypeList();		
		},


		mounted: function(){
			console.log('allowance types component loaded ...');
			this.fetchAllowanceTypeList();
		},
		

		methods: {

			fetchAllowanceTypeList: function(){
				console.log('fetching allowance_type....');
				axios.get('/api/allowance_types')
				.then((response) => {
					console.log(response.data);
					this.list = response.data;
				}).catch((error) => {
					console.log(error);
				});
				
			},

			createAllowanceType: function(){
				console.log('creating allowance_type....');
				let self = this;
				let params = Object.assign({}, self.allowance_type);
				axios.post('/api/allowance_types/store', params).
					then(function(){
						self.allowance_type.name = '';
						self.allowance_type.description = '';
						self.edit = false;
						self.fetchAllowanceTypeList();
					})
					.catch(function(error){
						console.log(error);
					});
				

			},

			showAllowanceType: function(id){
				console.log('editing allowance_type....');
				let self= this;
				axios.get('api/allowance_types/'+id)
				.then(function(response){
					self.allowance_type.id = response.data.id;
					self.allowance_type.name = response.data.name;
					self.allowance_type.description = response.data.description;
				});
				self.edit = true;

			},

			updateAllowanceType: function(id){
				console.log('updating allowance_type....');
				let self = this;
				let params = Object.assign({}, self.allowance_type);
				axios.patch('/api/allowance_types/'+id, params)
					.then(function(){
						self.allowance_type.name = '';
						self.allowance_type.description = '';
						self.edit = false;
						self.fetchAllowanceTypeList();
						
					})
					.catch(function(error){
						console.log(error);
					});	
							

			},

			deleteAllowanceType: function(id){

             if(confirm("Do you really want to delete "+this.id+ "? ")){

				console.log('deleting allowance_type....');	
				let self = this;			
				axios.delete('/api/allowance_types/'+id).
					then(function() {						
						self.fetchAllowanceTypeList();
					})
					.catch(function(error){
						console.log(error);
					});
			 }	
			 	

			},

	
        }

		
	}
	
</script>
