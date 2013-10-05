<?php
/**
* @copyright Copyright (c) 2008 Yii Software LLC
* @link http://www.yiiframework.com/
* @license http://www.yiiframework.com/license/
*/
namespace yii\helpers;
class Inflector
{
	private static $helper;
	public static function init($helper) {
		self::$helper = $helper;
	}
	/**
	 * Converts a word to its plural form.
	 * Note that this is for English only!
	 * For example, 'apple' will become 'apples', and 'child' will become 'children'.
	 * @param string $word the word to be pluralized
	 * @return string the pluralized word
	 */
	public static function pluralize($word)
	{
		return self::$helper->pluralize($word);
	}
	/**
	 * Returns the singular of the $word
	 * @param string $word the english word to singularize
	 * @return string Singular noun.
	 */
	public static function singularize($word)
	{
		return self::$helper->singularize($word);
	}
	/**
	 * Converts an underscored or CamelCase word into a English
	 * sentence.
	 * @param string $words
	 * @param bool $ucAll whether to set all words to uppercase
	 * @return string
	 */
	public static function titleize($words, $ucAll = false)
	{
		return self::$helper->titleize($words, $ucAll );
	}
	/**
	 * Returns given word as CamelCased
	 * Converts a word like "send_email" to "SendEmail". It
	 * will remove non alphanumeric character from the word, so
	 * "who's online" will be converted to "WhoSOnline"
	 * @see variablize
	 * @param string $word the word to CamelCase
	 * @return string
	 */
	public static function camelize($word)
	{
		return self::$helper->camelize($word);
	}
	/**
	 * Converts a CamelCase name into space-separated words.
	 * For example, 'PostTag' will be converted to 'Post Tag'.
	 * @param string $name the string to be converted
	 * @param boolean $ucwords whether to capitalize the first letter in each word
	 * @return string the resulting words
	 */
	public static function camel2words($name, $ucwords = true)
	{
		return self::$helper->camel2words($name, $ucwords );
	}
	/**
	 * Converts a CamelCase name into an ID in lowercase.
	 * Words in the ID may be concatenated using the specified character (defaults to '-').
	 * For example, 'PostTag' will be converted to 'post-tag'.
	 * @param string $name the string to be converted
	 * @param string $separator the character used to concatenate the words in the ID
	 * @return string the resulting ID
	 */
	public static function camel2id($name, $separator = '-')
	{
		return self::$helper->camel2id($name, $separator );
	}
	/**
	 * Converts an ID into a CamelCase name.
	 * Words in the ID separated by `$separator` (defaults to '-') will be concatenated into a CamelCase name.
	 * For example, 'post-tag' is converted to 'PostTag'.
	 * @param string $id the ID to be converted
	 * @param string $separator the character used to separate the words in the ID
	 * @return string the resulting CamelCase name
	 */
	public static function id2camel($id, $separator = '-')
	{
		return self::$helper->id2camel($id, $separator );
	}
	/**
	 * Converts any "CamelCased" into an "underscored_word".
	 * @param string $words the word(s) to underscore
	 * @return string
	 */
	public static function underscore($words)
	{
		return self::$helper->underscore($words);
	}
	/**
	 * Returns a human-readable string from $word
	 * @param string $word the string to humanize
	 * @param bool $ucAll whether to set all words to uppercase or not
	 * @return string
	 */
	public static function humanize($word, $ucAll = false)
	{
		return self::$helper->humanize($word, $ucAll );
	}
	/**
	 * Same as camelize but first char is in lowercase.
	 * Converts a word like "send_email" to "sendEmail". It
	 * will remove non alphanumeric character from the word, so
	 * "who's online" will be converted to "whoSOnline"
	 * @param string $word to lowerCamelCase
	 * @return string
	 */
	public static function variablize($word)
	{
		return self::$helper->variablize($word);
	}
	/**
	 * Converts a class name to its table name (pluralized)
	 * naming conventions. For example, converts "Person" to "people"
	 * @param string $className the class name for getting related table_name
	 * @return string
	 */
	public static function tableize($className)
	{
		return self::$helper->tableize($className);
	}
	/**
	 * Returns a string with all spaces converted to given replacement and
	 * non word characters removed.  Maps special characters to ASCII using
	 * `Inflector::$transliteration`
	 * @param string $string An arbitrary string to convert
	 * @param string $replacement The replacement to use for spaces
	 * @return string The converted string.
	 */
	public static function slug($string, $replacement = '-')
	{
		return self::$helper->slug($string, $replacement );
	}
	/**
	 * Converts a table name to its class name. For example, converts "people" to "Person"
	 * @param string $tableName
	 * @return string
	 */
	public static function classify($tableName)
	{
		return self::$helper->classify($tableName);
	}
	/**
	 * Converts number to its ordinal English form. For example, converts 13 to 13th, 2 to 2nd ...
	 * @param int $number the number to get its ordinal value
	 * @return string
	 */
	public static function ordinalize($number)
	{
		return self::$helper->ordinalize($number);
	}
}
Inflector::init(new BaseInflector());
