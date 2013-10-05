<?php
/**
* @copyright Copyright (c) 2008 Yii Software LLC
* @link http://www.yiiframework.com/
* @license http://www.yiiframework.com/license/
*/
namespace yii\helpers;
class ArrayHelper
{
	private static $helper;
	public static function init($helper) {
		self::$helper = $helper;
	}
	/**
	 * Converts an object or an array of objects into an array.
	 * @param object|array $object the object to be converted into an array
	 * @param array $properties a mapping from object class names to the properties that need to put into the resulting arrays.
	 * The properties specified for each class is an array of the following format:
	 *
	 * ~~~
	 * array(
	 *     'app\models\Post' => array(
	 *         'id',
	 *         'title',
	 *         // the key name in array result => property name
	 *         'createTime' => 'create_time',
	 *         // the key name in array result => anonymous function
	 *         'length' => function ($post) {
	 *             return strlen($post->content);
	 *         },
	 *     ),
	 * )
	 * ~~~
	 *
	 * The result of `ArrayHelper::toArray($post, $properties)` could be like the following:
	 *
	 * ~~~
	 * array(
	 *     'id' => 123,
	 *     'title' => 'test',
	 *     'createTime' => '2013-01-01 12:00AM',
	 *     'length' => 301,
	 * )
	 * ~~~
	 *
	 * @param boolean $recursive whether to recursively converts properties which are objects into arrays.
	 * @return array the array representation of the object
	 */
	public static function toArray($object, $properties = array(), $recursive = true)
	{
		return self::$helper->toArray($object, $properties , $recursive );
	}
	/**
	 * Merges two or more arrays into one recursively.
	 * If each array has an element with the same string key value, the latter
	 * will overwrite the former (different from array_merge_recursive).
	 * Recursive merging will be conducted if both arrays have an element of array
	 * type and are having the same key.
	 * For integer-keyed elements, the elements from the latter array will
	 * be appended to the former array.
	 * @param array $a array to be merged to
	 * @param array $b array to be merged from. You can specify additional
	 * arrays via third argument, fourth argument etc.
	 * @return array the merged array (the original arrays are not changed.)
	 */
	public static function merge($a, $b)
	{
		return self::$helper->merge($a, $b);
	}
	/**
	 * Retrieves the value of an array element or object property with the given key or property name.
	 * If the key does not exist in the array, the default value will be returned instead.
	 *
	 * Below are some usage examples,
	 *
	 * ~~~
	 * // working with array
	 * $username = \yii\helpers\ArrayHelper::getValue($_POST, 'username');
	 * // working with object
	 * $username = \yii\helpers\ArrayHelper::getValue($user, 'username');
	 * // working with anonymous function
	 * $fullName = \yii\helpers\ArrayHelper::getValue($user, function($user, $defaultValue) {
	 *     return $user->firstName . ' ' . $user->lastName;
	 * });
	 * ~~~
	 *
	 * @param array|object $array array or object to extract value from
	 * @param string|\Closure $key key name of the array element, or property name of the object,
	 * or an anonymous function returning the value. The anonymous function signature should be:
	 * `function($array, $defaultValue)`.
	 * @param mixed $default the default value to be returned if the specified key does not exist
	 * @return mixed the value of the element if found, default value otherwise
	 */
	public static function getValue($array, $key, $default = null)
	{
		return self::$helper->getValue($array, $key, $default );
	}
	/**
	 * Removes an item from an array and returns the value. If the key does not exist in the array, the default value
	 * will be returned instead.
	 *
	 * Usage examples,
	 *
	 * ~~~
	 * // $array = array('type' => 'A', 'options' => array(1, 2));
	 * // working with array
	 * $type = \yii\helpers\ArrayHelper::remove($array, 'type');
	 * // $array content
	 * // $array = array('options' => array(1, 2));
	 * ~~~
	 *
	 * @param array $array the array to extract value from
	 * @param string $key key name of the array element
	 * @param mixed $default the default value to be returned if the specified key does not exist
	 * @return mixed|null the value of the element if found, default value otherwise
	 */
	public static function remove(&$array, $key, $default = null)
	{
		return self::$helper->remove($array, $key, $default );
	}
	/**
	 * Indexes an array according to a specified key.
	 * The input array should be multidimensional or an array of objects.
	 *
	 * The key can be a key name of the sub-array, a property name of object, or an anonymous
	 * function which returns the key value given an array element.
	 *
	 * If a key value is null, the corresponding array element will be discarded and not put in the result.
	 *
	 * For example,
	 *
	 * ~~~
	 * $array = array(
	 *     array('id' => '123', 'data' => 'abc'),
	 *     array('id' => '345', 'data' => 'def'),
	 * );
	 * $result = ArrayHelper::index($array, 'id');
	 * // the result is:
	 * // array(
	 * //     '123' => array('id' => '123', 'data' => 'abc'),
	 * //     '345' => array('id' => '345', 'data' => 'def'),
	 * // )
	 *
	 * // using anonymous function
	 * $result = ArrayHelper::index($array, function ($element) {
	 *     return $element['id'];
	 * });
	 * ~~~
	 *
	 * @param array $array the array that needs to be indexed
	 * @param string|\Closure $key the column name or anonymous function whose result will be used to index the array
	 * @return array the indexed array
	 */
	public static function index($array, $key)
	{
		return self::$helper->index($array, $key);
	}
	/**
	 * Returns the values of a specified column in an array.
	 * The input array should be multidimensional or an array of objects.
	 *
	 * For example,
	 *
	 * ~~~
	 * $array = array(
	 *     array('id' => '123', 'data' => 'abc'),
	 *     array('id' => '345', 'data' => 'def'),
	 * );
	 * $result = ArrayHelper::getColumn($array, 'id');
	 * // the result is: array( '123', '345')
	 *
	 * // using anonymous function
	 * $result = ArrayHelper::getColumn($array, function ($element) {
	 *     return $element['id'];
	 * });
	 * ~~~
	 *
	 * @param array $array
	 * @param string|\Closure $name
	 * @param boolean $keepKeys whether to maintain the array keys. If false, the resulting array
	 * will be re-indexed with integers.
	 * @return array the list of column values
	 */
	public static function getColumn($array, $name, $keepKeys = true)
	{
		return self::$helper->getColumn($array, $name, $keepKeys );
	}
	/**
	 * Builds a map (key-value pairs) from a multidimensional array or an array of objects.
	 * The `$from` and `$to` parameters specify the key names or property names to set up the map.
	 * Optionally, one can further group the map according to a grouping field `$group`.
	 *
	 * For example,
	 *
	 * ~~~
	 * $array = array(
	 *     array('id' => '123', 'name' => 'aaa', 'class' => 'x'),
	 *     array('id' => '124', 'name' => 'bbb', 'class' => 'x'),
	 *     array('id' => '345', 'name' => 'ccc', 'class' => 'y'),
	 * );
	 *
	 * $result = ArrayHelper::map($array, 'id', 'name');
	 * // the result is:
	 * // array(
	 * //     '123' => 'aaa',
	 * //     '124' => 'bbb',
	 * //     '345' => 'ccc',
	 * // )
	 *
	 * $result = ArrayHelper::map($array, 'id', 'name', 'class');
	 * // the result is:
	 * // array(
	 * //     'x' => array(
	 * //         '123' => 'aaa',
	 * //         '124' => 'bbb',
	 * //     ),
	 * //     'y' => array(
	 * //         '345' => 'ccc',
	 * //     ),
	 * // )
	 * ~~~
	 *
	 * @param array $array
	 * @param string|\Closure $from
	 * @param string|\Closure $to
	 * @param string|\Closure $group
	 * @return array
	 */
	public static function map($array, $from, $to, $group = null)
	{
		return self::$helper->map($array, $from, $to, $group );
	}
	/**
	 * Sorts an array of objects or arrays (with the same structure) by one or several keys.
	 * @param array $array the array to be sorted. The array will be modified after calling this method.
	 * @param string|\Closure|array $key the key(s) to be sorted by. This refers to a key name of the sub-array
	 * elements, a property name of the objects, or an anonymous function returning the values for comparison
	 * purpose. The anonymous function signature should be: `function($item)`.
	 * To sort by multiple keys, provide an array of keys here.
	 * @param boolean|array $descending whether to sort in descending or ascending order. When
	 * sorting by multiple keys with different descending orders, use an array of descending flags.
	 * @param integer|array $sortFlag the PHP sort flag. Valid values include
	 * `SORT_REGULAR`, `SORT_NUMERIC`, `SORT_STRING` and `SORT_LOCALE_STRING`.
	 * Please refer to [PHP manual](http://php.net/manual/en/function.sort.php)
	 * for more details. When sorting by multiple keys with different sort flags, use an array of sort flags.
	 * @param boolean|array $caseSensitive whether to sort string in case-sensitive manner. This parameter
	 * is used only when `$sortFlag` is `SORT_STRING`.
	 * When sorting by multiple keys with different case sensitivities, use an array of boolean values.
	 * @throws InvalidParamException if the $descending or $sortFlag parameters do not have
	 * correct number of elements as that of $key.
	 */
	public static function multisort(&$array, $key, $descending = false, $sortFlag = SORT_REGULAR, $caseSensitive = true)
	{
		return self::$helper->multisort($array, $key, $descending , $sortFlag , $caseSensitive );
	}
	/**
	 * Encodes special characters in an array of strings into HTML entities.
	 * Both the array keys and values will be encoded.
	 * If a value is an array, this method will also encode it recursively.
	 * @param array $data data to be encoded
	 * @param boolean $valuesOnly whether to encode array values only. If false,
	 * both the array keys and array values will be encoded.
	 * @param string $charset the charset that the data is using. If not set,
	 * [[\yii\base\Application::charset]] will be used.
	 * @return array the encoded data
	 * @see http://www.php.net/manual/en/function.htmlspecialchars.php
	 */
	public static function htmlEncode($data, $valuesOnly = true, $charset = null)
	{
		return self::$helper->htmlEncode($data, $valuesOnly , $charset );
	}
	/**
	 * Decodes HTML entities into the corresponding characters in an array of strings.
	 * Both the array keys and values will be decoded.
	 * If a value is an array, this method will also decode it recursively.
	 * @param array $data data to be decoded
	 * @param boolean $valuesOnly whether to decode array values only. If false,
	 * both the array keys and array values will be decoded.
	 * @return array the decoded data
	 * @see http://www.php.net/manual/en/function.htmlspecialchars-decode.php
	 */
	public static function htmlDecode($data, $valuesOnly = true)
	{
		return self::$helper->htmlDecode($data, $valuesOnly );
	}
}
ArrayHelper::init(new BaseArrayHelper());
