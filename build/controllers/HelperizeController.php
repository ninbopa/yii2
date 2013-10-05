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
 *
 * @author Carsten Brandt <mail@cebe.cc>
 * @author Alexander Makarov <sam@rmcreative.ru>
 * @since 2.0
 */
class HelperizeController extends Controller
{
	public $defaultAction = 'helperize';

	public function actionHelperize($root=null)
	{		
		$files = $this->findHelpers($root);
		foreach ($files as $file) {
			echo sprintf("Proceesing [%s]\n",$file);
			$this->helperize($file);
		}
	}
	
	public function actionRemoveStatic($root=null)
	{		
		$files = $this->findHelpers($root);
		foreach ($files as $file) {
	  echo sprintf("Proceesing [%s]\n",$file);
			$this->removeStatic($file);
		}
	}

	private function removeStatic($fileName)
	{
		$text = file_get_contents($fileName, true);		
		$text = str_replace('static ', '', $text);
		$text = str_replace('self::$', '$this->', $text);
		$text = str_replace('self::' , '$this->', $text);
		$text = str_replace('static::$', '$this->', $text);
		$this->save($fileName , $text);
	}

	private function helperize($path)
	{
		$text = file_get_contents($path, true);
		$mm = $this->match('#(/\*\* (?:[^/]|/[^*])*? \*/) \s+ public (?:\s+static)? \s+ function \s+ (\w(?:\w|\d|_)*) \s* \( (.*?) \) \s*? \n#Ssx',$text);

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
		foreach ($mm as $m1) {
			$ss->addLine('	%s',array(trim($m1[1])));
			$ss->addLine('	public static function %s(%s)',array($m1[2],$m1[3]));
			$ss->addLine('	{');


			$ss->addLine('		return self::$helper->%s(%s);', array($m1[2],$this->removeValues($m1[3])));
			$ss->addLine('	}');
		}
		$ss->addLine(  '}');
		$ss->addLine(  '%s::init(new Base%s());',array($cname,$cname));
		$this->save( $this->findFilePhp( $this->findDirHelper($path), $cname),$ss->getSource() );
	}

	private function match($pattern, $text)
	{
		preg_match_all($pattern, $text, $matches,PREG_SET_ORDER);
		return $matches;
	}

	private function findClassName($path)
	{
		$name = basename($path);
		$name = substr($name,4);
		$name = substr($name,0,strlen($name)-4);
		return $name;
	}

	private function findDirHelper($path)
	{
		return dirname($path);
	}

	private function findFilePhp($path,$cname)
	{
		return sprintf('%s/%s.php',$path,$cname);
	}

	private function save($fileName,$text)
	{
		$ff = fopen($fileName , "w");
		fwrite($ff,$text);
		fclose($ff);
	}

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

class Sourcer {
	public function __construct() {
	}

	public function clear()
	{
		$this->_source = '';
	}

	public function addLine($fmt,$params=array())
	{
		$this->_source .= vsprintf($fmt,$params);
		$this->_source .= "\n";
	}

	public function getSource()
	{
		return $this->_source;
	}

	private $_source = '';
}

