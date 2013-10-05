<?php
/**
* @copyright Copyright (c) 2008 Yii Software LLC
* @link http://www.yiiframework.com/
* @license http://www.yiiframework.com/license/
*/
namespace yii\helpers;
class Json
{
	private static $helper;
	public static function init($helper) {
		self::$helper = $helper;
	}
	/**
	 * Encodes the given value into a JSON string.
	 * The method enhances `json_encode()` by supporting JavaScript expressions.
	 * In particular, the method will not encode a JavaScript expression that is
	 * represented in terms of a [[JsExpression]] object.
	 * @param mixed $value the data to be encoded
	 * @param integer $options the encoding options. For more details please refer to
	 * [[http://www.php.net/manual/en/function.json-encode.php]]
	 * @return string the encoding result
	 */
	public static function encode($value, $options = 0)
	{
		return self::$helper->encode($value, $options );
	}
	/**
	 * Decodes the given JSON string into a PHP data structure.
	 * @param string $json the JSON string to be decoded
	 * @param boolean $asArray whether to return objects in terms of associative arrays.
	 * @return mixed the PHP data
	 * @throws InvalidParamException if there is any decoding error
	 */
	public static function decode($json, $asArray = true)
	{
		return self::$helper->decode($json, $asArray );
	}
}
Json::init(new BaseJson());
