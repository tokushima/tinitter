<?php
include_once('bootstrap.php');

\ebi\Flow::app([
	'plugins'=>[
		'ebi.flow.plugin.HtmlFilter',
		'ebi.flow.plugin.TemplateParts',
		'ebi.flow.plugin.Csrf',
	],
	'patterns'=>[
		''=>['name'=>'index',
			'action'=>'TimeLine::show',
			'template'=>'show.html'
		],
		'page/(\d+)'=>['name'=>'page',
			'action'=>'TimeLine::show',
			'template'=>'show.html'
		],
		'page/commit'=>['name'=>'commit',
			'action'=>'Post::commit',
			'template'=>'show.html',
			'post_after'=>'index',
			'error_template'=>'error_form.html'
		],
		'dt'=>['action'=>'ebi.Dt','mode'=>'local'],
	],
]);

