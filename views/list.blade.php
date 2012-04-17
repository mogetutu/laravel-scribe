@layout('scribe::layouts.main')

@section('content')
	<div class="page-header">
		<h1>Scribe <small>View all content regions&hellip;</small></h1>
		<div class="float-right">
			{{ HTML::link('scribe/new', 'New region', array('class' => 'btn btn-primary btn-up')) }}
		</div>
	</div>
	<table class="table table-bordered table-striped region-list">
		@foreach ($regions->results as $region)
		<tr>
			<td>{{ $region->name }}</td>
			<td class="actions">
				{{ HTML::link('scribe/edit/'.$region->name, 'Edit', array('class' => 'btn')) }}
				{{ HTML::link('/', 'Delete', array('class' => 'btn btn-danger')) }}
			</td>
		</tr>
		@endforeach
	</table>
	{{ $regions->links() }}


@endsection
