@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/fe_service_tools') }}">FE Service Tool</a> :
@endsection
@section("contentheader_description", $fe_service_tool->$view_col)
@section("section", "FE Service Tools")
@section("section_url", url(config('laraadmin.adminRoute') . '/fe_service_tools'))
@section("sub_section", "Edit")

@section("htmlheader_title", "FE Service Tools Edit : ".$fe_service_tool->$view_col)

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
				{!! Form::model($fe_service_tool, ['route' => [config('laraadmin.adminRoute') . '.fe_service_tools.update', $fe_service_tool->id ], 'method'=>'PUT', 'id' => 'fe_service_tool-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'tool_power')
					@la_input($module, 'tool_title')
					@la_input($module, 'tool_unit')
					@la_input($module, 'tool_cost')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/fe_service_tools') }}">Cancel</a></button>
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
	$("#fe_service_tool-edit-form").validate({
		
	});
});
</script>
@endpush
