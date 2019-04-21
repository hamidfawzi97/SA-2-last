@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1 || session('role') == 2 || session('role') == 4)
		<h3 align="Center">اضافه مشترى</h3>
		<br>
		@if(count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
			@endif
		<form method="post" action="{{ action('PurchaseController@store')}}" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم المورد</label>
				<input type="text" name="resource_name" class="form-control" style="text-align:right;" required=""> 
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px; ">تاريخ الشراء</label>
				<input type="date" name="purchase_date" class="form-control" required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم المشترى</label>
				<input type="text" name="officer" class="form-control" style="text-align:right;" required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">التكلفة</label>
				<input type="number" step="0.1" min="0" name="cost" class="form-control" style="text-align:right;" required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تعليق</label>
				<textarea rows="4" name="comment" class="form-control" placeholder="تعليق" required="" style="resize:none;text-align:right;"></textarea>
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">الصورة</label>
				<input type="file" name="select_file" />
				<span class="text-muted">jpeg, jpg, png, gif</span>
			</div>

			<input style="font-size: 20px;" type="submit" name="" value="اضافة مشترى" class="col-md-4 col-md-offset-4 btn btn-primary">
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