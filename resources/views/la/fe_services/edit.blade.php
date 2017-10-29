@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/fe_services') }}">FE Service</a> :
@endsection
@section("contentheader_description", $fe_service->$view_col)
@section("section", "FE Services")
@section("section_url", url(config('laraadmin.adminRoute') . '/fe_services'))
@section("sub_section", "Edit")

@section("htmlheader_title", "FE Services Edit : ".$fe_service->$view_col)

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
				{!! Form::model($fe_service, ['route' => [config('laraadmin.adminRoute') . '.fe_services.update', $fe_service->id ], 'method'=>'PUT', 'id' => 'fe_service-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'services_type')
					@la_input($module, 'services_power')
					@la_input($module, 'services_cost')
					@la_input($module, 'services_typemachine')
					@la_input($module, 'services_grpmachine')
					@la_input($module, 'services_subservice')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/fe_services') }}">Cancel</a></button>
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
	$("#fe_service-edit-form").validate({
		
	});
});
</script>
@endpush
