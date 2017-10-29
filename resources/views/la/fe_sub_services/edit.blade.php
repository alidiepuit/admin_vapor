@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/fe_sub_services') }}">FE Sub Service</a> :
@endsection
@section("contentheader_description", $fe_sub_service->$view_col)
@section("section", "FE Sub Services")
@section("section_url", url(config('laraadmin.adminRoute') . '/fe_sub_services'))
@section("sub_section", "Edit")

@section("htmlheader_title", "FE Sub Services Edit : ".$fe_sub_service->$view_col)

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
				{!! Form::model($fe_sub_service, ['route' => [config('laraadmin.adminRoute') . '.fe_sub_services.update', $fe_sub_service->id ], 'method'=>'PUT', 'id' => 'fe_sub_service-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'subservice_title')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/fe_sub_services') }}">Cancel</a></button>
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
	$("#fe_sub_service-edit-form").validate({
		
	});
});
</script>
@endpush
