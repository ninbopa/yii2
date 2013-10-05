<?php
/**
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @link http://www.yiiframework.com/
 * @license http://www.yiiframework.com/license/
 */

namespace yii\helpers;

use Michelf\MarkdownExtra;

/**
 * BaseMarkdown provides concrete implementation for [[Markdown]].
 *
 * Do not use BaseMarkdown. Use [[Markdown]] instead.
 *
 * @author Alexander Makarov <sam@rmcreative.ru>
 * @since 2.0
 */
class BaseMarkdown
{
	/**
	 * @var MarkdownExtra
	 */
	protected $markdown;

	/**
	 * Converts markdown into HTML
	 *
	 * @param string $content
	 * @param array $config
	 * @return string
	 */
	public function process($content, $config = array())
	{
		if ($this->markdown === null) {
			$this->markdown = new MarkdownExtra();
		}
		foreach ($config as $name => $value) {
			$this->markdown->{$name} = $value;
		}
		return $this->markdown->transform($content);
	}
}
