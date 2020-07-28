<template>
	<div>
		
		@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('messages.center') }} <span class="pull-right"> <a href="/centers/create">{{ __('messages.add') }}</a></span></div>

        <div class="card-body">
		
			<form action="">

			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name" 
					required v-model="newItem.name" placeholder=" Enter some name">
			</div>
			<div class="form-group">
				<label for="age">Age:</label>
				<input type="number" class="form-control" id="age" name="age" 
					required v-model="newItem.age" placeholder=" Enter your age">
			</div>
			<div class="form-group">
				<label for="profession">Profession:</label>
				<input type="text" class="form-control" id="profession" name="profession"
				required v-model="newItem.profession" placeholder=" Enter your profession">
			</div>
			
			<button class="btn btn-primary" @click.prevent="createItem()" id="name" name="name">
			<span class="glyphicon glyphicon-plus"></span> ADD
			</button>

			</form>
             @if( count($centers) > 0 )
           
      <div class="table-responsive">

              <table class="table table-hover table-striped table-bordered">
                  <caption></caption>

                  <thead>
                    <tr>
                      <th scope="col">{{ __('messages.number') }}</th>
                      <th scope="col">{{ __('messages.name') }}</th>
                      <th scope="col">{{ __('messages.description') }}</th>

                      <th scope="col">{{ __('messages.edit') }}</th>
                      <th scope="col">{{ __('messages.delete') }}</th>

                    </tr>
                  </thead>
                  <tbody>

        @foreach($centers as $center)

                    
						<tr  v-for="center in centers" :key="center.id">

                      <td> <a href="/centers/{{$center->id}}">{{ $center->number }}</a> </td>

                      <td><a href="/centers/{{$center->id}}">{{ $center->name }}</a></td>

                      <td><a href="/centers/{{$center->id}}">{{ $center->description}}</a></td>

                      <td><a href="/centers/{{$center->id}}/edit">{{ __('messages.edit') }}</a></td>

                      <td><a href=""
                          onclick="
                          var result = confirm('{{ __('messages.delete confirmation')}} {{ __('messages.center')}}');
                          if (result){
                              event.preventDefault();
                              document.getElementById({{$center->id}}).submit();
                            }">{{ __('messages.delete') }}
                          </a>

                          {!! Form::open(['action' => ['CenterController@destroy',$center->id],'method' => 'DELETE','id' => $center->id]) !!}

                          {!! Form::close() !!}
                      </td>



                    </tr>


          @endforeach

        </tbody>
      </table>
  </div>

        @else

          No center defined

          <a class="pull-right" href="/centers/create">{{ __('messages.add')}}</a>


        @endif

        </div>
    </div>
</div>    
@endsection
    

	</div>
</template>

<script>

	export default{
		data: function(){			
			return {
				renderComponent: true,
				url: "http://example.test",
				edit:false,
				items:[],
				hasError: true,
				newItem:{
					'name':'',
					'age':'',
					'proffessional':'',
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

			createItem: function createItem() {
				var _this = this;
				var input = this.newItem;
				
				if (input['name'] == '' || input['age'] == '' || input['profession'] == '' ) {
					this.hasError = false;
				} else {
					this.hasError = true;
					axios.post('/vueitems', input).then(function (response) {
					_this.newItem = { 'name': '' };
					_this.getVueItems();
					});
				}
				},

			createAllowanceType: function(){
				console.log('creating center....');
				let self = this;
				let params = Object.assign({}, self.center);
				axios.post('/api/center/store', params).
					then(function(){
						self.center.number = '';
						self.allowance_type.name= '';
						self.allowance_type.description= '';
						self.edit = false;
						self.fetchCenters();
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

			},

	
        }

		
	}
	
</script>
