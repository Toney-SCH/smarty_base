<?php
$title = "title";
$content = "hello";
include 'class.php';
$mini = new mini();
$mini->template_dir = 'templates';
$mini->compile_dir = 'compiles';
//echo $mini ->compile('text.html');

//include($mini->compile('text.html'));
$mini ->assign('xxx',$title);
$mini ->assign('content',$content);
//var_dump($mini->_tpl_var);
$mini ->display('text.html');

/**
*smarty 工作原理：
*1.把需要显示的全局变量，赋值，塞到对象内部的属性上，一个数组里
*2.编译模板，把<$标签>，解析成PHP代码
*3。导入编译后的PHP文件
*
*使用smarty的步骤：
*1.smarty是一个类，要使用，先实例化
*2.assign赋值
*3.display【编译到输出】
*
*
*smarty智辩：
*1.编译模板，浪费时间
*2.要把变量在重新复制到对象的属性上，增大开销
*/
