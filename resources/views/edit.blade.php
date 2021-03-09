@extends('index')

@section('content')
	<h3 class="text-center mb-3 pt-3">Thông tin</h3>
	<form action="{{ route('admin.user.update', $values->id) }}" method="POST">
		
		@csrf


		<div class="form-group">
			<input type="text" name="username" id="username" value="{{ $values->username }}" class="form-control">
		</div>

		<div class="form-group">
			<input type="text" name="name" id="name" value="{{ $values->name }}" class="form-control">
		</div>

		<div class="form-group">
			<input type="text" name="password" id="password" value="{{ $values->password }}" class="form-control">
		</div>

		<div class="form-group">
			<input type="text" name="address" id="address" value="{{ $values->address }}" class="form-control">
		</div>

		<button type="submit" class="btn btn-warning btn-block">Lưu</button>
	</form>
	@if(session('update'))
		<div class="alert alert-success mt-3">
			{{session('update')}}
			<button type="button" class="close" data-dismiss="alert">
                <span>×</span><span class="sr-only">Close</span>
            </button>
		</div>
	@endif
@endsection