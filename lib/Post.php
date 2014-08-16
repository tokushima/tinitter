<?php
class Post extends \ebi\flow\Request{
	public function commit(){
		$post = new \model\Posts();
		$post->set_props($this->ar_vars())->save();
	}
}