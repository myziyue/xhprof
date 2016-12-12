# xhprof集成类库

* 安装方法

```
composer require myziyue/xhprof
```

* 使用方法
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