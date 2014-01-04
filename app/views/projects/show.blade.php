@extends('frontend/layouts/default')


@section('content')
<div class="page-header">
	<h3>All projects</h3>
</div>
<div>
<ul>
	@foreach($projects as $project)

		<li><a href="{{ URL::to('feedback') }}/{{$project->id}}"><i> {{$project->name}} </i></a></li>
	@endforeach
</ul>
</div>
@stop