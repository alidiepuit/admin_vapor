@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/frontend_grouporders') }}">Frontend grouporder</a> :
@endsection
@section("contentheader_description", $frontend_grouporder->$view_col)
@section("section", "Frontend grouporders")
@section("section_url", url(config('laraadmin.adminRoute') . '/frontend_grouporders'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Frontend grouporders Edit : ".$frontend_grouporder->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($frontend_grouporder, ['route' => [config('laraadmin.adminRoute') . '.frontend_grouporders.update', $frontend_grouporder->id ], 'method'=>'PUT', 'id' => 'frontend_grouporder-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'grouporder_location')
					@la_input($module, 'grouporder_datetime')
					@la_input($module, 'grouporder_typeloc')
					@la_input($module, 'grouporder_latitude')
					@la_input($module, 'grouporder_longitude')
					@la_input($module, 'grouporder_user')
					@la_input($module, 'grouporder_order')
					@la_input($module, 'grouporder_amount')
					@la_input($module, 'grouporder_cost')
					@la_input($module, 'grouporder_discount')
					@la_input($module, 'grouporder_status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/frontend_grouporders') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#frontend_grouporder-edit-form").validate({
		
	});
});
</script>
@endpush
