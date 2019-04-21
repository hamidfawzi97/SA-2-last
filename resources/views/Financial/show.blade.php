
@extends('master')

@section('content')
<!-- <script src="https://www.gstatic.com/charts/loader.js"></script> -->
<script src="{{asset('/js/loader.js')}}"></script>

<style type="text/css">
	.lab_img:hover{
		cursor: pointer;
	}
</style>
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1)
		<h3 align="Center">البيان المالى</h3>
		<div align="right">
			<a href="{{url('Financial')}}" class="btn btn-primary">الرجوع</a>
			<br/>
			<br/>
		</div>
		<div class="col-md-2"></div>
		<div id="piechart" class="col-md-6" style="width:750px; height:450px; margin-left:50px;">

	    </div>
		<table id="financial_table" class="table table-bordered table-striped">
			<thead>
				<th style="text-align:center;"><H3>التكلفة</H3></th>
				<th style="text-align:center;"><H3>النوع</H3></th>
			</thead>
			<tbody>
				<tr>
					<td align="Center"><h4 style="color:green;">{{ $money['visit_money'] }}</h4></td>
					<td align="Center"><h4>المدفوع فى الزيارات</h4></td>	
				</tr>
				<tr>
					<td align="Center"><h4 style="color:red;">{{ $money['purchase_money'] }}</h4></td>
					<td align="Center"><h4>المصروف فى المشتريات</h4></td>	
				</tr>
				<tr>
					<td align="Center"><h4 style="color:red;">{{ $money['repair_device_money'] }}</h4></td>
					<td align="Center"><h4>المصروف فى صيانه الاجهزه</h4></td>	
				</tr>
				<tr>
					<td align="Center"><h4 style="color:red;">{{ $money['salary_money'] }}</h4></td>
					<td align="Center"><h4>المصروف فى المرتبات</h4></td>	
				</tr>
				<tr>
					<td align="Center"><h4 style="color:red;">{{ $money['lab_money'] }}</h4></td>
					<td align="Center"><h4>المصروف فى المعامل</h4></td>	
				</tr> 
			</tbody>
		</table>
		<br>
		<table id="total_table" class="table table-bordered table-striped">
			<thead>
				<th style="text-align:center;"><H3>اجمالى الأيرادات</H3></th>
				<th style="text-align:center;"><H3>اجمالى المصروفات</H3></th>
			</thead>
			<tbody>
				<tr>
					<td align="Center"><h4 style="color:green;">{{ $money['visit_money'] }}</h4></td>
					<td align="Center"><h4 style="color:red;">{{ $money['purchase_money'] + $money['repair_device_money'] + $money['salary_money'] + $money['lab_money'] }}</h4></td>	
				</tr>
 
			</tbody>
		</table>
	@else
		@include('httpAuth')
	@endif
	</div>
</div>
<script type="text/javascript">
	  var visit_money = <?php echo $money["visit_money"]; ?> ;
	  var total_money = <?php echo  $money['purchase_money'] + $money['repair_device_money'] + $money['salary_money'] + $money['lab_money']; ?> ;
	  
	  google.charts.load('current', {'packages':['corechart']});
	  google.charts.setOnLoadCallback(drawChart);

	  function drawChart() {

	    var data = google.visualization.arrayToDataTable([
	      ['money_type', 'cost'],
	      ['ايرادات', visit_money],
	      ['مصروفات', total_money]
	    ]);

	    var options = {
	      title: 'البيان المالى',
	      is3D: true,
	    };

	    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

	    chart.draw(data, options);
	  }
</script>
@endsection
