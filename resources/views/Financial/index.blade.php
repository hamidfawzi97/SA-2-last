@extends('master')

@section('content')
<style type="text/css">
	.lab_img:hover{
		cursor: pointer;
	}
</style>
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1)      
		<h3 align="Center">البيان المالى</h3>
		<br>
		<br>
		<form method="post" action="{{ action('FinancialController@search') }}" style="display:inline;">
			{{csrf_field()}}
			
			<div class="form-group col-md-3" style="display:inline;">
				<input type="submit" name="submit" class="btn btn-primary btn-sm col-md-4 col-md-offset-2" value="حساب" style="font-size: 20px; margin-top:35px;">
			</div>
			<div class="form-group col-md-3" style="display:inline;">
				<label style="float:right; font-size: 20px;">الى</label>
				<input type="date" name="to" class="form-control" placeholder="الى">
			</div>
			<div class="form-group col-md-3" style="display:inline;">
				<label style="float:right; font-size: 20px;">من</label>
				<input type="date" name="from" class="form-control" placeholder="من">
			</div>

			<div class="form-group col-md-3" style="display:inline;">
				<label style="float:right; font-size: 20px;">طريقه العرض</label>
				<select class="form-control" name="showMethod">
					<option value="pie">Pie</option>
					<option value="table">Table</option>
				</select>
			</div>
		</form>	
	@else
		@include('httpAuth')
	@endif
	</div>
</div>

<script type="text/javascript">
       
</script>
@endsection