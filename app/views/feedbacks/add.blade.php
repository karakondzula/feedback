@extends('frontend/layouts/default')

@section('title')
Comment::
@parent
@stop

@section('content')
<div class="page-header">
	<h3>{{$project->name}}</h3>
</div>
<div>
	<p>{{$project->description}}</p>
</div>
<div class="page-header">
	<h3>Comment</h3>
</div>
<form method="post" action=" {{route('addfeed')}} ">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	<input type="hidden" name="pid" value="{{ $project->id }}" />

	<fieldset>
		<!-- Name -->
		<div  class="control-group{{ $errors->first('name', ' error') }}">
			<input type="text" id="name" name="name" class="input-block-level" placeholder="Name">
			{{ $errors->first('name', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Feedback -->
		<div  class="control-group{{ $errors->first('comment', ' error') }}">
			<textarea rows="4" id="comment" name="comment" class="input-block-level" placeholder="Comment"></textarea>
			{{ $errors->first('comment', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Form actions -->
		<button type="submit" class="btn btn-warning pull-right">Submit</button>
	</fieldset>
</form>
@stop