@extends('frontend/layouts/default')



@section('title')
Add project::
@parent
@stop

@section('content')
<div class="page-header">
	<h3>Add project</h3>
</div>
<form method="post" action="">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />

	<fieldset>
		<!-- Name -->
		<div  class="control-group{{ $errors->first('name', ' error') }}">
			<input type="text" id="name" name="name" class="input-block-level" placeholder="Project name">
			{{ $errors->first('name', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Feedback -->
		<div  class="control-group{{ $errors->first('description', ' error') }}">
			<textarea rows="4" id="description" name="description" class="input-block-level" placeholder="Description"></textarea>
			{{ $errors->first('description', '<span class="help-block">:message</span>') }}
		</div>

		<!-- Form actions -->
		<button type="submit" class="btn btn-warning pull-right">Submit</button>
	</fieldset>
</form>
@stop