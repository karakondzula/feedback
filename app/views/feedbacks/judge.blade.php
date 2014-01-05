@extends('frontend/layouts/default')


@section('content')
<div class="page-header">
	<h3>New comments</h3>
</div>
<div>
<ul>
	@foreach($feeds as $feed)
		<p>
			<h4> {{$feed->visitor}} </h4>
			<p> {{$feed->feedback}} </p>
		</p>
	@endforeach
</ul>
</div>
@stop
