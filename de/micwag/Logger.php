<?php
namespace de\micwag;

require_once 'LogLevel.php';

/**
 * Logging class
 * Uses singleton pattern
 *
 * @package de\rrby1
 */
class Logger
{
	/**
	 * Logger instance
	 * @var Logger
	 */
	protected static $instance;
	protected static $isInitialized = false;

	protected $logFilePath;
	protected $logLevel;

	/**
	 * @param string $logFilePath
	 * @param int    $logLevel
	 */
	protected function __construct($logFilePath, $logLevel)
	{
		$this->logFilePath = $logFilePath;
		$this->logLevel    = $logLevel;

		Logger::$isInitialized = true;
	}

	/**
	 * @param int    $logLevel
	 * @param string $message
	 *
	 * @throws \Exception
	 */
	protected function log($logLevel, $message)
	{
		if (!Logger::$isInitialized) {
			throw new \Exception("Logger is not initialized yet.");
		} else {
			if ($logLevel >= $this->logLevel) {
				$date      = date('Y-m-d H:i:s');
				$logString = "$date;$logLevel;$message\n";

				try {
					$file = fopen($this->logFilePath, 'a');
					fwrite($file, $logString);
					fclose($file);
				} catch (\Exception $e) {
					echo "Cannot write into log file.";
				}
			}
		}
	}

	/**
	 * Initializes the Logger class
	 *
	 * @param string $logFilePath
	 * @param int    $logLevel
	 */
	public static function initialize($logFilePath, $logLevel)
	{
		Logger::$instance = new Logger($logFilePath, $logLevel);
	}

	/**
	 * Logs the given message with INFO level
	 *
	 * @param string $message
	 */
	public static function info($message)
	{
		Logger::$instance->log(LogLevel::INFO, $message);
	}

	/**
	 * Logs the given message with NOTICE level
	 *
	 * @param string $message
	 */
	public static function notice($message)
	{
		Logger::$instance->log(LogLevel::NOTICE, $message);
	}

	/**
	 * Logs the given message with WARNING level
	 *
	 * @param string $message
	 */
	public static function warning($message)
	{
		Logger::$instance->log(LogLevel::WARNING, $message);
	}

	/**
	 * Logs the given message with ERROR level
	 *
	 * @param string $message
	 */
	public static function error($message)
	{
		Logger::$instance->log(LogLevel::ERROR, $message);
	}

	/**
	 * Logs the given message with FATAL_ERROR level
	 *
	 * @param string $message
	 */
	public static function fatalError($message)
	{
		Logger::$instance->log(LogLevel::FATAL_ERROR, $message);
	}
} 