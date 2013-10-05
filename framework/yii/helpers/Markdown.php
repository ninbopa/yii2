<?php
/**
* @copyright Copyright (c) 2008 Yii Software LLC
* @link http://www.yiiframework.com/
* @license http://www.yiiframework.com/license/
*/
namespace yii\helpers;
class Markdown
{
	private static $helper;
	public static function init($helper) {
		self::$helper = $helper;
	}
	/**
	 * Converts markdown into HTML
	 *
	 * @param string $content
	 * @param array $config
	 * @return string
	 */
	public static function process($content, $config = array())
	{
		return self::$helper->process($content, $config );
	}
}
Markdown::init(new BaseMarkdown());
