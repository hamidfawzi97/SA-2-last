@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1 || session('role') == 2 || session('role') == 6)
		<h3 align="center">تعديل فاتورة معمل</h3>
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
		<form method="post" action="{{ action('LabController@update', $lab['id']) }}" enctype="multipart/form-data">
			{{csrf_field()}}
			{{method_field('PATCH')}}

			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم المعمل</label>
				<input type="text" name="labName" class="form-control" placeholder="اسم المعمل" value="{{ $lab['lab_name'] }}" required="" style="text-align:right;">
			</div>

			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ التسليم</label>
				<input type="date" name="deliveryDate" class="form-control" placeholder="تاريخ التسليم" value="{{ $lab['delivery_date'] }}" required="">
			</div>

			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ الأستلام</label>
				<input type="date" name="receiptDate" class="form-control" placeholder="تاريخ الأستلام" value="{{ $lab['receipt_date'] }}" required="">
			</div>

			<div class="form-group">
				<label style="float: right; font-size: 20px;">التكلفة</label>
				<input type="number" step="0.1" min="0" name="cost" class="form-control" placeholder="التكلفة" value="{{ $lab['cost'] }}" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تعليق</label>
				<textarea rows="4" name="comment" class="form-control" placeholder="تعليق"  required=""style="resize:none; text-align:right;">{{ $lab['comment']}}</textarea>
			</div>
			<div class="form-group" align="right">
				<label for="male">: انتهت </label>
					<br>
				نعم <input type="radio" name="case_closed" value="1" <?php if($lab->Role_type == 1) echo "checked"; ?>>
					<br>
				لا <input type="radio" name="case_closed" value="0" <?php if($lab->Role_type == 0) echo "checked"; ?>>
					<br>
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">الصورة</label>
				<input type="file" name="select_file" />
				<span class="text-muted">jpeg, jpg, png, gif</span>
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