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
    private static $_notLoadExtend = 'Failed to create Xhprof object; extension not loaded?';
    /**
     * 启动 xhprof 性能分析器
     * @param int $flags 分析添加额外信息的可选标记。
     * @param array $options 可选选项，就是通过传递 'ignored_functions' 选项来忽略性能分析中的某些函数。
     */
    public static function startProfiling($flags = 0, $options = [])
    {
        if (self::isSupported()) {
            xhprof_enable($flags, $options);
            return true;
        }
        echo self::$_notLoadExtend;
        exit(1);
    }

    /**
     * 停止 xhprof 分析器
     * @param string $namespace
     * @return null|string
     */
    public static function stopProfiling($namespace = '')
    {
        if (self::isSupported()) {
            return self::saveProfiling(self::disableProfiling(), $namespace);
        }
        echo self::$_notLoadExtend;
        exit(1);
    }

    public static function startSampleProfiling()
    {
        if (self::isSupported()) {
            xhprof_sample_enable();
            return true;
        }
        echo self::$_notLoadExtend;
        exit(1);
    }

    /**
     * 停止 xhprof 分析器
     * @param string $namespace
     * @return null|string
     */
    public static function stopSampleProfiling($namespace = '')
    {
        if (self::isSupported()) {
            return self::saveProfiling(self::disableSampleProfiling(), $namespace);
        }
        echo self::$_notLoadExtend;
        exit(1);
    }

    public static function disableProfiling()
    {
        if (self::isSupported()) {
            return xhprof_disable();
        }
        echo self::$_notLoadExtend;
        exit(1);
    }

    public static function saveProfiling($xhprofData, $namespace)
    {
        if (self::isSupported()) {
            $xhprofRuns = new \XHProfRuns_Default();
            return $xhprofRuns->save_run($xhprofData, $namespace);
        }
        echo self::$_notLoadExtend;
        exit(1);
    }

    public static function disableSampleProfiling()
    {
        if (self::isSupported()) {
            return xhprof_sample_disable();
        }
        echo self::$_notLoadExtend;
        exit(1);
    }

    protected static function isSupported()
    {
        return extension_loaded('xhprof');
    }
}