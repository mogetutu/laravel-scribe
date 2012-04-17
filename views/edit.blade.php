@layout('scribe::layouts.main')

@section('content')
	<div class="page-header">
		<h1>Scribe <small>Edit {{$single->name}}&hellip;</small></h1>
	</div>
	<div class="editor">
		{{ Form::open('scribe') }}
			{{ Form::hidden('id', $single->id) }}
			<p>{{ Form::text('name', $single->name) }}</p>
			<p>{{ Form::textarea('content', $single->content) }}</p>
			<div class="form-actions">
				{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
				{{ HTML::link('scribe', 'Cancel', array('class' => 'btn')) }}
			</div>

		{{ Form::close() }}
	</div>
@endsection

