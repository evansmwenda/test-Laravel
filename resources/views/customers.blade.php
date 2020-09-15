@extends('layouts.layout')
@section('content')
	<div class="container">
		<div class="col-12">
			<form action="customers" method="POST">{{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email')}}">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			    {{ $errors->first('email')}}
			  </div>
			  <div class="form-group">
			    <label for="exampleInputName">Name</label>
			    <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Full Name" value="{{ old('name')}}">
			    {{ $errors->first('name')}}
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword">Password</label>
			    <input type="text" class="form-control" id="exampleInputPassword" name="password" placeholder="Password" value="{{ old('password')}}">
			    {{ $errors->first('password')}}
			  </div>

			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<ul>
				@foreach($customers as $customer)

					<li>{{ $customer->name }} </li>

				@endforeach
			</ul>
		</div>
	</div>
	

	




@endsection