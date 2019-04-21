@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1 || session('role') == 2 || session('role') == 5)
		<h3 align="center">إضافة فاتورة صيانة اجهزه</h3>
		<br/>
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif
		<form method="post" action="{{ action('RepairDevicesController@store')}}">
			{{csrf_field()}}
			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم شركة الصيانة</label>
				<input type="text" name="companyName" class="form-control" placeholder="اسم شركة الصيانة" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ ظهور العطل</label>
				<input type="date" name="appearienceDate" class="form-control" placeholder="تاريخ ظهور العطل" required="">
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ ابلاغ المتصل</label>
				<input type="date" name="callDate" class="form-control" placeholder="تاريخ ابلاغ المتصل" required="">
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ زيارة الشركة</label>
				<input type="date" name="visitDate" class="form-control" placeholder="تاريخ زيارة الشركة" required="">
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">اسم المُتصل</label>
				<input type="text" name="callerName" class="form-control" placeholder="اسم المُتصل" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">التكلفة</label>
				<input type="number" step="0.01" min="0" name="cost" class="form-control" placeholder="التكلفة" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">تعليق</label>
				<textarea rows="4" name="comment" class="form-control" placeholder="تعليق" required="" style="resize:none; text-align:right;"></textarea>
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