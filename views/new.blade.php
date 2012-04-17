@layout('scribe::layouts.main')

@section('content')
	<div class="page-header">
		<h1>Scribe <small>Create a new content region&hellip;</small></h1>
	</div>

	<div class="editor">
		{{ Form::open('scribe/new') }}
			<p>{{ Form::text('name') }}</p>
			<p>{{ Form::textarea('content') }}</p>
			{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
			{{ HTML::link('scribe', 'Cancel', array('class' => 'btn')) }}
		{{ Form::close() }}
	</div>
@endsection

