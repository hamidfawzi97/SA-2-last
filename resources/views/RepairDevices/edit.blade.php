@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1)
		<h3 align="center">تعديل فاتورة الصيانة</h3>
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
		<form method="post" action="{{ action('RepairDevicesController@update', $repairDevice['id']) }}">
			{{csrf_field()}}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم شركة الصيانة</label>
				<input type="text" name="companyName" class="form-control" placeholder="اسم شركة الصيانة" value="{{ $repairDevice['company_name'] }}" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ ظهور العطل</label>
				<input type="date" name="appearienceDate" class="form-control" placeholder="تاريخ ظهور العطل" value="{{ $repairDevice['appearience_date'] }}" required="">
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ ابلاغ المتصل</label>
				<input type="date" name="callDate" class="form-control" placeholder="تاريخ ابلاغ المتصل" value="{{ $repairDevice['call_date'] }}" required="">
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ زيارة الشركة</label>
				<input type="date" name="visitDate" class="form-control" placeholder="تاريخ زيارة الشركة" value="{{ $repairDevice['visit_date'] }}" required="">
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">اسم المُتصل</label>
				<input type="text" name="callerName" class="form-control" placeholder="اسم المُتصل" value="{{ $repairDevice['caller_name'] }}" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">التكلفة</label>
				<input type="number" step="0.01" min="0" name="cost" class="form-control" placeholder="التكلفة" value="{{ $repairDevice['cost'] }}" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">تعليق</label>
				<textarea rows="4" name="comment" class="form-control" placeholder="تعليق" style="resize:none; text-align:right;" required="">{{ $repairDevice['comment'] }}</textarea>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary col-md-4 col-md-offset-4" value="تعديل" style="font-size: 20px;">
			</div>
		</form>
		<br>
		<br>
		<br>
	@else
		@include('httpAuth')
	@endif
	</div>
</div>

@endsection