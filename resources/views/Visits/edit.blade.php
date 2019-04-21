@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1 || session('role') == 3)
		<h3 align="center">تعديل زياره</h3>
		<br/>
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				@if(strpos($error, 'check') != false)
				    <li style="text-align: right;">اختار سنه واحده على الاقل</li>
				@else
					<li>{{ $error }}</li>
				@endif
			@endforeach
			</ul>
		</div>
		@endif

		<form method="post" action="{{ route('Visits.update', $visit['id']) }}">
			{{csrf_field()}}

			<div class="form-group">
				<label style="float: right; font-size: 20px;">اسم الدكتور</label>
				<input type="text" name="drname" class="form-control" placeholder="اسم الدكتور" 
				required="" value="{{ $visit['dr_name'] }}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">تاريخ الزياره</label>
				<input type="date" name="visit_date" class="form-control" placeholder="تاريخ الزياره" 
				required="" value="{{ $visit['visit_date'] }}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">التكلفة</label>
				<input type="number" step="0.1" min="0" name="cost" class="form-control" placeholder="التكلفة" 
				required="" value="{{ $visit['cost'] }}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">المدفوع</label>
				<input type="number" step="0.1" min="0" name="paid" class="form-control" placeholder="المدفوع" 
				required="" value="{{ $visit['paid'] }}" style="text-align:right;">
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">المتبقي</label>
				<input type="number" step="0.1" min="0" name="remain" class="form-control" placeholder="المتبقي" 
				required="" value="{{ $visit['remain'] }}" style="text-align:right;">
			</div>

			<div class="form-group">
				<table class="table table-bordered table-striped" >
					<tbody>
						<tr>
							<th colspan="16">Permanent Dentition</th>
						</tr>
						<tr>
							<th colspan="8" align="center">upper right</th>
							<th colspan="8" align="center">upper left</th>
						</tr>
						<tr>
							<td><sup>8</sup>┘<br/><input type="checkbox" name="check[]" value="8┘"></td>
							<td><sup>7</sup>┘<br/><input type="checkbox" name="check[]" value="7┘"></td>
							<td><sup>6</sup>┘<br/><input type="checkbox" name="check[]" value="6┘"></td>
							<td><sup>5</sup>┘<br/><input type="checkbox" name="check[]" value="5┘"></td>
							<td><sup>4</sup>┘<br/><input type="checkbox" name="check[]" value="4┘"></td>
							<td><sup>3</sup>┘<br/><input type="checkbox" name="check[]" value="3┘"></td>
							<td><sup>2</sup>┘<br/><input type="checkbox" name="check[]" value="2┘"></td>
							<td><sup>1</sup>┘<br/><input type="checkbox" name="check[]" value="1┘"></td>
							<td>└<sup>1</sup><br/><input type="checkbox" name="check[]" value="└1"></td>
							<td>└<sup>2</sup><br/><input type="checkbox" name="check[]" value="└2"></td>
							<td>└<sup>3</sup><br/><input type="checkbox" name="check[]" value="└3"></td>
							<td>└<sup>4</sup><br/><input type="checkbox" name="check[]" value="└4"></td>
							<td>└<sup>5</sup><br/><input type="checkbox" name="check[]" value="└5"></td>
							<td>└<sup>6</sup><br/><input type="checkbox" name="check[]" value="└6"></td>
							<td>└<sup>7</sup><br/><input type="checkbox" name="check[]" value="└7"></td>
							<td>└<sup>8</sup><br/><input type="checkbox" name="check[]" value="└8"></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="check[]" value="8┐"><br/><sub>8</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="7┐"><br/><sub>7</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="6┐"><br/><sub>6</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="5┐"><br/><sub>5</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="4┐"><br/><sub>4</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="3┐"><br/><sub>3</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="2┐"><br/><sub>2</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="1┐"><br/><sub>1</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="┌1"><br/>┌<sub>1</sub></td>
							<td><input type="checkbox" name="check[]" value="┌2"><br/>┌<sub>2</sub></td>
							<td><input type="checkbox" name="check[]" value="┌3"><br/>┌<sub>3</sub></td>
							<td><input type="checkbox" name="check[]" value="┌4"><br/>┌<sub>4</sub></td>
							<td><input type="checkbox" name="check[]" value="┌5"><br/>┌<sub>5</sub></td>
							<td><input type="checkbox" name="check[]" value="┌6"><br/>┌<sub>6</sub></td>
							<td><input type="checkbox" name="check[]" value="┌7"><br/>┌<sub>7</sub></td>
							<td><input type="checkbox" name="check[]" value="┌8"><br/>┌<sub>8</sub></td>
						</tr>
						<tr>
							<th colspan="8" align="center">lower right</th>
							<th colspan="8" align="center">lower left</th>
						</tr>
						<tr>
							<td colspan="16" align="center"></td>
						</tr>
						<tr>
							<th colspan="16" align="center">Primary Dentition</th>
						</tr>
						<tr>
							<th colspan="8" align="center">upper right</th>
							<th colspan="8" align="center">upper left</th>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td><sup>E</sup>┘<br/><input type="checkbox" name="check[]" value="E┘"></td>
							<td><sup>D</sup>┘<br/><input type="checkbox" name="check[]" value="D┘"></td>
							<td><sup>C</sup>┘<br/><input type="checkbox" name="check[]" value="C┘"></td>
							<td><sup>B</sup>┘<br/><input type="checkbox" name="check[]" value="B┘"></td>
							<td><sup>A</sup>┘<br/><input type="checkbox" name="check[]" value="A┘"></td>
							<td>└<sup>A</sup><br/><input type="checkbox" name="check[]" value="└A"></td>
							<td>└<sup>B</sup><br/><input type="checkbox" name="check[]" value="└B"></td>
							<td>└<sup>C</sup><br/><input type="checkbox" name="check[]" value="└C"></td>
							<td>└<sup>D</sup><br/><input type="checkbox" name="check[]" value="└D"></td>
							<td>└<sup>E</sup><br/><input type="checkbox" name="check[]" value="└E"></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td><input type="checkbox" name="check[]" value="E┐"><br/><sub>E</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="D┐"><br/><sub>D</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="C┐"><br/><sub>C</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="B┐"><br/><sub>B</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="A┐"><br/><sub>A</sub>┐</td>
							<td><input type="checkbox" name="check[]" value="┌A"><br/>┌<sub>A</sub></td>
							<td><input type="checkbox" name="check[]" value="┌B"><br/>┌<sub>B</sub></td>
							<td><input type="checkbox" name="check[]" value="┌C"><br/>┌<sub>C</sub></td>
							<td><input type="checkbox" name="check[]" value="┌D"><br/>┌<sub>D</sub></td>
							<td><input type="checkbox" name="check[]" value="┌E"><br/>┌<sub>E</sub></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th colspan="8" align="center">lower right</th>
							<th colspan="8" align="center">lower left</th>
						</tr>
					</tbody>
				</table>
			</div>
			@for ($i = 0; $i < count($visit_tooth); $i++)
				<script>
					$('input[value="{{ $visit_tooth[$i]["tooth"] }}"]').attr('checked','checked');
				</script>
			@endfor

			<div class="form-group">
				<label style="float: right; font-size: 20px;">تعليق</label>
				<textarea name="comment" rows="4" class="form-control" placeholder="تعليق" 
				required="" style="resize: none; text-align:right;">{{ $visit['comment'] }}</textarea>
			</div>
			<div class="form-group">
				<label style="float: right; font-size: 20px;">نوع الزيارة</label>
				<select name="selection" class="form-control" style="font-size: 20px;direction: rtl;">
					@if($visit['visit_type'] == 'زيارة اولى')
						<option name="زيارة اولى">زيارة اولى</option>
						<option name="متابعة">متابعة</option>
					@else
						<option name="زيارة اولى">زيارة اولى</option>
						<option name="متابعة" selected>متابعة</option>
					@endif
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary col-md-4 col-md-offset-4" value="تعديل" style="font-size: 20px;">
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

@endsection