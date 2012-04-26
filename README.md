#Scribe BETA
## A Basic Content Management Bundle for Laravel PHP

Scribe can be used to define user editable content within your views. The bundle provides a simple 'back-end' system for managing this content in markdown format.

### Installation

First set up a database connection in the usual way.

	php artisan bundle:install scribe

	php artisan bundle:publish
	php artisan migrate:install
	php artisan migrate

Add the following to your `application/bundles.php`..

	'scribe' => array(
		'auto' 		=> true,
		'handles'	=> 'scribe',
	),

### Usage

First create some content region markers within your application/site views..

	<?php echo Scribe::content('main-content'); ?>

Use a descriptive alpha-numeric name without spaces to describe the content region, remember these region names.

Now visit `yourapp.com/scribe` to access the administration area. Create a new content region, and use the same region name as you have put in your views. The nickname is used as a friendly name to identify your content region in the back end system. Content contains the Markdown format text to be processed and inserted into your views. The hidden checkbox allows you to define a content region, but to keep it hidden in your views.

### Security

A before filter can be provided in scribe/config/security to protect all back-end routes.

Enjoy using Scribe, updates soon!
