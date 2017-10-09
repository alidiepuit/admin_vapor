@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/frontend_menu_items') }}">Frontend menu item</a> :
@endsection
@section("contentheader_description", $frontend_menu_item->$view_col)
@section("section", "Frontend menu items")
@section("section_url", url(config('laraadmin.adminRoute') . '/frontend_menu_items'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Frontend menu items Edit : ".$frontend_menu_item->$view_col)

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
				{!! Form::model($frontend_menu_item, ['route' => [config('laraadmin.adminRoute') . '.frontend_menu_items.update', $frontend_menu_item->id ], 'method'=>'PUT', 'id' => 'frontend_menu_item-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'menu_title')
					@la_input($module, 'menu_position')
					@la_input($module, 'menu_parent_id')
					@la_input($module, 'menu_link')
					@la_input($module, 'menu_action')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/frontend_menu_items') }}">Cancel</a></button>
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
	$("#frontend_menu_item-edit-form").validate({
		
	});
});
</script>
@endpush
