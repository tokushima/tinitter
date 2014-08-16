<?php
namespace model;
/**
 * @var alnum $nickname @['require'=>true,'max'=>16,'additional_chars'=>' ']
 * @var string $body @['require'=>true,'max'=>1000]
 * @author tokushima
 *
 */
class Posts extends \ebi\Dao{
	protected $id;
	protected $nickname;
	protected $body;
	protected $created_at;
	protected $updated_at;
}
