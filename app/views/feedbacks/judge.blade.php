@extends('frontend/layouts/default')


@section('content')
<div class="page-header">
	<h3>New comments</h3>
</div>
<div>
<ul>
	@foreach($feeds as $feed)
		<p>
			<h4> {{ $feed->visitor }} </h4>
			<p> {{ $feed->feedback }} </p>
		</p>
		<p>
		{{ Form::open( array('method' => 'post','action'=> 'JudgeController@postJudge' ) ) }}
		{{ Form::hidden('fid',$feed->id) }}
		{{ Form::radio('judge','1',true) }} Approve <br>
		{{ Form::radio('judge','0') }} Deny <br>
		{{ Form::submit('Confirm')}}
		{{ Form::close() }}
		</p>

	@endforeach
</ul>
</div>
@stop
