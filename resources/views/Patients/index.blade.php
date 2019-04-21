@extends('master')

@section('content')
<style type="text/css">
	li a{
		color: #000;
	}
	li a:hover{
		color: #0275d8;
	}
</style>
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1 || session('role') == 2 || session('role') == 3 || session('role') == 7)
		<h3 align="center">المرضى</h3>
		<br/>
		@if($message = Session::get('success'))
		<div class="alert alert-success" style="text-align:right;">
			<p>{{$message}}</p>
		</div>
		@endif
		@if(session('role') == 1)
		<div class="col-md-4">
			<form method="get" action="{{route('Patients.excel',1)}}">
				{{csrf_field()}}
				<div class="form-group col-md-12" style="display:block;">
					<input type="submit" name="" value="تحويل جميع  بيانات المرضي الي اكسيل" class="btn btn-primary col-md-12">
				</div>
				<div class="form-group col-md-12" style="display:block;">
					<input type="date" name="from" class="form-control" placeholder="من" >
					<label style="float:right; font-size: 20px;">من</label>
				</div>
				<div class="form-group col-md-12" style="display:block;">
					<input type="date" name="to" class="form-control" placeholder="الى" >
					<label style="float:right; font-size: 20px;">الى</label>
				</div>
			</form>
		</div>
		@endif
		@if(session('role') == 2 || session('role') == 3 || session('role') == 7)
		<div class="col-md-4"></div>
		@endif
		<div class="form-group col-md-4">
			<a href="{{route('Patients.create')}}" class="btn btn-primary col-md-12">إضافة مريض</a>
			<br>
			<br>
			<input class="form-control" name="search" id="search" placeholder="بحث" style="text-align:center;margin-top:4px;"/>
			<div id="searchList"></div>
			{{ csrf_field() }}
		</div>

		@if(session('role') == 1)
		<div class="col-md-4" >
			<form method="get" action="{{route('Visits.excel',1)}}">
				{{csrf_field()}}
				<div class="form-group col-md-12" style="display:block;">
				<input type="submit" name="" value="تحويل جميع  بيانات الزيارات الي اكسيل" class="btn btn-primary col-md-12">
				</div>
				<div class="form-group col-md-12" style="display:block;">
					<input type="date" name="from" class="form-control" placeholder="من" >
					<label style="float:right; font-size: 20px;">من</label>
				</div>	
				<div class="form-group col-md-12" style="display:block;">
					<input type="date" name="to" class="form-control" placeholder="الى" >
					<label style="float:right; font-size: 20px;">الى</label>
				</div>
			</form>
		</div>
		@endif
	@else
		@include('httpAuth')
	@endif
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#search").keyup(function(){
			var query = $(this).val();
			if(query != ''){

				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{ url('/') }}" + "/Patients/fetch",
					method:"POST",
					data:{query:query , _token:_token},
					success:function(data){
						$("#searchList").fadeIn();
						$("#searchList").html(data);
					}
				});

			}
		});
	});
</script>

@endsection