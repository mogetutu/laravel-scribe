<?php

// get the before each page filter from config
$before = Config::get('scribe::security.page_filter');

/*
|--------------------------------------------------------------------------
| VIEW LIST OF REGIONS
|--------------------------------------------------------------------------
*/
Route::get('(:bundle)', array(
	'as' => 'scribe_list',
	'before' => $before,
	'do' =>
function() {

	// show list of paginated content
	return View::make('scribe::list')
		->with('regions', Scribe_Content::paginate(8));

}));

/*
|--------------------------------------------------------------------------
| SHOW CREATE NEW REGION FORM
|--------------------------------------------------------------------------
*/
Route::get('(:bundle)/new', array(
	'as' => 'scribe_new',
	'before' => $before,
	'do' =>
function() {

	// show the new content region form
	return View::make('scribe::new');

}));

/*
|--------------------------------------------------------------------------
| HANDLE CREATE NEW REGION FORM
|--------------------------------------------------------------------------
*/
Route::post('(:bundle)/new', array(
	'before' => $before,
	'do' =>
function() {

	// get insertion array safely from post data
	$new = array(
		'nickname' 	=> Input::get('nickname'),
		'name'		=> Input::get('name'),
		'content'	=> Input::get('content'),
		'hidden'    => Input::has('hidden')
	);

	// validation rules for a new content region
	$rules = array(
		'nickname'	=> 'required|min:3|max:128',
		'name' 		=> 'required|min:3|max:128|alpha_dash',
		'content' 	=> 'required',
	);

	// create the validator
	$v = Validator::make($new, $rules);

	// check the result
	if($v->fails())
	{
		// redirect to the form, with errors and old input
		return Redirect::to_route('scribe_new')
			->with_errors($v)
			->with_input();
	}

	// create a new object, fill it and save
	$c = new Scribe_Content($new);
	$c->save();

	// redirect to the listing, with created flash indication
	return Redirect::to_route('scribe_list')
		->with('created', $c->nickname);

}));


/*
|--------------------------------------------------------------------------
| SHOW EDIT EXISTING REGION FORM
|--------------------------------------------------------------------------
*/
Route::get('(:bundle)/edit/(:any)', array(
	'as' => 'scribe_edit',
	'before' => $before,
	'do' =>
function($name) {

	// find a content region by name
	$single = Scribe_Content::where_name($name)->first();

	// show the content region edit form
	return View::make('scribe::edit')
		->with('single', $single);

}));

/*
|--------------------------------------------------------------------------
| HANDLE EDIT EXISTING REGION FORM
|--------------------------------------------------------------------------
*/
Route::post('(:bundle)/edit', array(
	'as' => 'scribe_edited',
	'before' => $before,
	'do' =>
function() {

	// get the hidden id field
	$id = Input::get('id');

	// create the insertion array safely from post
	$new = array(
		'nickname' 	=> Input::get('nickname'),
		'name'		=> Input::get('name'),
		'content'	=> Input::get('content'),
		'hidden'    => Input::has('hidden')
	);

	// set validation rules for edited item
	$rules = array(
		'nickname'	=> 'required|min:3|max:128',
		'name' 		=> 'required|min:3|max:128|alpha_dash',
		'content' 	=> 'required',
	);

	// create the validator isntance
	$v = Validator::make($new, $rules);

	// get the old content region
	$old = Scribe_Content::find($id);

	// check the validation result
	if($v->fails())
	{
		// on failure redirect to edit form with old region,
		// errors and old input
		return Redirect::to_route('scribe_edit', $old->name)
			->with('single', $old)
			->with_errors($v)
			->with_input();
	}

	// update and save teh content region
	$old->fill($new);
	$old->save();

	// return to region listing with an updated flash notify
	return Redirect::to_route('scribe_list')
		->with('updated', $old->nickname);

}));
