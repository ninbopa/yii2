<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\build\controllers;

use yii\console\Controller;
use yii\helpers\Console;
use yii\helpers\FileHelper;

/**
 * HelperizeController is there to help to generate helper classes
 * @since 2.0
 */
class HelperizeController extends Controller
{
	public $defaultAction = 'helperize';

	/**
	 * Generates Helper classes from BaseHelper classes
	 *
	 * @param null $root the directory to parse files from.
	 */	
	public function actionHelperize($root=null)
	{		
		$files = $this->findHelpers($root);
		foreach ($files as $file) {
			echo sprintf("Proceesing [%s]\n",$file);
			$this->helperize($file);
		}
	}
	/**
	 * Generates Helper classes from BaseHelper classes
	 *
	 * @param null $root the directory to parse files from.
	 */
	public function actionRemoveStatic($root=null)
	{		
		$files = $this->findHelpers($root);
		foreach ($files as $file) {
	  echo sprintf("Proceesing [%s]\n",$file);
			$this->removeStatic($file);
		}
	}
	/**
	 * Convert static function/variables to instance functions/variables
	 *
	 * @param null $path the file name of class
	 */
	private function removeStatic($path)
	{
		$ss = new Sourcer();
		$ss->source = file_get_contents($path, true);		
		$ss->source = str_replace('static ', '', $ss->source);
		$ss->source = str_replace('self::$', '$this->', $ss->source);
		$ss->source = str_replace('self::' , '$this->', $ss->source);
		$ss->source = str_replace('static::$', '$this->', $ss->source);
		$ss->save($path);
	}
	/**
	 * Create Helper class
	 * @param null $path the file name of class
	 */	
	private function helperize($path)
	{
		$text = file_get_contents($path, true);
		$pattern = '#(/\*\* (?:[^/]|/[^*])*? \*/) \s+ public (?:\s+static)? \s+ function \s+ (\w(?:\w|\d|_)*) \s* \( (.*?) \) \s*? \n#Ssx';
		preg_match_all($pattern, $text, $matches,PREG_SET_ORDER);
		

		$cname = $this->findClassName($path);

		$ss = new Sourcer();
		$ss->addLine(  '<?php');
		$ss->addLine(  '/**');
		$ss->addLine(  '* @copyright Copyright (c) 2008 Yii Software LLC');
		$ss->addLine(  '* @link http://www.yiiframework.com/');
		$ss->addLine(  '* @license http://www.yiiframework.com/license/');		
		$ss->addLine(  '*/');		
		$ss->addLine(  'namespace yii\helpers;');


		$ss->addLine(  'class %s', array($cname));
		$ss->addLine(  '{');
		$ss->addLine(  '	private static $helper;');		
		$ss->addLine(  '	public static function init($helper) {');
		$ss->addLine(  '		self::$helper = $helper;');
		$ss->addLine(  '	}');
		foreach ($matches as $mm) {
			$ss->addLine('	%s',array(trim($mm[1])));
			$ss->addLine('	public static function %s(%s)',array($mm[2],$mm[3]));
			$ss->addLine('	{');
			$ss->addLine('		return self::$helper->%s(%s);', array($mm[2],$this->removeValues($mm[3])));
			$ss->addLine('	}');
		}
		$ss->addLine(  '}');
		$ss->addLine(  '%s::init(new Base%s());',array($cname,$cname));
		$ss->save( $this->findSource( dirname($path), $cname) );
	}

	/**
	 * Find the BaseHelper class name
	 *
	 * @param string $path BaseHelper source file path
	 */
	private function findClassName($path)
	{
		$name = basename($path);
		$name = substr($name,4);
		$name = substr($name,0,strlen($name)-4);
		return $name;
	}

	/**
	 * Find source filem name
	 * @param string path The directory
	 * @param string name The class name
	 */
	private function findSource($path,$name)
	{
		return sprintf('%s/%s.php',$path,$name);
	}
	
	/**
	 * Remove values from parametrs
	 * @param  string $ss The parameters string
	 * @return string $ss The parameters string without values
	 */
	private function removeValues($ss)
	{
		$args = explode(',',$ss);
		for( $ii = 0; $ii < count($args) ; $ii++ ) {
			$pp = strpos($args[$ii],'=');
			if ( $pp != 0 ) {
				$args[$ii] = substr($args[$ii],0, $pp);
			}
			$args[$ii] = str_replace("&","",$args[$ii]);
		}
		return implode(',',$args);
	}
	
	/**
	 * Find BaseHelper sources in root.
	 * @param null $root the directory to parse files from. Defualt to YII_PATH\helpers
	 * @param array BaseHelper sources in root
	 */
	private function findHelpers($root = null)
	{
		if ($root === null) {
			$root = YII_PATH . '\helpers';
		}
		$root = FileHelper::normalizePath($root);
		$options = array(
			'filter' => function ($path) {
				if (is_file($path)) {
					$file = basename($path);
					$ii = strpos($file,'Base');
					if ($ii === 0 ) {
						return true;
					}
				}
				return false;
			},
			'only' => array('.php'),
		);
		$files = FileHelper::findFiles($root, $options);
		return $files;
	}
}

/**
 * Sourcer holds source code
 * @property string $source The source text
 */
class Sourcer extends \yii\base\Object 
{
	private $_source = '';
	
	/**
	 * Create a new Sourcer
	 */
	public function __construct() {
	}

	/**
	 * Clear the source
	 */
	public function clear()
	{
		$this->_source = '';
	}
	/**
	 * Add line to the source
	 * @param $fmt The format string
	 * @param array $params The parameters
	 */
	public function addLine($fmt,$params=array())
	{
		$this->_source .= vsprintf($fmt,$params);
		$this->_source .= "\n";
	}

	public function getSource()
	{
		return $this->_source;
	}
	
	public function setSource($value)
	{
		$this->_source = $value;
	}
	/**
	 * Save the source in filename
	 * @param string $filename The filename
	 */
	public function save($filename) 	
	{
		$ff = fopen($filename , "w");
		fwrite($ff , $this->_source);
		fclose($ff);	
	}
}

