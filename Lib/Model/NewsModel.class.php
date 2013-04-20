<?php
	class NewsModel extends Model{
		protected $_volidata = array(
			array('title', '/^(.*){3,30}$/u', '标题请在3-30字之间！', 1, 'regex'),
			array('content', '/^(.*){10,5000}$/u', '内容请在10-5000字之间', 1, 'regex')
			);
		protected $_auto = array(
			);

	}
?>