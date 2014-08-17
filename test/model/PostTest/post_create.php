<?php
/**
 * Postが作成できるか、取得できるか
 */
$post = new \model\Posts();
$post->nickname('nickname');
$post->body('body');
$post->save();


$id = $post->id();
$obj = \model\Posts::find_get(\ebi\Q::eq('id',$id));
eq('nickname',$obj->nickname());
eq('body',$obj->body());

