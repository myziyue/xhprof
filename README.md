# xhprof集成类库

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

ZyXhprof::endProfiling('demo');

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
