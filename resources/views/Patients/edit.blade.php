@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1 || session('role') == 3)
		<h3 align="center">تعديل مريض</h3>
		<br/>
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li >{{ $error }}</li>
			@endforeach
			</ul>
		</div>
		@endif
		<form method="post" action="{{ action('PatientsController@update', $patient['id']) }}">
			{{csrf_field()}}
			{{method_field('PATCH')}}

			<div class="form-group">
				<label style="float: right; font-size: 20px;">الاسم</label>
				<input type="text" name="name" class="form-control" placeholder="اسم المريض" 
				required="" value="{{$patient['name']}}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">السن</label>
				<input type="number" min="0" name="age" class="form-control" placeholder="السن" 
				required="" value="{{$patient['age']}}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">الموبايل</label>
				<input type="number" min="0" minlength="8" name="phone" class="form-control" placeholder="الموبايل" 
				required="" value="{{$patient['phone']}}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">العنوان</label>
				<input type="text" name="address" class="form-control" placeholder="العنوان" 
				required="" value="{{$patient['address']}}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">الوظيفه</label>
				<input type="text" name="job" class="form-control" placeholder="الوظيفه" 
				required="" value="{{$patient['job']}}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">التشخيص العام</label>
				<textarea name="general_diagnosis" rows="2" class="form-control" placeholder="التشخيص العام" 
				style="resize: none;text-align:right;" required="">{{$patient['general_diagnosis']}}</textarea>
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">امراض اخرى</label>
				<textarea name="other_diseases" rows="4" class="form-control" placeholder="امراض اخرى" 
				style="resize: none;text-align:right;" required="">{{$patient['other_diseases']}}</textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary col-md-4 col-md-offset-4" value="تعديل" style="font-size: 20px;">
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