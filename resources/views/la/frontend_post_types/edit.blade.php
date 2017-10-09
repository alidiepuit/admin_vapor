@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/frontend_post_types') }}">Frontend post type</a> :
@endsection
@section("contentheader_description", $frontend_post_type->$view_col)
@section("section", "Frontend post types")
@section("section_url", url(config('laraadmin.adminRoute') . '/frontend_post_types'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Frontend post types Edit : ".$frontend_post_type->$view_col)

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
				{!! Form::model($frontend_post_type, ['route' => [config('laraadmin.adminRoute') . '.frontend_post_types.update', $frontend_post_type->id ], 'method'=>'PUT', 'id' => 'frontend_post_type-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/frontend_post_types') }}">Cancel</a></button>
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
	$("#frontend_post_type-edit-form").validate({
		
	});
});
</script>
@endpush
