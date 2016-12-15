@echo off

rem -------------------------------------------------------------
rem  MyZiyue Xhprof command line web server for Windows.
rem -------------------------------------------------------------

@setlocal

set web_path=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" -S 0.0.0.0:1105 -t "%web_path%/../myziyue/xhprof/html" %*

@endlocal
