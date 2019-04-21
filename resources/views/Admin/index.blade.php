@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1)
		<h3 align="center">حسابات المستخدمين</h3>
		<br>
		@if($message = Session::get('success'))
		<div class="alert alert-success" style="text-align:right;">
			<p>{{$message}}</p>
		</div>
		@endif
		<div align="right">
			<a href="{{route('Admin.create')}}" class="btn btn-primary">اضافه حساب جديد</a>
			<br>
			<br>

		</div>
		<table id="data-table-users" class="table table-bordered table-striped">
			<thead>
				<th style="text-align:center;">تعديل / حذف</th>
				<th style="text-align:center;">النوع</th>
				<th style="text-align:center;">كلمة السر</th>
				<th style="text-align:center;">الأسم</th>
			</thead>
			@foreach($users as $row)
			<tr>
				<td align="center">
					<form method="post" class="delete_form" action="{{action('UsersController@destroy', $row['id'])}}" style="display: inline;">
					 	{{csrf_field()}}
					 	{{ method_field('DELETE') }} 
					 	<input type="submit" value="حذف" class="btn btn-danger">
					</form>
					<a href="{{action('UsersController@edit', $row['id'])}}" class="btn btn-success">تعديل</a>
				</td>
				<td align="center"> 
					@if($row['Role_type'] == 1) 
						{{"ادمن"}} 
				   	@elseif($row['Role_type'] == 2) 
				   		{{"مستخدم عادى"}} 
			   		@elseif($row['Role_type'] == 3) 
			   			{{"دكتور"}} 
			   		@elseif($row['Role_type'] == 4) 
			   		{{"مسؤول مشتريات"}} 
			   		@elseif($row['Role_type'] == 5) 
			   		{{"مسؤول صيانه اجهزه"}} 
			   		@elseif($row['Role_type'] == 6) 
			   		{{"مسؤول معامل"}} 
				   	@elseif($row['Role_type'] == 7) 
			   		{{"موظف استقبال"}} 
				   	@endif
				</td>
				<td align="center">{{$row['Password']}}</td>
				<td align="right">{{$row['UserName']}}</td>
			</tr>
			@endforeach
		</table>
	@else
		@include('httpAuth')
	@endif
	</div>
</div>
<script>
$(document).ready(function(){
	$('.delete_form').on('submit', function(){
		var con = confirm("هل تريد حذف الحساب ؟");
		if(con)
		{
			return true;
		}
		else
		{
			return false;
		}
	});

	$('#data-table-users').DataTable();
});
</script>
@endsection

