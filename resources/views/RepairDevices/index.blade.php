@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1)
		<h3 align="center">صيانة الاجهزه</h3>
		<br/>
		@if($message = Session::get('success'))
		<div class="alert alert-success" style="text-align:right;">
			<p>{{$message}}</p>
		</div>
		@endif
		<form method="get" action="{{ action('RepairDevicesController@show' , 1) }}">
			{{csrf_field()}}
			<div class="form-group col-md-3" style="display:inline; margin-top: 44px">
				<input type="submit" name="" value="تحويل الي اكسيل" class="btn btn-primary">
			</div>
			<div class="form-group col-md-3" style="display:inline;margin-top:7px;">
				<label style="float:right; font-size: 20px;">الى</label>
				<input type="date" name="to" class="form-control" placeholder="الى" >
			</div>
			<div class="form-group col-md-3" style="display:inline;margin-top:7px;">
				<label style="float:right; font-size: 20px;">من</label>
				<input type="date" name="from" class="form-control" placeholder="من" >
			</div>
		</form>
		<div style="float: right; margin-top: 45px;margin-right:15px;">
			<a href="{{ route('RepairDevices.create')}}" class="btn btn-primary">إضافة فاتورة صيانة اجهزه</a>
		</div>
		<table id="data-table-repairdevices" class="table table-bordered table-striped">
			<thead>
				<th style="text-align: center;">تعديل/حذف</th>
				<th style="text-align: center;">تعليق</th>
				<th style="text-align: center;">التكلفه</th>
				<th style="text-align: center;">اسم المُتصل</th>
				<th style="text-align: center;">تاريخ زيارة الشركه</th>
				<th style="text-align: center;">تاريخ ابلاغ العطل</th>
				<th style="text-align: center;">تاريخ ظهور العطل</th>
				<th style="text-align: center;">اسم شركة الصيانه</th>
			</thead>
			<tbody>
				@foreach($repairDevice as $repairDev)
				<tr>
					<td style="text-align: center;">
						<form method="post" class="delete_form" action="{{ action('RepairDevicesController@destroy', $repairDev['id'])}}" style="display: inline;">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="حذف" class="btn btn-danger">			
						</form>
						<a href="{{action('RepairDevicesController@edit', $repairDev['id'])}}" class="btn btn-success">تعديل</a>
					</td>
					<td style="text-align: center; white-space: pre;">{{$repairDev['comment']}}</td>
					<td style="text-align: center;">{{$repairDev['cost']}}</td>
					<td style="text-align: center;">{{$repairDev['caller_name']}}</td>
					<td style="text-align: center;">{{$repairDev['visit_date']}}</td>
					<td style="text-align: center;">{{$repairDev['call_date']}}</td>
					<td style="text-align: center;">{{$repairDev['appearience_date']}}</td>
					<td style="text-align: center;">{{$repairDev['company_name']}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@else
		@include('httpAuth')
	@endif
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$(".delete_form").on('submit' , function() {
			var con = confirm("هل تريد حذف هذه الفاتورة ؟");
			if(con){
				return true;
			}else{
				return false;
			}
		});
		$('#data-table-repairdevices').DataTable();
	});
</script>
@endsection