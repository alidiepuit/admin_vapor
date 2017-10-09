@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/frontend_users') }}">Frontend user</a> :
@endsection
@section("contentheader_description", $frontend_user->$view_col)
@section("section", "Frontend users")
@section("section_url", url(config('laraadmin.adminRoute') . '/frontend_users'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Frontend users Edit : ".$frontend_user->$view_col)

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
				{!! Form::model($frontend_user, ['route' => [config('laraadmin.adminRoute') . '.frontend_users.update', $frontend_user->id ], 'method'=>'PUT', 'id' => 'frontend_user-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'user_name')
					@la_input($module, 'user_password')
					@la_input($module, 'user_type_login')
					@la_input($module, 'user_display_name')
					@la_input($module, 'user_address')
					@la_input($module, 'user_phone')
					@la_input($module, 'user_active')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/frontend_users') }}">Cancel</a></button>
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
	$("#frontend_user-edit-form").validate({
		
	});
});
</script>
@endpush
