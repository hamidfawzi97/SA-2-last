@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1)
		<h3 align="Center">تعديل مشترى</h3>
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
		<form method="post" action="{{ action('PurchaseController@update',$purchase['id']) }}" enctype="multipart/form-data">
			{{csrf_field()}}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم المورد</label>
				<input type="text" name="resource_name" class="form-control" value="{{ $purchase['resource_name']}}" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px; ">تاريخ الشراء</label>
				<input type="date" name="purchase_date" class="form-control" value="{{ $purchase['purchase_date']}}"  required="">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم المشترى</label>
				<input type="text" name="officer" class="form-control"  value="{{ $purchase['officer']}}"  required="" style="text-align:right;"> 
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">التكلفة</label>
				<input type="number" name="cost" step="0.1" min="0" class="form-control"  value="{{ $purchase['cost']}}" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تعليق</label>
				<textarea rows="4" name="comment" class="form-control" placeholder="تعليق"  required=""style="resize:none; text-align:right;">{{ $purchase['comment']}}</textarea>
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">الصورة</label>
				<input type="file" name="select_file" />
				<span class="text-muted">jpeg, jpg, png, gif</span>
			</div>
			<div class="form-group">
			<input style="font-size: 20px;" type="submit" name="submit" value="تعديل " class="col-md-4 col-md-offset-4 btn btn-primary">
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