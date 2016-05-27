#Fecm
###所有代码是基于ThinkPHP框架开发的

>项目教程1：[http://drops.wooyun.org/web/13009](http://drops.wooyun.org/web/13009)

>项目教程2：[http://drops.wooyun.org/web/13970](http://drops.wooyun.org/web/13970)

>作者：Black-Hole

>邮箱：158099591@qq.com && 158blackhole@gmail.com

###注意：

* 前端检测代码：
```JavaScript
var backAlert = alert;
window.alert = function(str){
    backAlert(str);
    new Image().src = 'http://fecm_url/Api/addVul/';
}
```

* 默认登陆账户是： `158099591@qq.com && 123456`

* 数据库配置在`/Application/Common/Conf/config.php`里

* 因为是伪静态，所以请在nginx配置文件中改动如下：
```nginx
server {
    listen       80;
    server_name  your_domain;
    root   "website_path";
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
```
###其他:
我讨厌markdown╮(╯﹏╰)╭

---
#Fecm
###All of the code is based on the framework for the development ThinkPHP
>Project Tutorial 1：[http://drops.wooyun.org/web/13009](http://drops.wooyun.org/web/13009)

>Project Tutorial 2：[http://drops.wooyun.org/web/13907](http://drops.wooyun.org/web/13907)

>Author：Black-Hole

>Email：158099591@qq.com && 158blackhole@gmail.com

###Important：

* Front-end detection code：
```JavaScript
var backAlert = alert;
window.alert = function(str){
    backAlert(str);
    new Image().src = 'http://fecm_url/Api/addVul/';
}
```
* The default login account：`158099591@qq.com && 123456`

* Database Config in `/Application/Common/Conf/config.php`

* Because it is pseudo-static , so please nginx configuration file changes are as follows：
```nginx
server {
    listen       80;
    server_name  your_domain;
    root   "website_path";
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
```

###Other:
>I hate markdown╮(╯﹏╰)╭

>Translation from Google