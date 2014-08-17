<?php
/**
 * ページ指定で取得できるか
 */

for($i=0;$i<35;$i++){
	$post = new \model\Posts();
	$post->nickname('nickname');
	$post->body('body');
	$post->save();
}

$paginator = new \ebi\Paginator(10,1);
eq(10,sizeof(\model\Posts::find_all($paginator)));
eq(true,$paginator->is_next());

$paginator = new \ebi\Paginator(10,4);
eq(5,sizeof(\model\Posts::find_all($paginator)));
eq(false,$paginator->is_next());

$paginator = new \ebi\Paginator(10,5);
eq(0,sizeof(\model\Posts::find_all($paginator)));
eq(false,$paginator->is_next());
