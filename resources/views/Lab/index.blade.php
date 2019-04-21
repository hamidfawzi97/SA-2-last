	@extends('master')

@section('content')
<style type="text/css">
	.lab_img:hover{
		cursor: pointer;
	}
</style>
@if(session('role') == 1 || session('role') == 2 || session('role') == 6)                   
	<div class="row">
		<div class="col-md-12">

			<h3 align="center">المعامل</h3>
			<br/>
			@if($message = Session::get('success'))
			<div class="alert alert-success" style="text-align: right;">
				<p>{{$message}}</p>
			</div>
			@elseif($message = Session::get('fail'))
			<div class="alert alert-danger" style="text-align: right;">
				<p>{{$message}}</p>
			</div>
			@endif
			
			@if(session('role') == 1)
			<div align="right">
				<form method="get" action="{{route('Labs.excel',1)}}">
					{{csrf_field()}}
					<div class="col-md-3"></div>
					<div class="form-group col-md-3" style="display:inline;">
						<label style="float:right; font-size: 20px;">الى</label>
						<input type="date" name="to" class="form-control" placeholder="الى" >
					</div>
					<div class="form-group col-md-3" style="display:inline;">
						<label style="float:right; font-size: 20px;">من</label>
						<input type="date" name="from" class="form-control" placeholder="من" >
					</div>
					<div class="form-group col-md-3" style="display:inline;">
						<input type="submit" name="" value="تحويل الي اكسيل" class="btn btn-primary" style="float: right; margin-top: 40px;">
					</div>
				</form>
			</div>
			@endif
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div align="right">

				<form method="post" action="{{ action('LabController@search') }}" style="display:inline;">
					{{csrf_field()}}
					
					<div class="form-group col-md-3" style="display:inline;">
						<input type="submit" name="submit" class="btn btn-primary btn-sm col-md-4 col-md-offset-2" value="بحث" style="font-size: 20px; margin-top:35px;">
					</div>
					<div class="form-group col-md-3" style="display:inline;">
						<label style="float:right; font-size: 20px;">تاريخ الأستلام</label>
						<input type="month" name="recieptDate" class="form-control" placeholder="yyyy-mm" >
					</div>
					<div class="form-group col-md-3" style="display:inline;">
						<label style="float:right; font-size: 20px;">اسم المعمل</label>
						<input type="text" name="labName" class="form-control" placeholder="اسم المعمل" style="text-align:right;">
					</div>
				</form>
				
				<a href="{{route('Lab.create')}}" class="btn btn-primary" style="margin:37px 15px 0 0;">إضافة فاتورة معمل</a>
					
				
			</div>
		</div>
	</div>
	@if(session('role') == 1)
	<br/>
	<div class="row">
		<div class="col-md-12">
			<table id="labs_table" class="table table-striped table-bordered">
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
				<tbody id="tbody">
					@foreach($labss as $lb)
					<tr>
						<td style="text-align:center;">
							<form method="post" id="del" action="{{ action('LabController@destroy',$lb['id']) }}" style="display: inline;">
								{{csrf_field()}}
								{{ method_field('DELETE') }}
								<input type="submit" name="" value="حذف"   class="btn btn-danger">
							</form>
							<a href="{{ action('LabController@edit',$lb['id']) }}" class="btn btn-success">تعديل</a>	   
						</td>
						<td style="text-align:center;">
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
						<td style="text-align:center;">{{ $lb["cost"] }}</td>
						<td align="Center" style="white-space: pre;">{{ $lb["comment"] }}</td>
						<td style="text-align:center;">{{ $lb["receipt_date"] }}</td>
						<td style="text-align:center;">{{ $lb["delivery_date"] }}</td>
						<td style="text-align:center;">{{ $lb["lab_name"] }}</td>
					</tr>
					@endforeach
				</tbody>

			</table>
		</div>
	</div>
	@endif
@else
	@include('httpAuth')
@endif
<script type="text/javascript">
	$(document).ready(function(){
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