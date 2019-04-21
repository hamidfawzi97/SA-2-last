@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1)
		<h3 align="center">اضافه حساب جديد</h3>
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
		
		@if(\Session::has('success'))
		<div class="alert alert-success" style="text-align:right;">
			<p>{{ \Session::get('success') }}</p>
		</div>
		@endif

		<form method="post" action="{{url('Admin')}}">
			{{csrf_field()}}
			<div class="form-group">
				<input type="text" name="UserName" class="form-control" placeholder="الأسم" style="text-align:right;"/>
			</div>
			<div class="form-group">
				<input type="password" name="Password" class="form-control" placeholder="كلمة السر" style="text-align:right;"/>
			</div>
			<div class="form-group" align="right">
				<label for="male">: النوع</label>
					<br>
				ادمن <input type="radio" name="Role_type" value="1" checked>
					<br>
  				مستخدم عادى <input type="radio" name="Role_type" value="2">
  					<br>
				دكتور <input type="radio" name="Role_type" value="3">
  					<br>
  				مسؤول مشتريات <input type="radio" name="Role_type" value="4">
  					<br>
  				مسؤول صيانه اجهزه <input type="radio" name="Role_type" value="5">
  					<br>
  				مسؤول معامل <input type="radio" name="Role_type" value="6">
  					<br>
  				 موظف استقبال <input type="radio" name="Role_type" value="7">
  					<br>
			</div>
			<div class="form-group" align="right">
				<input type="submit" class="btn btn-primary" value="اضافه" />
			</div>
		</form>
	@else
		@include('httpAuth')
	@endif
	</div>
</div>
@endsection

