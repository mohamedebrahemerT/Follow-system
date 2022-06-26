

@extends('admin.index')

@section('content')

  
@push('js')
<script type="text/javascript">
$(document).ready(function(){
$(document).on('click','.checkinput',function(){
	var permission_name = $(this).attr('permission_name');
	if($('.'+permission_name+'_validation').prop("checked") &&
	$(this).hasClass(permission_name+'_validation')){
		$('.'+permission_name+'_show').prop('checked',true);
		$('.'+permission_name+'_add').prop('checked',true);
		$('.'+permission_name+'_edit').prop('checked',true);
		$('.'+permission_name+'_delete').prop('checked',true);
	}else if(
		!$('.'+permission_name+'_validation').prop("checked") &&
		$(this).hasClass(permission_name+'_validation')){
		$('.'+permission_name+'_show').prop('checked',false);
		$('.'+permission_name+'_add').prop('checked',false);
		$('.'+permission_name+'_edit').prop('checked',false);
		$('.'+permission_name+'_delete').prop('checked',false);
	}else if(!$(this).hasClass(permission_name+'_show') && !$(this).hasClass(permission_name+'_show') && $(this).prop("checked")){
	$('.'+permission_name+'_show').prop('checked',true);
	}else if(
		!$('.'+permission_name+'_add').prop("checked") &&
		!$('.'+permission_name+'_edit').prop("checked") &&
		!$('.'+permission_name+'_delete').prop("checked") &&
		!$('.'+permission_name+'_validation').prop("checked") &&
		!$(this).hasClass(permission_name+'_show')){
		$('.'+permission_name+'_show').prop('checked',false);
	}
});
});
</script>
@endpush
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="btn-group">
			<a>{{!empty($title)?$title:''}}</a>
		 
			 
		</div>
		</h3>
		 
</div>
<!-- /.card-header -->
<div class="card-body">
		{!! Form::open(['url'=>url('/AdminGroup/'.$admingroups->id),'method'=>'put','id'=>'admingroups','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
	<div class="row">
		<div class="form-group col-md-12">
			{!! Form::label('group_name',trans('trans.group_name'),['class'=>'control-label']) !!}
			{!! Form::text('group_name',$admingroups->group_name,['class'=>'form-control','placeholder'=>trans('trans.group_name')]) !!}
		</div>
		<div class="col-md-12 col-lg-12">
			<table class="table table-striped table-hover  ">
				<thead>
					<tr>
						<th>{{trans('trans.name')}}</th>
						<th>{{trans('trans.show')}}</th>
						<th>{{trans('trans.create')}}</th>
						<th>{{trans('trans.edit')}}</th>
						<th>{{trans('trans.delete')}}</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach(require app_path('Http/AdminRouteList.php') as $key=>$value)
					<tr>
						<td>{{ !is_array($value)?trans('trans.'.$value):trans('trans.'.$key) }}</td>
						<td>
							@if(!is_array($value) || is_array($value) && in_array('read',$value))
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput {{ $key }}_show"
									permission_name="{{ $key }}"
									name="{{ $key }}_show"
									{{ checkPermissionGroup($key.'_show',$admingroups)?'checked':'' }}
									value="yes"
									id="{{ $key }}_show">
									<label class="custom-control-label" for="{{ $key }}_show"></label>
								</div>
							</div>
							@endif
						</td>
						<td>
							@if(!is_array($value) || is_array($value) && in_array('create',$value))
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput {{ $key }}_add"
									permission_name="{{ $key }}"
									name="{{ $key }}_add"
									{{ checkPermissionGroup($key.'_add',$admingroups)?'checked':'' }}
									value="yes"
									id="{{ $key }}_add">
									<label class="custom-control-label" for="{{ $key }}_add"></label>
								</div>
							</div>
							@endif
						</td>
						<td>
							@if(!is_array($value) || is_array($value) && in_array('update',$value))
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput {{ $key }}_edit"
									permission_name="{{ $key }}"
									name="{{ $key }}_edit"
									{{ checkPermissionGroup($key.'_edit',$admingroups)?'checked':'' }}
									value="yes"
									id="{{ $key }}_edit">
									<label class="custom-control-label" for="{{ $key }}_edit"></label>
								</div>
							</div>
							@endif
						</td>
						<td>
							@if(!is_array($value) || is_array($value) && in_array('delete',$value))
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput {{ $key }}_delete"
									permission_name="{{ $key }}"
									name="{{ $key }}_delete"
									{{ checkPermissionGroup($key.'_delete',$admingroups)?'checked':'' }}
									value="yes"
									id="{{ $key }}_delete">
									<label class="custom-control-label" for="{{ $key }}_delete"></label>
								</div>
							</div>
							@endif
						</td>
					</tr>
					@endforeach

					<tr>
						<td>{{trans('trans.settings')}}</td>
						<td>
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput settings_show"
									permission_name="settings"
									name="settings_show"
									{{ checkPermissionGroup('settings_show',$admingroups)?'checked':'' }}
									value="yes"
									id="settings_show">
									<label class="custom-control-label" for="settings_show"></label>
								</div>
							</div>
						</td>
						<td>
						</td>
						<td>
							<div class="form-group">
								<div class="custom-control custom-switch">
									<input
									type="checkbox"
									class="custom-control-input checkinput settings_edit"
									permission_name="settings"
									name="settings_edit"
									{{ checkPermissionGroup('settings_edit',$admingroups)?'checked':'' }}
									value="yes"
									id="settings_edit">
									<label class="custom-control-label" for="settings_edit"></label>
								</div>
							</div>
						</td>
						<td>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- /.card-body -->
<div class="card-footer">
	{!! Form::submit(trans('trans.save'),['class'=>'btn btn-success btn-flat']) !!}
	{!! Form::close() !!}
</div>
</div>
@endsection