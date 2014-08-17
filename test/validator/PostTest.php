<?php
/**
 * ニックネームが正しく検証できるか
 */
$test_only_nickname = function($nickname){
	$input = ['nickname'=>$nickname, 'body'=>'ok_body'];

	$obj = new \model\Posts();
	$obj->set_props($input);
	$obj->validate();
};

$test_only_nickname('a');
$test_only_nickname('1234567890123456');
$test_only_nickname('contain space');
$test_only_nickname('1234567890abcdef');

try{
	$test_only_nickname('');
	$test_only_nickname('日本語');
	$test_only_nickname('toooooooooolongnickname');	
	
	failure();
}catch(\ebi\Exceptions $e){
}

/**
 * 本文が正しく検証できるか
 */
$test_only_body = function($body){
	$input = ['nickname'=>'oknickname', 'body'=>$body];

	$obj = new \model\Posts();
	$obj->set_props($input);
	$obj->validate();
};
$create_long_str = function($length,$use_str='a'){
	$str = '';
	while (mb_strlen($str)<$length) {
		$str = $str.$use_str;
	}
	return $str;
};

$test_only_body($create_long_str(1000));
$test_only_body($create_long_str(1000,'あ'));

try{
	$test_only_body('');
	$test_only_body('a'.$create_long_str(1000));
	$test_only_body('あ'.$create_long_str(1000,'あ'));
	
	failure();
}catch(\ebi\Exceptions $e){
}
