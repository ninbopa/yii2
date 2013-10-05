<?php
/**
* @copyright Copyright (c) 2008 Yii Software LLC
* @link http://www.yiiframework.com/
* @license http://www.yiiframework.com/license/
*/
namespace yii\helpers;
class HtmlPurifier
{
	private static $helper;
	public static function init($helper) {
		self::$helper = $helper;
	}
	/**
	 * Passes markup through HTMLPurifier making it safe to output to end user
	 *
	 * @param string $content
	 * @param array|null $config
	 * @return string
	 */
	public static function process($content, $config = null)
	{
		return self::$helper->process($content, $config );
	}
}
HtmlPurifier::init(new BaseHtmlPurifier());
