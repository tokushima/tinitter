<?php
\ebi\Conf::set([
	'ebi.Dao'=>[
		'connection'=>[
			'model.Posts'=>[
				'type'=>'ebi.DbConnector',
				'dbname'=>'data.db',
			],
		],
	],
]);
