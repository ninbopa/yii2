<?php
/**
* @copyright Copyright (c) 2008 Yii Software LLC
* @link http://www.yiiframework.com/
* @license http://www.yiiframework.com/license/
*/
namespace yii\helpers;
class Html
{
	private static $helper;
	public static function init($helper) {
		self::$helper = $helper;
	}
	/**
	 * Encodes special characters into HTML entities.
	 * The [[yii\base\Application::charset|application charset]] will be used for encoding.
	 * @param string $content the content to be encoded
	 * @param boolean $doubleEncode whether to encode HTML entities in `$content`. If false,
	 * HTML entities in `$content` will not be further encoded.
	 * @return string the encoded content
	 * @see decode
	 * @see http://www.php.net/manual/en/function.htmlspecialchars.php
	 */
	public static function encode($content, $doubleEncode = true)
	{
		return self::$helper->encode($content, $doubleEncode );
	}
	/**
	 * Decodes special HTML entities back to the corresponding characters.
	 * This is the opposite of [[encode()]].
	 * @param string $content the content to be decoded
	 * @return string the decoded content
	 * @see encode
	 * @see http://www.php.net/manual/en/function.htmlspecialchars-decode.php
	 */
	public static function decode($content)
	{
		return self::$helper->decode($content);
	}
	/**
	 * Generates a complete HTML tag.
	 * @param string $name the tag name
	 * @param string $content the content to be enclosed between the start and end tags. It will not be HTML-encoded.
	 * If this is coming from end users, you should consider [[encode()]] it to prevent XSS attacks.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated HTML tag
	 * @see beginTag
	 * @see endTag
	 */
	public static function tag($name, $content = '', $options = array())
	{
		return self::$helper->tag($name, $content , $options );
	}
	/**
	 * Generates a start tag.
	 * @param string $name the tag name
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated start tag
	 * @see endTag
	 * @see tag
	 */
	public static function beginTag($name, $options = array())
	{
		return self::$helper->beginTag($name, $options );
	}
	/**
	 * Generates an end tag.
	 * @param string $name the tag name
	 * @return string the generated end tag
	 * @see beginTag
	 * @see tag
	 */
	public static function endTag($name)
	{
		return self::$helper->endTag($name);
	}
	/**
	 * Generates a style tag.
	 * @param string $content the style content
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * If the options does not contain "type", a "type" attribute with value "text/css" will be used.
	 * @return string the generated style tag
	 */
	public static function style($content, $options = array())
	{
		return self::$helper->style($content, $options );
	}
	/**
	 * Generates a script tag.
	 * @param string $content the script content
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * If the options does not contain "type", a "type" attribute with value "text/javascript" will be rendered.
	 * @return string the generated script tag
	 */
	public static function script($content, $options = array())
	{
		return self::$helper->script($content, $options );
	}
	/**
	 * Generates a link tag that refers to an external CSS file.
	 * @param array|string $url the URL of the external CSS file. This parameter will be processed by [[url()]].
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated link tag
	 * @see url
	 */
	public static function cssFile($url, $options = array())
	{
		return self::$helper->cssFile($url, $options );
	}
	/**
	 * Generates a script tag that refers to an external JavaScript file.
	 * @param string $url the URL of the external JavaScript file. This parameter will be processed by [[url()]].
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated script tag
	 * @see url
	 */
	public static function jsFile($url, $options = array())
	{
		return self::$helper->jsFile($url, $options );
	}
	/**
	 * Generates a form start tag.
	 * @param array|string $action the form action URL. This parameter will be processed by [[url()]].
	 * @param string $method the form submission method, such as "post", "get", "put", "delete" (case-insensitive).
	 * Since most browsers only support "post" and "get", if other methods are given, they will
	 * be simulated using "post", and a hidden input will be added which contains the actual method type.
	 * See [[\yii\web\Request::restVar]] for more details.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated form start tag.
	 * @see endForm
	 */
	public static function beginForm($action = '', $method = 'post', $options = array())
	{
		return self::$helper->beginForm($action , $method , $options );
	}
	/**
	 * Generates a form end tag.
	 * @return string the generated tag
	 * @see beginForm
	 */
	public static function endForm()
	{
		return self::$helper->endForm();
	}
	/**
	 * Generates a hyperlink tag.
	 * @param string $text link body. It will NOT be HTML-encoded. Therefore you can pass in HTML code
	 * such as an image tag. If this is coming from end users, you should consider [[encode()]]
	 * it to prevent XSS attacks.
	 * @param array|string|null $url the URL for the hyperlink tag. This parameter will be processed by [[url()]]
	 * and will be used for the "href" attribute of the tag. If this parameter is null, the "href" attribute
	 * will not be generated.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated hyperlink
	 * @see url
	 */
	public static function a($text, $url = null, $options = array())
	{
		return self::$helper->a($text, $url , $options );
	}
	/**
	 * Generates a mailto hyperlink.
	 * @param string $text link body. It will NOT be HTML-encoded. Therefore you can pass in HTML code
	 * such as an image tag. If this is coming from end users, you should consider [[encode()]]
	 * it to prevent XSS attacks.
	 * @param string $email email address. If this is null, the first parameter (link body) will be treated
	 * as the email address and used.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated mailto link
	 */
	public static function mailto($text, $email = null, $options = array())
	{
		return self::$helper->mailto($text, $email , $options );
	}
	/**
	 * Generates an image tag.
	 * @param string $src the image URL. This parameter will be processed by [[url()]].
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated image tag
	 */
	public static function img($src, $options = array())
	{
		return self::$helper->img($src, $options );
	}
	/**
	 * Generates a label tag.
	 * @param string $content label text. It will NOT be HTML-encoded. Therefore you can pass in HTML code
	 * such as an image tag. If this is is coming from end users, you should [[encode()]]
	 * it to prevent XSS attacks.
	 * @param string $for the ID of the HTML element that this label is associated with.
	 * If this is null, the "for" attribute will not be generated.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated label tag
	 */
	public static function label($content, $for = null, $options = array())
	{
		return self::$helper->label($content, $for , $options );
	}
	/**
	 * Generates a button tag.
	 * @param string $content the content enclosed within the button tag. It will NOT be HTML-encoded.
	 * Therefore you can pass in HTML code such as an image tag. If this is is coming from end users,
	 * you should consider [[encode()]] it to prevent XSS attacks.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated button tag
	 */
	public static function button($content = 'Button', $options = array())
	{
		return self::$helper->button($content , $options );
	}
	/**
	 * Generates a submit button tag.
	 * @param string $content the content enclosed within the button tag. It will NOT be HTML-encoded.
	 * Therefore you can pass in HTML code such as an image tag. If this is is coming from end users,
	 * you should consider [[encode()]] it to prevent XSS attacks.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated submit button tag
	 */
	public static function submitButton($content = 'Submit', $options = array())
	{
		return self::$helper->submitButton($content , $options );
	}
	/**
	 * Generates a reset button tag.
	 * @param string $content the content enclosed within the button tag. It will NOT be HTML-encoded.
	 * Therefore you can pass in HTML code such as an image tag. If this is is coming from end users,
	 * you should consider [[encode()]] it to prevent XSS attacks.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated reset button tag
	 */
	public static function resetButton($content = 'Reset', $options = array())
	{
		return self::$helper->resetButton($content , $options );
	}
	/**
	 * Generates an input type of the given type.
	 * @param string $type the type attribute.
	 * @param string $name the name attribute. If it is null, the name attribute will not be generated.
	 * @param string $value the value attribute. If it is null, the value attribute will not be generated.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated input tag
	 */
	public static function input($type, $name = null, $value = null, $options = array())
	{
		return self::$helper->input($type, $name , $value , $options );
	}
	/**
	 * Generates an input button.
	 * @param string $label the value attribute. If it is null, the value attribute will not be generated.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated button tag
	 */
	public static function buttonInput($label = 'Button', $options = array())
	{
		return self::$helper->buttonInput($label , $options );
	}
	/**
	 * Generates a submit input button.
	 * @param string $label the value attribute. If it is null, the value attribute will not be generated.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated button tag
	 */
	public static function submitInput($label = 'Submit', $options = array())
	{
		return self::$helper->submitInput($label , $options );
	}
	/**
	 * Generates a reset input button.
	 * @param string $label the value attribute. If it is null, the value attribute will not be generated.
	 * @param array $options the attributes of the button tag. The values will be HTML-encoded using [[encode()]].
	 * Attributes whose value is null will be ignored and not put in the tag returned.
	 * @return string the generated button tag
	 */
	public static function resetInput($label = 'Reset', $options = array())
	{
		return self::$helper->resetInput($label , $options );
	}
	/**
	 * Generates a text input field.
	 * @param string $name the name attribute.
	 * @param string $value the value attribute. If it is null, the value attribute will not be generated.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated button tag
	 */
	public static function textInput($name, $value = null, $options = array())
	{
		return self::$helper->textInput($name, $value , $options );
	}
	/**
	 * Generates a hidden input field.
	 * @param string $name the name attribute.
	 * @param string $value the value attribute. If it is null, the value attribute will not be generated.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated button tag
	 */
	public static function hiddenInput($name, $value = null, $options = array())
	{
		return self::$helper->hiddenInput($name, $value , $options );
	}
	/**
	 * Generates a password input field.
	 * @param string $name the name attribute.
	 * @param string $value the value attribute. If it is null, the value attribute will not be generated.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated button tag
	 */
	public static function passwordInput($name, $value = null, $options = array())
	{
		return self::$helper->passwordInput($name, $value , $options );
	}
	/**
	 * Generates a file input field.
	 * To use a file input field, you should set the enclosing form's "enctype" attribute to
	 * be "multipart/form-data". After the form is submitted, the uploaded file information
	 * can be obtained via $_FILES[$name] (see PHP documentation).
	 * @param string $name the name attribute.
	 * @param string $value the value attribute. If it is null, the value attribute will not be generated.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated button tag
	 */
	public static function fileInput($name, $value = null, $options = array())
	{
		return self::$helper->fileInput($name, $value , $options );
	}
	/**
	 * Generates a text area input.
	 * @param string $name the input name
	 * @param string $value the input value. Note that it will be encoded using [[encode()]].
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * @return string the generated text area tag
	 */
	public static function textarea($name, $value = '', $options = array())
	{
		return self::$helper->textarea($name, $value , $options );
	}
	/**
	 * Generates a radio button input.
	 * @param string $name the name attribute.
	 * @param boolean $checked whether the radio button should be checked.
	 * @param array $options the tag options in terms of name-value pairs. The following options are specially handled:
	 *
	 * - uncheck: string, the value associated with the uncheck state of the radio button. When this attribute
	 *   is present, a hidden input will be generated so that if the radio button is not checked and is submitted,
	 *   the value of this attribute will still be submitted to the server via the hidden input.
	 * - label: string, a label displayed next to the radio button.  It will NOT be HTML-encoded. Therefore you can pass
	 *   in HTML code such as an image tag. If this is is coming from end users, you should [[encode()]] it to prevent XSS attacks.
	 *   When this option is specified, the radio button will be enclosed by a label tag.
	 * - labelOptions: array, the HTML attributes for the label tag. This is only used when the "label" option is specified.
	 *
	 * The rest of the options will be rendered as the attributes of the resulting tag. The values will
	 * be HTML-encoded using [[encode()]]. If a value is null, the corresponding attribute will not be rendered.
	 *
	 * @return string the generated radio button tag
	 */
	public static function radio($name, $checked = false, $options = array())
	{
		return self::$helper->radio($name, $checked , $options );
	}
	/**
	 * Generates a checkbox input.
	 * @param string $name the name attribute.
	 * @param boolean $checked whether the checkbox should be checked.
	 * @param array $options the tag options in terms of name-value pairs. The following options are specially handled:
	 *
	 * - uncheck: string, the value associated with the uncheck state of the checkbox. When this attribute
	 *   is present, a hidden input will be generated so that if the checkbox is not checked and is submitted,
	 *   the value of this attribute will still be submitted to the server via the hidden input.
	 * - label: string, a label displayed next to the checkbox.  It will NOT be HTML-encoded. Therefore you can pass
	 *   in HTML code such as an image tag. If this is is coming from end users, you should [[encode()]] it to prevent XSS attacks.
	 *   When this option is specified, the checkbox will be enclosed by a label tag.
	 * - labelOptions: array, the HTML attributes for the label tag. This is only used when the "label" option is specified.
	 *
	 * The rest of the options will be rendered as the attributes of the resulting tag. The values will
	 * be HTML-encoded using [[encode()]]. If a value is null, the corresponding attribute will not be rendered.
	 *
	 * @return string the generated checkbox tag
	 */
	public static function checkbox($name, $checked = false, $options = array())
	{
		return self::$helper->checkbox($name, $checked , $options );
	}
	/**
	 * Generates a drop-down list.
	 * @param string $name the input name
	 * @param string $selection the selected value
	 * @param array $items the option data items. The array keys are option values, and the array values
	 * are the corresponding option labels. The array can also be nested (i.e. some array values are arrays too).
	 * For each sub-array, an option group will be generated whose label is the key associated with the sub-array.
	 * If you have a list of data models, you may convert them into the format described above using
	 * [[\yii\helpers\ArrayHelper::map()]].
	 *
	 * Note, the values and labels will be automatically HTML-encoded by this method, and the blank spaces in
	 * the labels will also be HTML-encoded.
	 * @param array $options the tag options in terms of name-value pairs. The following options are specially handled:
	 *
	 * - prompt: string, a prompt text to be displayed as the first option;
	 * - options: array, the attributes for the select option tags. The array keys must be valid option values,
	 *   and the array values are the extra attributes for the corresponding option tags. For example,
	 *
	 * ~~~
	 * array(
	 *     'value1' => array('disabled' => true),
	 *     'value2' => array('label' => 'value 2'),
	 * );
	 * ~~~
	 *
	 * - groups: array, the attributes for the optgroup tags. The structure of this is similar to that of 'options',
	 *   except that the array keys represent the optgroup labels specified in $items.
	 *
	 * The rest of the options will be rendered as the attributes of the resulting tag. The values will
	 * be HTML-encoded using [[encode()]]. If a value is null, the corresponding attribute will not be rendered.
	 *
	 * @return string the generated drop-down list tag
	 */
	public static function dropDownList($name, $selection = null, $items = array(), $options = array())
	{
		return self::$helper->dropDownList($name, $selection , $items , $options );
	}
	/**
	 * Generates a list box.
	 * @param string $name the input name
	 * @param string|array $selection the selected value(s)
	 * @param array $items the option data items. The array keys are option values, and the array values
	 * are the corresponding option labels. The array can also be nested (i.e. some array values are arrays too).
	 * For each sub-array, an option group will be generated whose label is the key associated with the sub-array.
	 * If you have a list of data models, you may convert them into the format described above using
	 * [[\yii\helpers\ArrayHelper::map()]].
	 *
	 * Note, the values and labels will be automatically HTML-encoded by this method, and the blank spaces in
	 * the labels will also be HTML-encoded.
	 * @param array $options the tag options in terms of name-value pairs. The following options are specially handled:
	 *
	 * - prompt: string, a prompt text to be displayed as the first option;
	 * - options: array, the attributes for the select option tags. The array keys must be valid option values,
	 *   and the array values are the extra attributes for the corresponding option tags. For example,
	 *
	 * ~~~
	 * array(
	 *     'value1' => array('disabled' => true),
	 *     'value2' => array('label' => 'value 2'),
	 * );
	 * ~~~
	 *
	 * - groups: array, the attributes for the optgroup tags. The structure of this is similar to that of 'options',
	 *   except that the array keys represent the optgroup labels specified in $items.
	 * - unselect: string, the value that will be submitted when no option is selected.
	 *   When this attribute is set, a hidden field will be generated so that if no option is selected in multiple
	 *   mode, we can still obtain the posted unselect value.
	 *
	 * The rest of the options will be rendered as the attributes of the resulting tag. The values will
	 * be HTML-encoded using [[encode()]]. If a value is null, the corresponding attribute will not be rendered.
	 *
	 * @return string the generated list box tag
	 */
	public static function listBox($name, $selection = null, $items = array(), $options = array())
	{
		return self::$helper->listBox($name, $selection , $items , $options );
	}
	/**
	 * Generates a list of checkboxes.
	 * A checkbox list allows multiple selection, like [[listBox()]].
	 * As a result, the corresponding submitted value is an array.
	 * @param string $name the name attribute of each checkbox.
	 * @param string|array $selection the selected value(s).
	 * @param array $items the data item used to generate the checkboxes.
	 * The array keys are the labels, while the array values are the corresponding checkbox values.
	 * @param array $options options (name => config) for the checkbox list container tag.
	 * The following options are specially handled:
	 *
	 * - tag: string, the tag name of the container element.
	 * - unselect: string, the value that should be submitted when none of the checkboxes is selected.
	 *   By setting this option, a hidden input will be generated.
	 * - encode: boolean, whether to HTML-encode the checkbox labels. Defaults to true.
	 *   This option is ignored if `item` option is set.
	 * - separator: string, the HTML code that separates items.
	 * - item: callable, a callback that can be used to customize the generation of the HTML code
	 *   corresponding to a single item in $items. The signature of this callback must be:
	 *
	 * ~~~
	 * function ($index, $label, $name, $checked, $value)
	 * ~~~
	 *
	 * where $index is the zero-based index of the checkbox in the whole list; $label
	 * is the label for the checkbox; and $name, $value and $checked represent the name,
	 * value and the checked status of the checkbox input, respectively.
	 * @return string the generated checkbox list
	 */
	public static function checkboxList($name, $selection = null, $items = array(), $options = array())
	{
		return self::$helper->checkboxList($name, $selection , $items , $options );
	}
	/**
	 * Generates a list of radio buttons.
	 * A radio button list is like a checkbox list, except that it only allows single selection.
	 * @param string $name the name attribute of each radio button.
	 * @param string|array $selection the selected value(s).
	 * @param array $items the data item used to generate the radio buttons.
	 * The array keys are the labels, while the array values are the corresponding radio button values.
	 * @param array $options options (name => config) for the radio button list. The following options are supported:
	 *
	 * - unselect: string, the value that should be submitted when none of the radio buttons is selected.
	 *   By setting this option, a hidden input will be generated.
	 * - encode: boolean, whether to HTML-encode the checkbox labels. Defaults to true.
	 *   This option is ignored if `item` option is set.
	 * - separator: string, the HTML code that separates items.
	 * - item: callable, a callback that can be used to customize the generation of the HTML code
	 *   corresponding to a single item in $items. The signature of this callback must be:
	 *
	 * ~~~
	 * function ($index, $label, $name, $checked, $value)
	 * ~~~
	 *
	 * where $index is the zero-based index of the radio button in the whole list; $label
	 * is the label for the radio button; and $name, $value and $checked represent the name,
	 * value and the checked status of the radio button input, respectively.
	 * @return string the generated radio button list
	 */
	public static function radioList($name, $selection = null, $items = array(), $options = array())
	{
		return self::$helper->radioList($name, $selection , $items , $options );
	}
	/**
	 * Generates an unordered list.
	 * @param array|\Traversable $items the items for generating the list. Each item generates a single list item.
	 * Note that items will be automatically HTML encoded if `$options['encode']` is not set or true.
	 * @param array $options options (name => config) for the radio button list. The following options are supported:
	 *
	 * - encode: boolean, whether to HTML-encode the items. Defaults to true.
	 *   This option is ignored if the `item` option is specified.
	 * - itemOptions: array, the HTML attributes for the `li` tags. This option is ignored if the `item` option is specified.
	 * - item: callable, a callback that is used to generate each individual list item.
	 *   The signature of this callback must be:
	 *
	 * ~~~
	 * function ($item, $index)
	 * ~~~
	 *
	 * where $index is the array key corresponding to `$item` in `$items`. The callback should return
	 * the whole list item tag.
	 *
	 * @return string the generated unordered list. An empty string is returned if `$items` is empty.
	 */
	public static function ul($items, $options = array())
	{
		return self::$helper->ul($items, $options );
	}
	/**
	 * Generates an ordered list.
	 * @param array|\Traversable $items the items for generating the list. Each item generates a single list item.
	 * Note that items will be automatically HTML encoded if `$options['encode']` is not set or true.
	 * @param array $options options (name => config) for the radio button list. The following options are supported:
	 *
	 * - encode: boolean, whether to HTML-encode the items. Defaults to true.
	 *   This option is ignored if the `item` option is specified.
	 * - itemOptions: array, the HTML attributes for the `li` tags. This option is ignored if the `item` option is specified.
	 * - item: callable, a callback that is used to generate each individual list item.
	 *   The signature of this callback must be:
	 *
	 * ~~~
	 * function ($item, $index)
	 * ~~~
	 *
	 * where $index is the array key corresponding to `$item` in `$items`. The callback should return
	 * the whole list item tag.
	 *
	 * @return string the generated ordered list. An empty string is returned if `$items` is empty.
	 */
	public static function ol($items, $options = array())
	{
		return self::$helper->ol($items, $options );
	}
	/**
	 * Generates a label tag for the given model attribute.
	 * The label text is the label associated with the attribute, obtained via [[Model::getAttributeLabel()]].
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * If a value is null, the corresponding attribute will not be rendered.
	 * The following options are specially handled:
	 *
	 * - label: this specifies the label to be displayed. Note that this will NOT be [[encoded()]].
	 *   If this is not set, [[Model::getAttributeLabel()]] will be called to get the label for display
	 *   (after encoding).
	 *
	 * @return string the generated label tag
	 */
	public static function activeLabel($model, $attribute, $options = array())
	{
		return self::$helper->activeLabel($model, $attribute, $options );
	}
	/**
	 * Generates a tag that contains the first validation error of the specified model attribute.
	 * Note that even if there is no validation error, this method will still return an empty error tag.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $options the tag options in terms of name-value pairs. The values will be HTML-encoded
	 * using [[encode()]]. If a value is null, the corresponding attribute will not be rendered.
	 *
	 * The following options are specially handled:
	 *
	 * - tag: this specifies the tag name. If not set, "div" will be used.
	 *
	 * @return string the generated label tag
	 */
	public static function error($model, $attribute, $options = array())
	{
		return self::$helper->error($model, $attribute, $options );
	}
	/**
	 * Generates an input tag for the given model attribute.
	 * This method will generate the "name" and "value" tag attributes automatically for the model attribute
	 * unless they are explicitly specified in `$options`.
	 * @param string $type the input type (e.g. 'text', 'password')
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * @return string the generated input tag
	 */
	public static function activeInput($type, $model, $attribute, $options = array())
	{
		return self::$helper->activeInput($type, $model, $attribute, $options );
	}
	/**
	 * Generates a text input tag for the given model attribute.
	 * This method will generate the "name" and "value" tag attributes automatically for the model attribute
	 * unless they are explicitly specified in `$options`.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * @return string the generated input tag
	 */
	public static function activeTextInput($model, $attribute, $options = array())
	{
		return self::$helper->activeTextInput($model, $attribute, $options );
	}
	/**
	 * Generates a hidden input tag for the given model attribute.
	 * This method will generate the "name" and "value" tag attributes automatically for the model attribute
	 * unless they are explicitly specified in `$options`.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * @return string the generated input tag
	 */
	public static function activeHiddenInput($model, $attribute, $options = array())
	{
		return self::$helper->activeHiddenInput($model, $attribute, $options );
	}
	/**
	 * Generates a password input tag for the given model attribute.
	 * This method will generate the "name" and "value" tag attributes automatically for the model attribute
	 * unless they are explicitly specified in `$options`.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * @return string the generated input tag
	 */
	public static function activePasswordInput($model, $attribute, $options = array())
	{
		return self::$helper->activePasswordInput($model, $attribute, $options );
	}
	/**
	 * Generates a file input tag for the given model attribute.
	 * This method will generate the "name" and "value" tag attributes automatically for the model attribute
	 * unless they are explicitly specified in `$options`.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * @return string the generated input tag
	 */
	public static function activeFileInput($model, $attribute, $options = array())
	{
		return self::$helper->activeFileInput($model, $attribute, $options );
	}
	/**
	 * Generates a textarea tag for the given model attribute.
	 * The model attribute value will be used as the content in the textarea.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $options the tag options in terms of name-value pairs. These will be rendered as
	 * the attributes of the resulting tag. The values will be HTML-encoded using [[encode()]].
	 * @return string the generated textarea tag
	 */
	public static function activeTextarea($model, $attribute, $options = array())
	{
		return self::$helper->activeTextarea($model, $attribute, $options );
	}
	/**
	 * Generates a radio button tag for the given model attribute.
	 * This method will generate the "checked" tag attribute according to the model attribute value.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $options the tag options in terms of name-value pairs. The following options are specially handled:
	 *
	 * - uncheck: string, the value associated with the uncheck state of the radio button. If not set,
	 *   it will take the default value '0'. This method will render a hidden input so that if the radio button
	 *   is not checked and is submitted, the value of this attribute will still be submitted to the server
	 *   via the hidden input.
	 * - label: string, a label displayed next to the radio button.  It will NOT be HTML-encoded. Therefore you can pass
	 *   in HTML code such as an image tag. If this is is coming from end users, you should [[encode()]] it to prevent XSS attacks.
	 *   When this option is specified, the radio button will be enclosed by a label tag.
	 * - labelOptions: array, the HTML attributes for the label tag. This is only used when the "label" option is specified.
	 *
	 * The rest of the options will be rendered as the attributes of the resulting tag. The values will
	 * be HTML-encoded using [[encode()]]. If a value is null, the corresponding attribute will not be rendered.
	 *
	 * @return string the generated radio button tag
	 */
	public static function activeRadio($model, $attribute, $options = array())
	{
		return self::$helper->activeRadio($model, $attribute, $options );
	}
	/**
	 * Generates a checkbox tag for the given model attribute.
	 * This method will generate the "checked" tag attribute according to the model attribute value.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $options the tag options in terms of name-value pairs. The following options are specially handled:
	 *
	 * - uncheck: string, the value associated with the uncheck state of the radio button. If not set,
	 *   it will take the default value '0'. This method will render a hidden input so that if the radio button
	 *   is not checked and is submitted, the value of this attribute will still be submitted to the server
	 *   via the hidden input.
	 * - label: string, a label displayed next to the checkbox.  It will NOT be HTML-encoded. Therefore you can pass
	 *   in HTML code such as an image tag. If this is is coming from end users, you should [[encode()]] it to prevent XSS attacks.
	 *   When this option is specified, the checkbox will be enclosed by a label tag.
	 * - labelOptions: array, the HTML attributes for the label tag. This is only used when the "label" option is specified.
	 *
	 * The rest of the options will be rendered as the attributes of the resulting tag. The values will
	 * be HTML-encoded using [[encode()]]. If a value is null, the corresponding attribute will not be rendered.
	 *
	 * @return string the generated checkbox tag
	 */
	public static function activeCheckbox($model, $attribute, $options = array())
	{
		return self::$helper->activeCheckbox($model, $attribute, $options );
	}
	/**
	 * Generates a drop-down list for the given model attribute.
	 * The selection of the drop-down list is taken from the value of the model attribute.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $items the option data items. The array keys are option values, and the array values
	 * are the corresponding option labels. The array can also be nested (i.e. some array values are arrays too).
	 * For each sub-array, an option group will be generated whose label is the key associated with the sub-array.
	 * If you have a list of data models, you may convert them into the format described above using
	 * [[\yii\helpers\ArrayHelper::map()]].
	 *
	 * Note, the values and labels will be automatically HTML-encoded by this method, and the blank spaces in
	 * the labels will also be HTML-encoded.
	 * @param array $options the tag options in terms of name-value pairs. The following options are specially handled:
	 *
	 * - prompt: string, a prompt text to be displayed as the first option;
	 * - options: array, the attributes for the select option tags. The array keys must be valid option values,
	 *   and the array values are the extra attributes for the corresponding option tags. For example,
	 *
	 * ~~~
	 * array(
	 *     'value1' => array('disabled' => true),
	 *     'value2' => array('label' => 'value 2'),
	 * );
	 * ~~~
	 *
	 * - groups: array, the attributes for the optgroup tags. The structure of this is similar to that of 'options',
	 *   except that the array keys represent the optgroup labels specified in $items.
	 *
	 * The rest of the options will be rendered as the attributes of the resulting tag. The values will
	 * be HTML-encoded using [[encode()]]. If a value is null, the corresponding attribute will not be rendered.
	 *
	 * @return string the generated drop-down list tag
	 */
	public static function activeDropDownList($model, $attribute, $items, $options = array())
	{
		return self::$helper->activeDropDownList($model, $attribute, $items, $options );
	}
	/**
	 * Generates a list box.
	 * The selection of the list box is taken from the value of the model attribute.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $items the option data items. The array keys are option values, and the array values
	 * are the corresponding option labels. The array can also be nested (i.e. some array values are arrays too).
	 * For each sub-array, an option group will be generated whose label is the key associated with the sub-array.
	 * If you have a list of data models, you may convert them into the format described above using
	 * [[\yii\helpers\ArrayHelper::map()]].
	 *
	 * Note, the values and labels will be automatically HTML-encoded by this method, and the blank spaces in
	 * the labels will also be HTML-encoded.
	 * @param array $options the tag options in terms of name-value pairs. The following options are specially handled:
	 *
	 * - prompt: string, a prompt text to be displayed as the first option;
	 * - options: array, the attributes for the select option tags. The array keys must be valid option values,
	 *   and the array values are the extra attributes for the corresponding option tags. For example,
	 *
	 * ~~~
	 * array(
	 *     'value1' => array('disabled' => true),
	 *     'value2' => array('label' => 'value 2'),
	 * );
	 * ~~~
	 *
	 * - groups: array, the attributes for the optgroup tags. The structure of this is similar to that of 'options',
	 *   except that the array keys represent the optgroup labels specified in $items.
	 * - unselect: string, the value that will be submitted when no option is selected.
	 *   When this attribute is set, a hidden field will be generated so that if no option is selected in multiple
	 *   mode, we can still obtain the posted unselect value.
	 *
	 * The rest of the options will be rendered as the attributes of the resulting tag. The values will
	 * be HTML-encoded using [[encode()]]. If a value is null, the corresponding attribute will not be rendered.
	 *
	 * @return string the generated list box tag
	 */
	public static function activeListBox($model, $attribute, $items, $options = array())
	{
		return self::$helper->activeListBox($model, $attribute, $items, $options );
	}
	/**
	 * Generates a list of checkboxes.
	 * A checkbox list allows multiple selection, like [[listBox()]].
	 * As a result, the corresponding submitted value is an array.
	 * The selection of the checkbox list is taken from the value of the model attribute.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $items the data item used to generate the checkboxes.
	 * The array keys are the labels, while the array values are the corresponding checkbox values.
	 * Note that the labels will NOT be HTML-encoded, while the values will.
	 * @param array $options options (name => config) for the checkbox list. The following options are specially handled:
	 *
	 * - unselect: string, the value that should be submitted when none of the checkboxes is selected.
	 *   By setting this option, a hidden input will be generated.
	 * - separator: string, the HTML code that separates items.
	 * - item: callable, a callback that can be used to customize the generation of the HTML code
	 *   corresponding to a single item in $items. The signature of this callback must be:
	 *
	 * ~~~
	 * function ($index, $label, $name, $checked, $value)
	 * ~~~
	 *
	 * where $index is the zero-based index of the checkbox in the whole list; $label
	 * is the label for the checkbox; and $name, $value and $checked represent the name,
	 * value and the checked status of the checkbox input.
	 * @return string the generated checkbox list
	 */
	public static function activeCheckboxList($model, $attribute, $items, $options = array())
	{
		return self::$helper->activeCheckboxList($model, $attribute, $items, $options );
	}
	/**
	 * Generates a list of radio buttons.
	 * A radio button list is like a checkbox list, except that it only allows single selection.
	 * The selection of the radio buttons is taken from the value of the model attribute.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for the format
	 * about attribute expression.
	 * @param array $items the data item used to generate the radio buttons.
	 * The array keys are the labels, while the array values are the corresponding radio button values.
	 * Note that the labels will NOT be HTML-encoded, while the values will.
	 * @param array $options options (name => config) for the radio button list. The following options are specially handled:
	 *
	 * - unselect: string, the value that should be submitted when none of the radio buttons is selected.
	 *   By setting this option, a hidden input will be generated.
	 * - separator: string, the HTML code that separates items.
	 * - item: callable, a callback that can be used to customize the generation of the HTML code
	 *   corresponding to a single item in $items. The signature of this callback must be:
	 *
	 * ~~~
	 * function ($index, $label, $name, $checked, $value)
	 * ~~~
	 *
	 * where $index is the zero-based index of the radio button in the whole list; $label
	 * is the label for the radio button; and $name, $value and $checked represent the name,
	 * value and the checked status of the radio button input.
	 * @return string the generated radio button list
	 */
	public static function activeRadioList($model, $attribute, $items, $options = array())
	{
		return self::$helper->activeRadioList($model, $attribute, $items, $options );
	}
	/**
	 * Renders the option tags that can be used by [[dropDownList()]] and [[listBox()]].
	 * @param string|array $selection the selected value(s). This can be either a string for single selection
	 * or an array for multiple selections.
	 * @param array $items the option data items. The array keys are option values, and the array values
	 * are the corresponding option labels. The array can also be nested (i.e. some array values are arrays too).
	 * For each sub-array, an option group will be generated whose label is the key associated with the sub-array.
	 * If you have a list of data models, you may convert them into the format described above using
	 * [[\yii\helpers\ArrayHelper::map()]].
	 *
	 * Note, the values and labels will be automatically HTML-encoded by this method, and the blank spaces in
	 * the labels will also be HTML-encoded.
	 * @param array $tagOptions the $options parameter that is passed to the [[dropDownList()]] or [[listBox()]] call.
	 * This method will take out these elements, if any: "prompt", "options" and "groups". See more details
	 * in [[dropDownList()]] for the explanation of these elements.
	 *
	 * @return string the generated list options
	 */
	public static function renderSelectOptions($selection, $items, &$tagOptions = array())
	{
		return self::$helper->renderSelectOptions($selection, $items, $tagOptions );
	}
	/**
	 * Renders the HTML tag attributes.
	 * Attributes whose values are of boolean type will be treated as
	 * [boolean attributes](http://www.w3.org/TR/html5/infrastructure.html#boolean-attributes).
	 * And attributes whose values are null will not be rendered.
	 * @param array $attributes attributes to be rendered. The attribute values will be HTML-encoded using [[encode()]].
	 * @return string the rendering result. If the attributes are not empty, they will be rendered
	 * into a string with a leading white space (so that it can be directly appended to the tag name
	 * in a tag. If there is no attribute, an empty string will be returned.
	 */
	public static function renderTagAttributes($attributes)
	{
		return self::$helper->renderTagAttributes($attributes);
	}
	/**
	 * Normalizes the input parameter to be a valid URL.
	 *
	 * If the input parameter
	 *
	 * - is an empty string: the currently requested URL will be returned;
	 * - is a non-empty string: it will first be processed by [[Yii::getAlias()]]. If the result
	 *   is an absolute URL, it will be returned without any change further; Otherwise, the result
	 *   will be prefixed with [[\yii\web\Request::baseUrl]] and returned.
	 * - is an array: the first array element is considered a route, while the rest of the name-value
	 *   pairs are treated as the parameters to be used for URL creation using [[\yii\web\Controller::createUrl()]].
	 *   For example: `array('post/index', 'page' => 2)`, `array('index')`.
	 *   In case there is no controller, [[\yii\web\UrlManager::createUrl()]] will be used.
	 *
	 * @param array|string $url the parameter to be used to generate a valid URL
	 * @return string the normalized URL
	 * @throws InvalidParamException if the parameter is invalid.
	 */
	public static function url($url)
	{
		return self::$helper->url($url);
	}
	/**
	 * Adds a CSS class to the specified options.
	 * If the CSS class is already in the options, it will not be added again.
	 * @param array $options the options to be modified.
	 * @param string $class the CSS class to be added
	 */
	public static function addCssClass(&$options, $class)
	{
		return self::$helper->addCssClass($options, $class);
	}
	/**
	 * Removes a CSS class from the specified options.
	 * @param array $options the options to be modified.
	 * @param string $class the CSS class to be removed
	 */
	public static function removeCssClass(&$options, $class)
	{
		return self::$helper->removeCssClass($options, $class);
	}
	/**
	 * Returns the real attribute name from the given attribute expression.
	 *
	 * An attribute expression is an attribute name prefixed and/or suffixed with array indexes.
	 * It is mainly used in tabular data input and/or input of array type. Below are some examples:
	 *
	 * - `[0]content` is used in tabular data input to represent the "content" attribute
	 *   for the first model in tabular input;
	 * - `dates[0]` represents the first array element of the "dates" attribute;
	 * - `[0]dates[0]` represents the first array element of the "dates" attribute
	 *   for the first model in tabular input.
	 *
	 * If `$attribute` has neither prefix nor suffix, it will be returned back without change.
	 * @param string $attribute the attribute name or expression
	 * @return string the attribute name without prefix and suffix.
	 * @throws InvalidParamException if the attribute name contains non-word characters.
	 */
	public static function getAttributeName($attribute)
	{
		return self::$helper->getAttributeName($attribute);
	}
	/**
	 * Returns the value of the specified attribute name or expression.
	 *
	 * For an attribute expression like `[0]dates[0]`, this method will return the value of `$model->dates[0]`.
	 * See [[getAttributeName()]] for more details about attribute expression.
	 *
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression
	 * @return mixed the corresponding attribute value
	 * @throws InvalidParamException if the attribute name contains non-word characters.
	 */
	public static function getAttributeValue($model, $attribute)
	{
		return self::$helper->getAttributeValue($model, $attribute);
	}
	/**
	 * Generates an appropriate input name for the specified attribute name or expression.
	 *
	 * This method generates a name that can be used as the input name to collect user input
	 * for the specified attribute. The name is generated according to the [[Model::formName|form name]]
	 * of the model and the given attribute name. For example, if the form name of the `Post` model
	 * is `Post`, then the input name generated for the `content` attribute would be `Post[content]`.
	 *
	 * See [[getAttributeName()]] for explanation of attribute expression.
	 *
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression
	 * @return string the generated input name
	 * @throws InvalidParamException if the attribute name contains non-word characters.
	 */
	public static function getInputName($model, $attribute)
	{
		return self::$helper->getInputName($model, $attribute);
	}
	/**
	 * Generates an appropriate input ID for the specified attribute name or expression.
	 *
	 * This method converts the result [[getInputName()]] into a valid input ID.
	 * For example, if [[getInputName()]] returns `Post[content]`, this method will return `post-content`.
	 * @param Model $model the model object
	 * @param string $attribute the attribute name or expression. See [[getAttributeName()]] for explanation of attribute expression.
	 * @return string the generated input ID
	 * @throws InvalidParamException if the attribute name contains non-word characters.
	 */
	public static function getInputId($model, $attribute)
	{
		return self::$helper->getInputId($model, $attribute);
	}
}
Html::init(new BaseHtml());
