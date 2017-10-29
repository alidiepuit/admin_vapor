@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/fe_votes') }}">FE vote</a> :
@endsection
@section("contentheader_description", $fe_vote->$view_col)
@section("section", "FE votes")
@section("section_url", url(config('laraadmin.adminRoute') . '/fe_votes'))
@section("sub_section", "Edit")

@section("htmlheader_title", "FE votes Edit : ".$fe_vote->$view_col)

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
				{!! Form::model($fe_vote, ['route' => [config('laraadmin.adminRoute') . '.fe_votes.update', $fe_vote->id ], 'method'=>'PUT', 'id' => 'fe_vote-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'vote_grouporder')
					@la_input($module, 'vote_star')
					@la_input($module, 'vote_comment')
					@la_input($module, 'vote_user')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/fe_votes') }}">Cancel</a></button>
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
	$("#fe_vote-edit-form").validate({
		
	});
});
</script>
@endpush
