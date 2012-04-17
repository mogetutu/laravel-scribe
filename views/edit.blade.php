@layout('scribe::layouts.main')

@section('content')
	<ul class="breadcrumb">
		<li>{{ HTML::link_to_route('scribe_list', 'Home') }} <span class="divider">/</span></li>
		<li class="active">Edit {{ $single->name }}&hellip;</li>
	</ul>

	<hr>

	<?php $error_template = '<p class="error">:message</p>'; ?>

	<form action="{{ URL::to_route('scribe_edited') }}" method="post" class="well">
		{{ Form::hidden('id', $single->id) }}

		<label for="nickname">Nickname</label>
		<p>A descriptive name used to identify your content region with Scribe.</p>
		{{ $errors->first('nickname', $error_template) }}
		<input type="text" class="full-input" name="nickname" value="{{ Input::old('nickname', $single->nickname) }}" />

		<hr>

		<label for="name">Region name</label>
		<p>A name that will be used to identify the content region within your view files.</p>
		{{ $errors->first('name', $error_template) }}
		<input type="text" class="full-input" name="name" value="{{ Input::old('name', $single->name) }}" />

		<hr>

		<label for="content">Content</label>
		<p>Your region content in markdown format.</p>
		{{ $errors->first('content', $error_template) }}
		<textarea name="content" id="" cols="30" rows="10" class="full-input">{{ Input::old('content', $single->content) }}</textarea>

		<hr>

		<label for="content">Visibility</label>
		{{ Form::checkbox('hidden', 1, Input::old('hidden', $single->hidden)) }} Mark as hidden?

		<hr>

		{{ Form::submit('Save', array('class' => 'btn btn-primary btn-pad')) }}
		{{ HTML::link_to_route('scribe_list', 'Cancel', array(), array('class' => 'btn')) }}
	</form>
@endsection

