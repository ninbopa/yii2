<?php
/**
* @copyright Copyright (c) 2008 Yii Software LLC
* @link http://www.yiiframework.com/
* @license http://www.yiiframework.com/license/
*/
namespace yii\helpers;
class VarDumper
{
	private static $helper;
	public static function init($helper) {
		self::$helper = $helper;
	}
	/**
	 * Displays a variable.
	 * This method achieves the similar functionality as var_dump and print_r
	 * but is more robust when handling complex objects such as Yii controllers.
	 * @param mixed $var variable to be dumped
	 * @param integer $depth maximum depth that the dumper should go into the variable. Defaults to 10.
	 * @param boolean $highlight whether the result should be syntax-highlighted
	 */
	public static function dump($var, $depth = 10, $highlight = false)
	{
		return self::$helper->dump($var, $depth , $highlight );
	}
	/**
	 * Dumps a variable in terms of a string.
	 * This method achieves the similar functionality as var_dump and print_r
	 * but is more robust when handling complex objects such as Yii controllers.
	 * @param mixed $var variable to be dumped
	 * @param integer $depth maximum depth that the dumper should go into the variable. Defaults to 10.
	 * @param boolean $highlight whether the result should be syntax-highlighted
	 * @return string the string representation of the variable
	 */
	public static function dumpAsString($var, $depth = 10, $highlight = false)
	{
		return self::$helper->dumpAsString($var, $depth , $highlight );
	}
}
VarDumper::init(new BaseVarDumper());
