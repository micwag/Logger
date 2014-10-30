#Logger#

A simple PHP Logger class.
It writes the logs with time and log-level into any text file.

##Usage##
Simply include both Logger.php. LogLevel.php is included in Logger.php. If you don't put both files in the same 
directory, you must edit the path to LogLevel.php.

###Initialization###

> \de\micwag\Logger::initialize(__DIR__ . '/log.txt', \de\micwag\LogLevel::NOTICE);

###Logging###
> \de\micwag\Logger::info('Your log text');
> \de\micwag\Logger::notice('Your log text');
> \de\micwag\Logger::warning('Your log text');
> \de\micwag\Logger::error('Your log text');
> \de\micwag\Logger::fatalError('Your log text');

##License##
Author: [Michael Wagner](http://www.micwag.de) 
This script is licensed under GNU LGPL V3. The License can be found in the file license.txt or here: http://www.gnu.org/licenses/lgpl-3.0.html