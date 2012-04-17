@layout('scribe::layouts.main')

@section('content')

	<a href="{{ URL::to_route('scribe_new') }}" class="btn btn-primary btn-small btn-up btn-pad"><i class="icon-plus-sign icon-white"></i> New Region</a>
	<a href="{{ URL::to('/') }}" class="btn btn-small btn-up"><i class="icon-eye-open"></i> View Site</a>

	<hr>

	@if (Session::has('created'))
		<div class="alert alert-success">
			<a class="close" data-dismiss="alert">×</a>
			<h4>Created!</h4>
			Content region '{{ Session::get('created') }}' has been created.
		</div>
	@endif

	@if (Session::has('updated'))
		<div class="alert alert-success">
			<a class="close" data-dismiss="alert">×</a>
			<h4>Updated!</h4>
			Content region '{{ Session::get('updated') }}' has been updated.
		</div>
	@endif

	@if (count($regions->results))
	<table class="table table-bordered table-striped region-list">
		@foreach ($regions->results as $region)
		<tr>
			<td><strong><a href="{{ URL::to_route('scribe_edit', $region->name) }}">{{ $region->nickname }}</a></strong></td>
			<td class="actions">
				<div class="btn-group">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to_route('scribe_edit', $region->name) }}"><i class="icon-pencil"></i> Edit</a></li>
						<li><a href="{{ URL::to_route('scribe_edit', $region->name) }}"><i class="icon-trash"></i> Delete</a></li>
					</ul>
				</div>
			</td>
		</tr>
		@endforeach
	</table>
	@else
	<div class="alert alert-block">
		<a class="close" data-dismiss="alert">×</a>
		<h4 class="alert-heading">No content!</h4>
		You have no content regions defined, would you like to make one?<br /><br />
		<a href="{{ URL::to_route('scribe_new') }}" class="btn btn-small btn-up"><i class="icon-plus-sign"></i> New Content Region</a>
	</div>
	@endif
	{{ $regions->links() }}


@endsection
