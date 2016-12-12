<?php
namespace myziyue\xhprof;

/**
 * Created by PhpStorm.
 *
 * @author Bi Zhiming <evan2884@gmail.com>
 * @created 2016/12/12  上午9:36
 * @since 1.0
 */
defined('MYZY_XHPROF_ROOT') OR define('MYZY_XHPROF_ROOT', realpath(__DIR__));

include_once MYZY_XHPROF_ROOT . "/lib/utils/xhprof_lib.php";
include_once MYZY_XHPROF_ROOT . "/lib/utils/xhprof_runs.php";

class ZyXhprof
{
    public static function startProfiling()
    {
        xhprof_enable();
    }

    public static function endProfiling($namespace = __FUNCTION__)
    {
        $xhprofData = xhprof_disable();
        $xhprofRuns = new \XHProfRuns_Default();
        return $xhprofRuns->save_run($xhprofData, $namespace);
    }
}