<?php
/**
 * タイトルが設定されているか
 */
$b = new \ebi\Browser();
$dom = new \PHPHtmlParser\Dom();

$dom->load($b->do_get(test_map_url('index::index'))->body());
eq('Tinitter',$dom->find('title', 0)->text);
