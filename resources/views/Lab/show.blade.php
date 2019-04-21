@extends('master')

@section('content')
<style type="text/css">
	.lab_img:hover{
		cursor: pointer;
	}
</style>
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1 || session('role') == 2 || session('role') == 6)
	@if($lab)
		<h3 align="Center">المعامل</h3>
		<div align="right">
			<a href="{{url('Lab')}}" class="btn btn-primary">الرجوع</a>
			<br/>
			<br/>
		</div>
		<table id="labs_table" class="table table-bordered table-striped">
			<thead>
				<th style="text-align:center;">تعديل / حذف</th>
				<th style="text-align:center;">الصورة</th>
				<th style="text-align:center;">انتهت</th>
				<th style="text-align:center;">التكلفة</th>
				<th style="text-align:center;">تعليق</th>
				<th style="text-align:center;">تاريخ الأستلام</th>
				<th style="text-align:center;">تاريخ التسليم</th>
				<th style="text-align:center;">اسم المعمل</th>
			</thead>
			<tbody>
				@foreach($lab as $lb)
				<tr>
					<td align="Center">
					@if(session('role') == 1)
						<form method="post" id="del" action="{{ action('LabController@destroy',$lb['id']) }}" style="display: inline;">
							{{csrf_field()}}
							{{ method_field('DELETE') }}
							<input type="submit" name="" value="حذف"   class="btn btn-danger">
						</form>
					@endif
						<a href="{{ action('LabController@edit',$lb['id']) }}" class="btn btn-success">تعديل</a>	   
					</td>
					<td align="Center">
						@if($lb['img_name'])
						<img src="/images/Labs/{{ $lb['img_name'] }}" width="100" height="100" class="lab_img" data-toggle="modal" data-target="#lab_img_modal_{{ $lb['id'] }}">
						<div class="modal fade" id="lab_img_modal_{{ $lb['id'] }}" role="dialog">
		                    <div class="modal-dialog modal-md">
		                        <div class="modal-content">
		                            <div class="modal-body" style="text-align: center;">
		                                <img src="/images/Labs/{{ $lb['img_name'] }}" class="img-responsive img-thumbnail" alt="Lab Image">
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                @endif
					</td>
					<td style="text-align:center;">
							@if($lb["case_closed"] == 0)
								لا
							@else
								نعم
							@endif
						</td>
					<td align="Center">{{ $lb["cost"] }}</td>
					<td align="Center" style="white-space: pre;">{{ $lb["comment"] }}</td>
					<td align="Center">{{ $lb["receipt_date"] }}</td>
					<td align="Center">{{ $lb["delivery_date"] }}</td>
					<td align="Center">{{ $lb["lab_name"] }}</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
	@else
		@include('httpAuth')
	@endif
	@else
		@include('httpAuth')
	@endif
	</div>
</div>
<script type="text/javascript">


	$(document).ready(function () {
		$('#del').on('submit' , function() {
			var con = confirm("هل تريد حذف هذا المعمل ؟");
			if(con){
				return true;
			}else{
				return false;
			}

		});
		$('#labs_table').DataTable();
	});
</script>
@endsection