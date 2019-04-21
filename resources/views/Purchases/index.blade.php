@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
	@if(session('role') == 1)
		<h3 align="Center">المشتريات</h3>
		<br>
		@if($message = Session::get('success'))
		<div class="alert alert-success" style="text-align:right;">
			<p>{{$message}}</p>
		</div>
		@endif
		<form method="get" action="{{ action('PurchaseController@show' , 1) }}">
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
		<div style="float: right; margin-top: 43px;margin-right:15px;">
			<a href="{{ action('PurchaseController@create') }}" class="btn btn-primary">اضافه مشترى جديد</a>
			<br>
			<br>
		</div>	
		<table id="data-table-purchases" class="table table-bordered table-striped">
			<thead>
				<th style="text-align:center;">تعديل / حذف</th>
				<th style="text-align:center;">الصورة</th>
				<th style="text-align:center;">اسم المٌشترى</th>
				<th style="text-align:center;">تعليق</th>
				<th style="text-align:center;">التكلفه</th>
				<th style="text-align:center;">تاريخ الشراء</th>
				<th style="text-align:center;">اسم المورد</th>
			</thead>
			<tbody>
				@foreach($purchases as $purchase)
				<tr>
					<td align="Center">
						<form method="post" class="delete_form" action="{{ action('PurchaseController@destroy',$purchase['id']) }}" style="display: inline;">
							{{csrf_field()}}
							{{ method_field('DELETE') }} 
							<input type="submit" value="حذف" class="btn btn-danger">
						</form>
						<a href="{{ action('PurchaseController@edit',$purchase['id']) }}" class="btn btn-success">تعديل</a>   
					</td>
					<td align="Center">
						@if($purchase['img_name'])
						<img src="/images/Purchases/{{ $purchase['img_name'] }}" width="100" height="100" class="lab_img" data-toggle="modal" data-target="#lab_img_modal_{{ $purchase['id'] }}">
						<div class="modal fade" id="lab_img_modal_{{ $purchase['id'] }}" role="dialog">
		                    <div class="modal-dialog modal-md">
		                        <div class="modal-content">
		                            <div class="modal-body" style="text-align: center;">
		                                <img src="/images/Purchases/{{ $purchase['img_name'] }}" class="img-responsive img-thumbnail" alt="Lab Image">
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                @endif
					</td>
					<td align="Center">{{ $purchase["officer"] }}</td>
					<td align="Center" style="white-space: pre;">{{ $purchase["comment"] }}</td>
					<td align="Center">{{ $purchase["cost"] }}</td>
					<td align="Center">{{ $purchase["purchase_date"] }}</td>
					<td align="Center">{{ $purchase["resource_name"] }}</td>
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
		$('.delete_form').on('submit' , function() {
			var con = confirm("هل تريد حذف هذه الفاتورة ؟");
			if(con){
				return true;
			}else{
				return false;
			}
		});
		$('#data-table-purchases').DataTable();
	});
</script>
@endsection