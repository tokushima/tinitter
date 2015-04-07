<?php
/**
 * 投稿が保存されるか
 */
$b = new \testman\Browser();
$b->do_get(url('index::index'));

// CSRF対策のトークンを事前取得
$csrftoken = null;
foreach($b->xml()->find('form/input') as $input){
	if($input->in_attr('name') == 'csrftoken'){
		$csrftoken = $input->in_attr('value');
		break;
	}
}
neq(null,$csrftoken);


// テストデータ生成
$test_name = 'testname';
$test_body = 'testbody';
$b->vars('nickname',$test_name);
$b->vars('body',$test_body);
$b->vars('csrftoken',$csrftoken);
// データを送信
$b->do_post(url('index::commit'));
eq(200,$b->status());

// DBに保存されたかを確認
$post = \model\Posts::find_get(\ebi\Q::eq('id',1));
eq($test_name,$post->nickname());
eq($test_body,$post->body());

// 投稿がページに表示されているか確認
$b->do_get(url('index::page',1));

$dom = new \PHPHtmlParser\Dom();
$dom->load($b->body());
eq($test_name, $dom->find('.postcell .nickname', 0)->text);
eq($test_body, $dom->find('.postcell .body', 0)->text);
