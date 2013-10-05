<?php
/**
* @copyright Copyright (c) 2008 Yii Software LLC
* @link http://www.yiiframework.com/
* @license http://www.yiiframework.com/license/
*/
namespace yii\helpers;
class StringHelper
{
	private static $helper;
	public static function init($helper) {
		self::$helper = $helper;
	}
	/**
	 * Returns the number of bytes in the given string.
	 * This method ensures the string is treated as a byte array by using `mb_strlen()`.
	 * @param string $string the string being measured for length
	 * @return integer the number of bytes in the given string.
	 */
	public static function strlen($string)
	{
		return self::$helper->strlen($string);
	}
	/**
	 * Returns the portion of string specified by the start and length parameters.
	 * This method ensures the string is treated as a byte array by using `mb_substr()`.
	 * @param string $string the input string. Must be one character or longer.
	 * @param integer $start the starting position
	 * @param integer $length the desired portion length
	 * @return string the extracted part of string, or FALSE on failure or an empty string.
	 * @see http://www.php.net/manual/en/function.substr.php
	 */
	public static function substr($string, $start, $length)
	{
		return self::$helper->substr($string, $start, $length);
	}
	/**
	 * Returns the trailing name component of a path.
	 * This method is similar to the php function `basename()` except that it will
	 * treat both \ and / as directory separators, independent of the operating system.
	 * This method was mainly created to work on php namespaces. When working with real
	 * file paths, php's `basename()` should work fine for you.
	 * Note: this method is not aware of the actual filesystem, or path components such as "..".
	 * @param string $path A path string.
	 * @param string $suffix If the name component ends in suffix this will also be cut off.
	 * @return string the trailing name component of the given path.
	 * @see http://www.php.net/manual/en/function.basename.php
	 */
	public static function basename($path, $suffix = '')
	{
		return self::$helper->basename($path, $suffix );
	}
	/**
	 * Returns parent directory's path.
	 * This method is similar to `dirname()` except that it will treat
	 * both \ and / as directory separators, independent of the operating system.
	 * @param string $path A path string.
	 * @return string the parent directory's path.
	 * @see http://www.php.net/manual/en/function.basename.php
	 */
	public static function dirname($path)
	{
		return self::$helper->dirname($path);
	}
	/**
	 * Compares two strings or string arrays, and return their differences.
	 * This is a wrapper of the [phpspec/php-diff](https://packagist.org/packages/phpspec/php-diff) package.
	 * @param string|array $lines1 the first string or string array to be compared. If it is a string,
	 * it will be converted into a string array by breaking at newlines.
	 * @param string|array $lines2 the second string or string array to be compared. If it is a string,
	 * it will be converted into a string array by breaking at newlines.
	 * @param string $format the output format. It must be 'inline', 'unified', 'context', 'side-by-side', or 'array'.
	 * @return string|array the comparison result. An array is returned if `$format` is 'array'. For all other
	 * formats, a string is returned.
	 * @throws InvalidParamException if the format is invalid.
	 */
	public static function diff($lines1, $lines2, $format = 'inline')
	{
		return self::$helper->diff($lines1, $lines2, $format );
	}
}
StringHelper::init(new BaseStringHelper());
