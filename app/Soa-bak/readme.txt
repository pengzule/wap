﻿1：只要把/Soa/ThriftServer.php放在nginx配置的路径下。
	如：
	server {
    listen       6666;
    server_name  localhost;
	...
	 location ~ \.php$ {
		   root /jqm/smarthome/smarthome_v1/app;
		   fastcgi_pass   127.0.0.1:9000;
		   fastcgi_index  info.php;
		   fastcgi_param  SCRIPT_FILENAME  /jqm/smarthome/smarthome_v1/app$fastcgi_script_name;
		   include        fastcgi_params;
		}
	}
	
2：运行/Soa/test/thriftClientTest.php就可以。
	仅仅是一个参考。
相关的设置写的全局的地方，如：
	soa_config.php应该放在laravel的config里面。
	
3：需要更多接口的话，可以再编译

4:thrift版本号:0.9.3
	以后放进来的时候最好写上版本号