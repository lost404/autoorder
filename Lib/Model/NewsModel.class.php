<?php
	class NewsModel extends Model{
		protected $_validate = array(
			array('title', '/^(.*){3,30}$/u', '标题请在3-30字之间！', 1, 'regex')
            );
		protected $_auto = array(
            array('time', 'time', 1, 'function')
			);

	}
?>