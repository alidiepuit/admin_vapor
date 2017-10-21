@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/fe_type_services') }}">FE Type Service</a> :
@endsection
@section("contentheader_description", $fe_type_service->$view_col)
@section("section", "FE Type Services")
@section("section_url", url(config('laraadmin.adminRoute') . '/fe_type_services'))
@section("sub_section", "Edit")

@section("htmlheader_title", "FE Type Services Edit : ".$fe_type_service->$view_col)

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
				{!! Form::model($fe_type_service, ['route' => [config('laraadmin.adminRoute') . '.fe_type_services.update', $fe_type_service->id ], 'method'=>'PUT', 'id' => 'fe_type_service-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'typeservice_title')
					@la_input($module, 'typeservice_slug')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/fe_type_services') }}">Cancel</a></button>
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
	$("#fe_type_service-edit-form").validate({
		
	});
});
</script>
@endpush
