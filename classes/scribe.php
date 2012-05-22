<?php

if ( ! function_exists('Markdown'))
{
	include Bundle::path('scribe').'classes/markdown.php';
}

class Scribe
{
	public static function content($name)
	{
		$content = Scribe_Content::where_name($name)
			->where_hidden(false)
			->first();
		if (! $content) return null;
		return Markdown($content->content);
	}

	public static function content_id($id)
	{
		$content = Scribe_Content::where_id($id)
			->where_hidden(false)
			->first();
		if (! $content) return null;
		return Markdown($content->content);
	}
}
