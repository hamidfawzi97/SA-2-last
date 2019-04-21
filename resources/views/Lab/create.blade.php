@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1 || session('role') == 2 || session('role') == 6)
		<h3 align="center">إضافة فاتورة معمل</h3>
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
		<form method="post" action="{{ url('Lab') }}" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم المعمل</label>
				<input type="text" name="labName" class="form-control" placeholder="اسم المعمل" required="" style="text-align:right;">
			</div>

			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ التسليم</label>
				<input type="date" name="deliveryDate" class="form-control" placeholder="تاريخ التسليم" required="">
			</div>

			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ الأستلام</label>
				<input type="date" name="receiptDate" class="form-control" placeholder="تاريخ الأستلام" required="">
			</div>

			<div class="form-group">
				<label style="float: right; font-size: 20px;">التكلفة</label>
				<input type="number" step="0.1" min="0" name="cost" class="form-control" placeholder="التكلفة" required="" style="text-align:right;">
			</div>

			<div class="form-group">
				<label style="float: right; font-size: 20px;">تعليق</label>
				<textarea rows="4" name="comment" class="form-control" placeholder="تعليق" required="" style="resize:none;text-align:right;"></textarea>
			</div>
			<div class="form-group" align="right">
				<label for="male">: انتهت </label>
					<br>
				نعم <input type="radio" name="case_closed" value="1">
					<br>
				لا <input type="radio" name="case_closed" value="0" checked>
					<br>
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">الصورة</label>
				<input type="file" name="select_file" />
				<span class="text-muted">jpeg, jpg, png, gif</span>
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