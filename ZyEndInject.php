<?php
/**
 * Created by PhpStorm.
 *
 * @author Bi Zhiming <evan2884@gmail.com>
 * @created 2016/12/13  下午12:01
 * @since 1.0
 */
include_once 'ZyXhprof.php';

//在程序结束后收集数据
register_shutdown_function(function () {
    $xhprofData = \myziyue\xhprof\ZyXhprof::disableProfiling();
    //让数据收集程序在后台运行
    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request();
    }

    \myziyue\xhprof\ZyXhprof::saveProfiling($xhprofData, date('YmdHis'));
});