@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/frontend_tools') }}">Frontend tool</a> :
@endsection
@section("contentheader_description", $frontend_tool->$view_col)
@section("section", "Frontend tools")
@section("section_url", url(config('laraadmin.adminRoute') . '/frontend_tools'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Frontend tools Edit : ".$frontend_tool->$view_col)

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
				{!! Form::model($frontend_tool, ['route' => [config('laraadmin.adminRoute') . '.frontend_tools.update', $frontend_tool->id ], 'method'=>'PUT', 'id' => 'frontend_tool-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'tool_title')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/frontend_tools') }}">Cancel</a></button>
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
	$("#frontend_tool-edit-form").validate({
		
	});
});
</script>
@endpush
