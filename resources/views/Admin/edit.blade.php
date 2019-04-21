@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1)
		<h3 style="text-align:center;">تعديل الحساب</h3>
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

		<form method="post" action="{{action('UsersController@update', $id )}}">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PATCH" />
			<div class="form-group">
				<input type="text" name="UserName" class="form-control" value="{{$user->UserName}}" placeholder="الأسم" style="text-align:right;" />
			 </div>
			<div class="form-group">
				<input type="Password" name="Password" class="form-control" value="{{$user->Password}}" placeholder="كلمة السر" style="text-align:right;" />
			</div>
			<div class="form-group" align="right">
				<label for="male" >: النوع</label>
					<br>
				ادمن <input type="radio" name="Role_type" value="1" <?php if($user->Role_type == 1) echo "checked"; ?> >
					<br>
  				مستخدم عادى <input type="radio" name="Role_type" value="2"  <?php if($user->Role_type == 2) echo "checked"; ?> >
  					<br>
  				دكتور <input type="radio" name="Role_type" value="3"  <?php if($user->Role_type == 3) echo "checked"; ?> >
  					<br>
  				مسؤول مشتريات <input type="radio" name="Role_type" value="4"  <?php if($user->Role_type == 4) echo "checked"; ?> >
  					<br>
  				مسؤول صيانه اجهزه <input type="radio" name="Role_type" value="5"  <?php if($user->Role_type == 5) echo "checked"; ?> >
  					<br>
  				مسؤول معامل <input type="radio" name="Role_type" value="6"  <?php if($user->Role_type == 6) echo "checked"; ?> >
  					<br>
				مسؤول معامل <input type="radio" name="Role_type" value="7"  <?php if($user->Role_type == 7) echo "checked"; ?> >
  					<br>
			</div>
			<div class="form-group" align="right">
				<input type="submit" class="btn btn-primary" value="تعديل" />
			</div>
		</form>
	@else
		@include('httpAuth')
	@endif
	</div>
</div>


@endsection

