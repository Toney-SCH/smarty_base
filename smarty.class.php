<?php
/**
*模板类的第一步：把标签解析PHP输出语句
*模板文件-》PHP文件
*
*为了平衡目录清晰，我们把模板文件和编译后的文件，放在不同的目录中
*用两个属性来记录这两个目录
**/
class mini{
	public $template_dir = '';//模板文件所在位置
	public $compile_dir = '';//模板编译后存放的位置
    //定义一个空数组，来接收外部的变量
	public $_tpl_var = [];
	public function assign($key,$value){
		$this->_tpl_var[$key]=$value;
	}
	/**
	* string $template 模板文件名
	* return string
   	* 流程：把指定的模板内容都过来，在编译成PHP文件
	**/
	public function display($template){
		$com = $this->compile($template);
		include($com);
	}
	public function compile($template){
		//读出模板内容
		$temp = $this->template_dir.'/'.$template;
		$source = file_get_contents($temp);
		//echo $source;
		//再把翻译后的内容保存成.PHP文件
		$com = $this->compile_dir . '/' . $template . '.php';
		//判断模板是否存在
		if(file_exists($com) && filemtime($temp)<filemtime($com)){
			return $com;
		}
		//替换模板内容
		$source = str_replace('{$','<?php echo $this->_tpl_var[\'',$source);
	    $source = str_replace('}','\']; ?>',$source);
		//echo $source;
		file_put_contents($com,$source);
		return $com;	
	}
}
