@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1)
		<h3 align="center">إضافة بيان مرتب</h3>
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
		<form method="post" action="{{ url('Salary') }}">
			{{csrf_field()}}
			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم الموظف</label>
				<input type="text" name="emp_name" class="form-control" placeholder="اسم الموظف" required=""  style="text-align:right;">
			</div>
			
			<div class="form-group">
				<label style="float:right; font-size: 20px;">تاريخ تسليم المرتب</label>
				<input type="date" name="delivery_date" class="form-control" placeholder="تاريخ تسليم المرتب" required="">
			</div>

			<div class="form-group">
				<label style="float:right; font-size: 20px;">عدد أيام الشغل</label>
				<input type="number" name="work_days" id="work_days" min="0" class="form-control" placeholder="عدد أيام الشغل" required=""  style="text-align:right;">
			</div>

			<div class="form-group">
				<label style="float:right; font-size: 20px;">عدد أيام الغياب</label>
				<input type="number" name="absence_days" id="absence_days" min="0" class="form-control" placeholder="عدد أيام الغياب" required="" style="text-align:right;">
			</div>

			<div class="form-group">
				<label style="float:right; font-size: 20px;">عدد أيام التأخير</label>
				<input type="nmuber" name="delay_days" id="delay_days" min="0" class="form-control" placeholder="عدد أيام التأخير" required="" style="text-align:right;">
			</div>

			<div class="form-group">
				<label style="float:right; font-size: 20px;">المرتب</label>
				<input type="number" name="salary" id="salary" min="0" class="form-control" placeholder="المرتب" required="" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float:right; font-size: 20px;">قيمة الخصومات</label>
				<input type="number" name="discount1" disabled id="discount1" class="form-control" placeholder="قيمة الخصومات" style="text-align:right;">
				<input type="hidden" name="discount" id="discount"/>
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">صافى المرتب</label>
				<input type="number" name="net_salary1" disabled id="net_salary1" class="form-control" placeholder="صافى المرتب" style="text-align:right;">
				<input type="hidden" name="net_salary" id="net_salary">
			</div>
			<div class="form-group">
				 <button class="btn btn-primary col-md-4 col-md-offset-4" id="calculate" style="font-size: 20px;">حساب صافى المرتب</button>
			</div>
			<br>
			<br>
			<div class="form-group">
				<input type="submit" name="submit" id="submit" class="btn btn-primary col-md-4 col-md-offset-4" value="تسجيل" disabled style="font-size: 20px;">
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

<script>

$(document).ready(function(){
	$("#calculate").on('click', function(e){
		e.preventDefault();
		var wd = document.getElementById("work_days").value;
		var ad = document.getElementById("absence_days").value;
		var dd = document.getElementById("delay_days").value;
		var sa = document.getElementById("salary").value;

		var minusdays = Number((dd / 2)) + Number(ad);
		var reallydays = wd - minusdays;
		var daysalary = sa / reallydays;
		var discount = daysalary * minusdays;
		var netSalary = sa - discount;

		document.getElementById("discount1").value = Math.round(discount);
		document.getElementById("net_salary1").value = Math.round(netSalary);

		document.getElementById("discount").value = Math.round(discount);
		document.getElementById("net_salary").value = Math.round(netSalary);

		document.getElementById("submit").disabled = false;
	});
});

</script>
@endsection