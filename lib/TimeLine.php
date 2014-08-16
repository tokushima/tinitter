<?php
class TimeLine{
	public function show($page_num=1){
		$paginator = new \ebi\Paginator(10,$page_num);
		
		$post_list = \model\Posts::find_all($paginator,\ebi\Q::order('-id'));
		return ['post_list'=>$post_list,'paginator'=>$paginator];
	}
}