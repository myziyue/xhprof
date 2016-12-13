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
```
<?php
function foo() {
  for ($idx = 0; $idx < 5; $idx++) {
    bar($idx);
    $x = strlen("abc");
  }
}

ZyXhprof::startProfiling();

// run program
foo();

ZyXhprof::stopProfiling('demo');

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
