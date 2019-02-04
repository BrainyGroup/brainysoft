<template>
	<div>
		<h1>Add allowance types</h1>

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
		<h1>Allowance types</h1>
		<ul class="list-group">
			<li class="list-group-item" v-for="allowance_type in list">
				{{ allowance_type.id }} | {{ allowance_type.name }} | {{ allowance_type.description }} |
				<button @click="showAllowanceType(allowance_type.id)"  class="btn btn-default btn-xs">edit</button>|
				<button @click="deleteAllowanceType(allowance_type.id)"  class="btn btn-danger btn-xs">delete</button>

				
			</li>
				
			
		</ul>
	</div>
</template>

<script>

	export default{
		data: function(){
			return {
				edit:false,
				list:[],
				allowance_type: {
					id:'',
					name:'',
					description:''
				}				
			}
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
		}
	}
	
</script>
