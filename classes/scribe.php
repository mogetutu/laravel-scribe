<?php

include Bundle::path('scribe').'classes/markdown.php';

class Scribe
{
	public static function content($name)
	{
		$content = Scribe_Content::where_name($name)->first();
		if (! $content) return 'No content.';
		return $content->content;
	}

	public static function content_id($id)
	{
		$content = Scribe_Content::find($id);
		if (! $content) return 'No content.';
		return new Markdown($content->content);
	}
}
