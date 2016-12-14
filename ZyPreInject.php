<?php
/**
 * Created by PhpStorm.
 *
 * @author Bi Zhiming <evan2884@gmail.com>
 * @created 2016/12/13  下午12:01
 * @since 1.0
 */
include_once 'ZyXhprof.php';

//开启xhprof
\myziyue\xhprof\ZyXhprof::startProfiling(XHPROF_FLAGS_MEMORY | XHPROF_FLAGS_CPU);
