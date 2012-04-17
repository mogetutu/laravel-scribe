<?php

/*
Route::filter('cms_auth', function() {
	return Redirect::to('cms/login');
});

*/
/*
Route::get('(:bundle)', function() {
	return View::make('scribe::new')
		->with('content', Scribe_Content::all());
});
*/

Route::get('(:bundle)', array('as' => 'scribe_list', 'do' => function() {
	return View::make('scribe::list')
		->with('regions', Scribe_Content::paginate(10));
}));

Route::get('(:bundle)/new', array('as' => 'scribe_new', 'do' => function() {
	return View::make('scribe::new');
}));

Route::post('(:bundle)/new', array('do' => function() {
	$new = array(
		'name'		=> Input::get('name'),
		'content'	=> Input::get('content')
	);

	$c = new Scribe_Content($new);
	$c->save();

	return Redirect::to('scribe');
}));

Route::get('(:bundle)/edit/(:any)', array('as' => 'scribe_edit', 'do' => function($name) {
	$single = Scribe_Content::where_name($name)->first();

	return View::make('scribe::edit')
		->with('region', Scribe_Content::all())
		->with('single', $single);
}));
