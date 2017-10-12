@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/frontend_posts') }}">Frontend post</a> :
@endsection
@section("contentheader_description", $frontend_post->$view_col)
@section("section", "Frontend posts")
@section("section_url", url(config('laraadmin.adminRoute') . '/frontend_posts'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Frontend posts Edit : ".$frontend_post->$view_col)

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
			<div class="col-md-8 col-md-offset-2 haha">
				{!! Form::model($frontend_post, ['route' => [config('laraadmin.adminRoute') . '.frontend_posts.update', $frontend_post->id ], 'method'=>'PUT', 'id' => 'frontend_post-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'post_title')
          @la_input($module, 'post_title')
					@la_input($module, 'post_slug')
					@la_input($module, 'post_content')
					@la_input($module, 'post_image')
					@la_input($module, 'post_status')
					@la_input($module, 'post_create_by')
					@la_input($module, 'post_type')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/frontend_posts') }}">Cancel</a></button>
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
	$("#frontend_post-edit-form").validate({
		
	});
  CKEDITOR.replace( 'post_content' );
});
</script>
@endpush
