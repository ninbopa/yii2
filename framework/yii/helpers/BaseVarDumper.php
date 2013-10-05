<?php
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2011 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\helpers;

/**
 * BaseVarDumper provides concrete implementation for [[VarDumper]].
 *
 * Do not use BaseVarDumper. Use [[VarDumper]] instead.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BaseVarDumper
{
	private $_objects;
	private $_output;
	private $_depth;

	/**
	 * Displays a variable.
	 * This method achieves the similar functionality as var_dump and print_r
	 * but is more robust when handling complex objects such as Yii controllers.
	 * @param mixed $var variable to be dumped
	 * @param integer $depth maximum depth that the dumper should go into the variable. Defaults to 10.
	 * @param boolean $highlight whether the result should be syntax-highlighted
	 */
	public function dump($var, $depth = 10, $highlight = false)
	{
		echo static::dumpAsString($var, $depth, $highlight);
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
	public function dumpAsString($var, $depth = 10, $highlight = false)
	{
		$this->_output = '';
		$this->_objects = array();
		$this->_depth = $depth;
		$this->dumpInternal($var, 0);
		if ($highlight) {
			$result = highlight_string("<?php\n" . $this->_output, true);
			$this->_output = preg_replace('/&lt;\\?php<br \\/>/', '', $result, 1);
		}
		return $this->_output;
	}

	/**
	 * @param mixed $var variable to be dumped
	 * @param integer $level depth level
	 */
	private function dumpInternal($var, $level)
	{
		switch (gettype($var)) {
			case 'boolean':
				$this->_output .= $var ? 'true' : 'false';
				break;
			case 'integer':
				$this->_output .= "$var";
				break;
			case 'double':
				$this->_output .= "$var";
				break;
			case 'string':
				$this->_output .= "'" . addslashes($var) . "'";
				break;
			case 'resource':
				$this->_output .= '{resource}';
				break;
			case 'NULL':
				$this->_output .= "null";
				break;
			case 'unknown type':
				$this->_output .= '{unknown}';
				break;
			case 'array':
				if ($this->_depth <= $level) {
					$this->_output .= 'array(...)';
				} elseif (empty($var)) {
					$this->_output .= 'array()';
				} else {
					$keys = array_keys($var);
					$spaces = str_repeat(' ', $level * 4);
					$this->_output .= "array\n" . $spaces . '(';
					foreach ($keys as $key) {
						$this->_output .= "\n" . $spaces . '    ';
						$this->dumpInternal($key, 0);
						$this->_output .= ' => ';
						$this->dumpInternal($var[$key], $level + 1);
					}
					$this->_output .= "\n" . $spaces . ')';
				}
				break;
			case 'object':
				if (($id = array_search($var, $this->_objects, true)) !== false) {
					$this->_output .= get_class($var) . '#' . ($id + 1) . '(...)';
				} elseif ($this->_depth <= $level) {
					$this->_output .= get_class($var) . '(...)';
				} else {
					$id = array_push($this->_objects, $var);
					$className = get_class($var);
					$members = (array)$var;
					$spaces = str_repeat(' ', $level * 4);
					$this->_output .= "$className#$id\n" . $spaces . '(';
					foreach ($members as $key => $value) {
						$keyDisplay = strtr(trim($key), array("\0" => ':'));
						$this->_output .= "\n" . $spaces . "    [$keyDisplay] => ";
						$this->dumpInternal($value, $level + 1);
					}
					$this->_output .= "\n" . $spaces . ')';
				}
				break;
		}
	}
}
