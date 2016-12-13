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
    /**
     * 启动 xhprof 性能分析器
     * @param int $flags 分析添加额外信息的可选标记。
     * @param array $options 可选选项，就是通过传递 'ignored_functions' 选项来忽略性能分析中的某些函数。
     */
    public static function startProfiling($flags = 0, $options = [])
    {
        xhprof_enable($flags, $options);
    }

    /**
     * 停止 xhprof 分析器
     * @param string $namespace
     * @return null|string
     */
    public static function stopProfiling($namespace = '')
    {
        $xhprofData = xhprof_disable();
        $xhprofRuns = new \XHProfRuns_Default();
        return $xhprofRuns->save_run($xhprofData, $namespace);
    }

    public static function startSampleProfiling()
    {
        xhprof_sample_enable();
    }

    /**
     * 停止 xhprof 分析器
     * @param string $namespace
     * @return null|string
     */
    public static function stopSampleProfiling($namespace = '')
    {
        $xhprofData = xhprof_sample_disable();
        $xhprofRuns = new \XHProfRuns_Default();
        return $xhprofRuns->save_run($xhprofData, $namespace);
    }
}