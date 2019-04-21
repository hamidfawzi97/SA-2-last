@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1 || session('role') == 2 || session('role') == 3 || session('role') == 7)	
		<h3 align="center">إضافة مريض</h3>
		<br/>
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
		@endif
		<form method="post" action="{{ url('Patients') }}">
			{{csrf_field()}}
			<!-- <input type="hidden" name="username" value="{{ session('username') }}"> -->
			<div class="form-group">
				<label style="float: right; font-size: 20px;">الاسم</label>
				<input type="text" name="name" class="form-control" placeholder="اسم المريض" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">السن</label>
				<input type="number" min="0" name="age" class="form-control" placeholder="السن" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">الموبايل</label>
				<input type="number" min="0" minlength="8" name="phone" class="form-control" placeholder="الموبايل" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">العنوان</label>
				<input type="text" name="address" class="form-control" placeholder="العنوان" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">الوظيفه</label>
				<input type="text" name="job" class="form-control" placeholder="الوظيفه" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">التشخيص العام</label>
				<textarea name="general_diagnosis" rows="2" class="form-control" placeholder="التشخيص العام" required="" style="resize: none; text-align:right;"></textarea>
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">امراض اخرى</label>
				<textarea name="other_diseases" rows="4" class="form-control" placeholder="امراض اخرى" required="" style="resize: none; text-align:right;"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary col-md-4 col-md-offset-4" value="إضافة" style="font-size: 20px;">
			</div>
		</form>
		<br/>
		<br/>
		<br/>
	@else
		@include('httpAuth')
	@endif
	</div>
</div>

@endsection