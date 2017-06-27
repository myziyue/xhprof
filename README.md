# xhprof集成类库

## 系统需求
1. PHP扩展：xhprof
2. 安装gd、graphviz、fontconfig

   如，以centos系统为例，可以使用yum安装方式
```
# yum install -y gd gd-devel fontconfig fontconfig-devel graphviz
```

## 安装方法

```
composer require myziyue/xhprof

```

## 使用方法

### 方式1：嵌入到项目中
```
<?php
include './vendor/autoload.php';

function foo() {
  for ($idx = 0; $idx < 5; $idx++) {
    bar($idx);
    $x = strlen("abc");
  }
}

\myziyue\xhprof\ZyXhprof::startProfiling(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);

// run program
foo();

\myziyue\xhprof\ZyXhprof::stopProfiling('demo');
```

### 方式2： 通过注册系统关闭函数

* 1、nginx配置文件增加如下代码：

```
fastcgi_param PHP_VALUE "auto_prepend_file=/var/www/vendor/myziyue/xhprof/ZyPreInject.php";
fastcgi_param PHP_VALUE "auto_append_file=/var/www/vendor/myziyue/xhprof/ZyEndInject.php";

```

* 2、php.ini方式：

```
auto_prepend_file=/var/www/vendor/myziyue/xhprof/ZyPreInject.php;
auto_append_file=/var/www/vendor/myziyue/xhprof/ZyEndInject.php;
```

## 查看分析结果

1. 首先，启动服务
```
./vendor/bin/zyxpf
```
2. 然后，通过浏览器，查看分析结果
```
http://localhost:1105/
```
