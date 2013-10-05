<?php
/**
* @copyright Copyright (c) 2008 Yii Software LLC
* @link http://www.yiiframework.com/
* @license http://www.yiiframework.com/license/
*/
namespace yii\helpers;
class Console
{
	private static $helper;
	public static function init($helper) {
		self::$helper = $helper;
	}
	/**
	 * Moves the terminal cursor up by sending ANSI control code CUU to the terminal.
	 * If the cursor is already at the edge of the screen, this has no effect.
	 * @param integer $rows number of rows the cursor should be moved up
	 */
	public static function moveCursorUp($rows = 1)
	{
		return self::$helper->moveCursorUp($rows );
	}
	/**
	 * Moves the terminal cursor down by sending ANSI control code CUD to the terminal.
	 * If the cursor is already at the edge of the screen, this has no effect.
	 * @param integer $rows number of rows the cursor should be moved down
	 */
	public static function moveCursorDown($rows = 1)
	{
		return self::$helper->moveCursorDown($rows );
	}
	/**
	 * Moves the terminal cursor forward by sending ANSI control code CUF to the terminal.
	 * If the cursor is already at the edge of the screen, this has no effect.
	 * @param integer $steps number of steps the cursor should be moved forward
	 */
	public static function moveCursorForward($steps = 1)
	{
		return self::$helper->moveCursorForward($steps );
	}
	/**
	 * Moves the terminal cursor backward by sending ANSI control code CUB to the terminal.
	 * If the cursor is already at the edge of the screen, this has no effect.
	 * @param integer $steps number of steps the cursor should be moved backward
	 */
	public static function moveCursorBackward($steps = 1)
	{
		return self::$helper->moveCursorBackward($steps );
	}
	/**
	 * Moves the terminal cursor to the beginning of the next line by sending ANSI control code CNL to the terminal.
	 * @param integer $lines number of lines the cursor should be moved down
	 */
	public static function moveCursorNextLine($lines = 1)
	{
		return self::$helper->moveCursorNextLine($lines );
	}
	/**
	 * Moves the terminal cursor to the beginning of the previous line by sending ANSI control code CPL to the terminal.
	 * @param integer $lines number of lines the cursor should be moved up
	 */
	public static function moveCursorPrevLine($lines = 1)
	{
		return self::$helper->moveCursorPrevLine($lines );
	}
	/**
	 * Moves the cursor to an absolute position given as column and row by sending ANSI control code CUP or CHA to the terminal.
	 * @param integer $column 1-based column number, 1 is the left edge of the screen.
	 * @param integer|null $row 1-based row number, 1 is the top edge of the screen. if not set, will move cursor only in current line.
	 */
	public static function moveCursorTo($column, $row = null)
	{
		return self::$helper->moveCursorTo($column, $row );
	}
	/**
	 * Scrolls whole page up by sending ANSI control code SU to the terminal.
	 * New lines are added at the bottom. This is not supported by ANSI.SYS used in windows.
	 * @param int $lines number of lines to scroll up
	 */
	public static function scrollUp($lines = 1)
	{
		return self::$helper->scrollUp($lines );
	}
	/**
	 * Scrolls whole page down by sending ANSI control code SD to the terminal.
	 * New lines are added at the top. This is not supported by ANSI.SYS used in windows.
	 * @param int $lines number of lines to scroll down
	 */
	public static function scrollDown($lines = 1)
	{
		return self::$helper->scrollDown($lines );
	}
	/**
	 * Saves the current cursor position by sending ANSI control code SCP to the terminal.
	 * Position can then be restored with {@link restoreCursorPosition}.
	 */
	public static function saveCursorPosition()
	{
		return self::$helper->saveCursorPosition();
	}
	/**
	 * Restores the cursor position saved with {@link saveCursorPosition} by sending ANSI control code RCP to the terminal.
	 */
	public static function restoreCursorPosition()
	{
		return self::$helper->restoreCursorPosition();
	}
	/**
	 * Hides the cursor by sending ANSI DECTCEM code ?25l to the terminal.
	 * Use {@link showCursor} to bring it back.
	 * Do not forget to show cursor when your application exits. Cursor might stay hidden in terminal after exit.
	 */
	public static function hideCursor()
	{
		return self::$helper->hideCursor();
	}
	/**
	 * Will show a cursor again when it has been hidden by {@link hideCursor}  by sending ANSI DECTCEM code ?25h to the terminal.
	 */
	public static function showCursor()
	{
		return self::$helper->showCursor();
	}
	/**
	 * Clears entire screen content by sending ANSI control code ED with argument 2 to the terminal.
	 * Cursor position will not be changed.
	 * **Note:** ANSI.SYS implementation used in windows will reset cursor position to upper left corner of the screen.
	 */
	public static function clearScreen()
	{
		return self::$helper->clearScreen();
	}
	/**
	 * Clears text from cursor to the beginning of the screen by sending ANSI control code ED with argument 1 to the terminal.
	 * Cursor position will not be changed.
	 */
	public static function clearScreenBeforeCursor()
	{
		return self::$helper->clearScreenBeforeCursor();
	}
	/**
	 * Clears text from cursor to the end of the screen by sending ANSI control code ED with argument 0 to the terminal.
	 * Cursor position will not be changed.
	 */
	public static function clearScreenAfterCursor()
	{
		return self::$helper->clearScreenAfterCursor();
	}
	/**
	 * Clears the line, the cursor is currently on by sending ANSI control code EL with argument 2 to the terminal.
	 * Cursor position will not be changed.
	 */
	public static function clearLine()
	{
		return self::$helper->clearLine();
	}
	/**
	 * Clears text from cursor position to the beginning of the line by sending ANSI control code EL with argument 1 to the terminal.
	 * Cursor position will not be changed.
	 */
	public static function clearLineBeforeCursor()
	{
		return self::$helper->clearLineBeforeCursor();
	}
	/**
	 * Clears text from cursor position to the end of the line by sending ANSI control code EL with argument 0 to the terminal.
	 * Cursor position will not be changed.
	 */
	public static function clearLineAfterCursor()
	{
		return self::$helper->clearLineAfterCursor();
	}
	/**
	 * Returns the ANSI format code.
	 *
	 * @param array $format An array containing formatting values.
	 * You can pass any of the FG_*, BG_* and TEXT_* constants
	 * and also [[xtermFgColor]] and [[xtermBgColor]] to specify a format.
	 * @return string The ANSI format code according to the given formatting constants.
	 */
	public static function ansiFormatCode($format)
	{
		return self::$helper->ansiFormatCode($format);
	}
	/**
	 * Echoes an ANSI format code that affects the formatting of any text that is printed afterwards.
	 *
	 * @param array $format An array containing formatting values.
	 * You can pass any of the FG_*, BG_* and TEXT_* constants
	 * and also [[xtermFgColor]] and [[xtermBgColor]] to specify a format.
	 * @see ansiFormatCode()
	 * @see ansiFormatEnd()
	 */
	public static function beginAnsiFormat($format)
	{
		return self::$helper->beginAnsiFormat($format);
	}
	/**
	 * Resets any ANSI format set by previous method [[ansiFormatBegin()]]
	 * Any output after this will have default text format.
	 * This is equal to calling
	 *
	 * ```php
	 * echo Console::ansiFormatCode(array(Console::RESET))
	 * ```
	 */
	public static function endAnsiFormat()
	{
		return self::$helper->endAnsiFormat();
	}
	/**
	 * Will return a string formatted with the given ANSI style
	 *
	 * @param string $string the string to be formatted
	 * @param array $format An array containing formatting values.
	 * You can pass any of the FG_*, BG_* and TEXT_* constants
	 * and also [[xtermFgColor]] and [[xtermBgColor]] to specify a format.
	 * @return string
	 */
	public static function ansiFormat($string, $format = array())
	{
		return self::$helper->ansiFormat($string, $format );
	}
	/**
	 * Returns the ansi format code for xterm foreground color.
	 * You can pass the return value of this to one of the formatting methods:
	 * [[ansiFormat]], [[ansiFormatCode]], [[beginAnsiFormat]]
	 *
	 * @param integer $colorCode xterm color code
	 * @return string
	 * @see http://en.wikipedia.org/wiki/Talk:ANSI_escape_code#xterm-256colors
	 */
	public static function xtermFgColor($colorCode)
	{
		return self::$helper->xtermFgColor($colorCode);
	}
	/**
	 * Returns the ansi format code for xterm background color.
	 * You can pass the return value of this to one of the formatting methods:
	 * [[ansiFormat]], [[ansiFormatCode]], [[beginAnsiFormat]]
	 *
	 * @param integer $colorCode xterm color code
	 * @return string
	 * @see http://en.wikipedia.org/wiki/Talk:ANSI_escape_code#xterm-256colors
	 */
	public static function xtermBgColor($colorCode)
	{
		return self::$helper->xtermBgColor($colorCode);
	}
	/**
	 * Strips ANSI control codes from a string
	 *
	 * @param string $string String to strip
	 * @return string
	 */
	public static function stripAnsiFormat($string)
	{
		return self::$helper->stripAnsiFormat($string);
	}
	/**
	 * Returns true if the stream supports colorization. ANSI colors are disabled if not supported by the stream.
	 *
	 * - windows without ansicon
	 * - not tty consoles
	 *
	 * @param mixed $stream
	 * @return bool true if the stream supports ANSI colors, otherwise false.
	 */
	public static function streamSupportsAnsiColors($stream)
	{
		return self::$helper->streamSupportsAnsiColors($stream);
	}
	/**
	 * Returns true if the console is running on windows
	 * @return bool
	 */
	public static function isRunningOnWindows()
	{
		return self::$helper->isRunningOnWindows();
	}
	/**
	 * Usage: list($width, $height) = ConsoleHelper::getScreenSize();
	 *
	 * @param bool $refresh whether to force checking and not re-use cached size value.
	 * This is useful to detect changing window size while the application is running but may
	 * not get up to date values on every terminal.
	 * @return array|boolean An array of ($width, $height) or false when it was not able to determine size.
	 */
	public static function getScreenSize($refresh = false)
	{
		return self::$helper->getScreenSize($refresh );
	}
	/**
	 * Gets input from STDIN and returns a string right-trimmed for EOLs.
	 *
	 * @param bool $raw If set to true, returns the raw string without trimming
	 * @return string
	 */
	public static function stdin($raw = false)
	{
		return self::$helper->stdin($raw );
	}
	/**
	 * Prints a string to STDOUT.
	 *
	 * @param string $string the string to print
	 * @return int|boolean Number of bytes printed or false on error
	 */
	public static function stdout($string)
	{
		return self::$helper->stdout($string);
	}
	/**
	 * Prints a string to STDERR.
	 *
	 * @param string $string the string to print
	 * @return int|boolean Number of bytes printed or false on error
	 */
	public static function stderr($string)
	{
		return self::$helper->stderr($string);
	}
	/**
	 * Asks the user for input. Ends when the user types a carriage return (PHP_EOL). Optionally, It also provides a
	 * prompt.
	 *
	 * @param string $prompt the prompt (optional)
	 * @return string the user's input
	 */
	public static function input($prompt = null)
	{
		return self::$helper->input($prompt );
	}
	/**
	 * Prints text to STDOUT appended with a carriage return (PHP_EOL).
	 *
	 * @param string $string the text to print
	 * @return integer|boolean number of bytes printed or false on error.
	 */
	public static function output($string = null)
	{
		return self::$helper->output($string );
	}
	/**
	 * Prints text to STDERR appended with a carriage return (PHP_EOL).
	 *
	 * @param string $string the text to print
	 * @return integer|boolean number of bytes printed or false on error.
	 */
	public static function error($string = null)
	{
		return self::$helper->error($string );
	}
	/**
	 * Prompts the user for input and validates it
	 *
	 * @param string $text prompt string
	 * @param array $options the options to validate the input:
	 *  - required: whether it is required or not
	 *  - default: default value if no input is inserted by the user
	 *  - pattern: regular expression pattern to validate user input
	 *  - validator: a callable function to validate input. The function must accept two parameters:
	 *      - $input: the user input to validate
	 *      - $error: the error value passed by reference if validation failed.
	 * @return string the user input
	 */
	public static function prompt($text, $options = array())
	{
		return self::$helper->prompt($text, $options );
	}
	/**
	 * Asks user to confirm by typing y or n.
	 *
	 * @param string $message to echo out before waiting for user input
	 * @param boolean $default this value is returned if no selection is made.
	 * @return boolean whether user confirmed
	 */
	public static function confirm($message, $default = true)
	{
		return self::$helper->confirm($message, $default );
	}
	/**
	 * Gives the user an option to choose from. Giving '?' as an input will show
	 * a list of options to choose from and their explanations.
	 *
	 * @param string $prompt the prompt message
	 * @param array  $options Key-value array of options to choose from
	 *
	 * @return string An option character the user chose
	 */
	public static function select($prompt, $options = array())
	{
		return self::$helper->select($prompt, $options );
	}
	/**
	 * Displays and updates a simple progress bar on screen.
	 *
	 * @param integer $done the number of items that are completed
	 * @param integer $total the total value of items that are to be done
	 * @param integer $size the size of the status bar (optional)
	 * @see http://snipplr.com/view/29548/
	 */
	public static function showProgress($done, $total, $size = 30)
	{
		return self::$helper->showProgress($done, $total, $size );
	}
}
Console::init(new BaseConsole());
