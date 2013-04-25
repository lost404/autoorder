<?php
return array(
	//'配置项'=>'配置值'
    'URL_MODEL'         => 3,
    'DB_HOST'           => 'localhost',
    'DB_TYPE'           => 'mysql',
    'DB_NAME'           => 'project_autoorder',
    'DB_USER'           => 'project',
    'DB_PWD'            => '123456',
    'DB_POSR'           => 3306,
    'DB_PREFIX'         =>'ao_',
    'TOKEN_ON'=>true,  // 是否开启令牌验证
    'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
    'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true
    'DB_FIELDTYPE_CHECK'=>true,  // 开启字段类型验证
    'VAR_FILTERS'=>'stripslashes,htmlentities,htmlspecialchars',
    'LANG_SWITCH_ON' => true,   // 开启语言包功能
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST'        => 'zh-cn', // 允许切换的语言列表 用逗号分隔
    //'VAR_LANGUAGE'     => 'l' // 默认语言切换变量
    
);
?>