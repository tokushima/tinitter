<?php
/**
 * 現在のページ番号が正しいか
 */
for($i=0;$i<25;$i++){
	$post = new \model\Posts();
	$post->nickname('nickname');
	$post->body('body');
	$post->save();
}

$b = new \ebi\Browser();
$dom = new \PHPHtmlParser\Dom();

$dom->load($b->do_get(url('index::index'))->body());
eq('1', $dom->find('.page-num', 0)->text );

$dom->load($b->do_get(url('index::page',2))->body());
eq('2', $dom->find('.page-num', 0)->text );
