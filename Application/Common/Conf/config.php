<?php
return array(
	// 基础配置
	'URL_MODEL'       => 2,	//URL模式，记得在nginx修改下配置。类似下面的代码（12~14行）：
	/*
server {
    listen       80;
    server_name  fecm.cn www.fecm.cn;
    root   "E:/WWW/fecm";
    location / {
        index  index.html index.htm index.php;
        if (!-e $request_filename){
            rewrite ^/(.*)$ /index.php/$1;
        }
        #autoindex  on;
    }
    location ~ \.php(.*)$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_split_path_info  ^((?U).+\.php)(/?.+)$;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        fastcgi_param  PATH_INFO  $fastcgi_path_info;
        fastcgi_param  PATH_TRANSLATED  $document_root$fastcgi_path_info;
        include        fastcgi_params;
    }
}
	*/
	'SHOW_PAGE_TRACE' => false,	//是否显示页面加载详情
	
	// Cookies配置
	'COOKIE_EXPIRE' => 86400,	//cookies有效时长
	'COOKIE_DOMAIN' => $_SERVER['HTTP_HOST'],	//cookies有效域名
	'COOKIE_PATH'   => '/' ,	//cokies有效路径
	'COOKIE_PREFIX' => 'FECM_',	//cookies前缀
	
	// Token配置
	'TOKEN_ON'      => false,  // 是否开启令牌验证 默认关闭
	'TOKEN_NAME'    => '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
	'TOKEN_TYPE'    => 'md5',  //令牌哈希验证规则 默认为MD5
	'TOKEN_RESET'   => true,  //令牌验证出错后是否重置令牌 默认为true
	
	//数据库配置
	'DB_TYPE'       => 'mysql',	//数据库类型
	'DB_HOST'       => 'localhost',	//数据库所属位置
	'DB_NAME'       => 'fecm',	//数据库名
	'DB_USER'       => 'root',	//数据库密码
	'DB_PWD'        => '000000',	//数据库密码
	'DB_PORT'       => '3306',	//数据库连接端口
	'DB_PREFIX'     => 'fecm_',	//数据库表前缀
	);