<?php
/**
 * ページングのリンクが表示されているか
 */
for($i=0;$i<25;$i++){
	$post = new \model\Posts();
	$post->nickname('nickname');
	$post->body('body');
	$post->save();
}
$b = new \ebi\Browser();
$dom = new \PHPHtmlParser\Dom();

// !! をつけることで数値をbool型に変換している、0=false 1>=true
$dom->load($b->do_get(url('index::index'))->body());
eq(false,!!count($dom->find('.prev')) );
eq(true,!!count($dom->find('.next')) );

$dom->load($b->do_get(url('index::page',2))->body());
eq(true,!!count($dom->find('.prev')));
eq(true,!!count($dom->find('.next')));

$dom->load($b->do_get(url('index::page',3))->body());
eq(true,!!count($dom->find('.prev')));
eq(false,!!count($dom->find('.next')));

