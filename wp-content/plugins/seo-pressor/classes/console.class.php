<?php
if( !class_exists('WPConsole') )
{
	class WPConsole
	{
		
		static $file;
		
		static function console_write( $str='' )
		{
			if( gettype($str) == 'array' )
			{
				$str = json_encode($str);
			}
			self::$file = WPPostsRateKeys::$plugin_dir . 'console.log';
			$f = fopen( self::$file, 'a+' );
			fwrite( $f, PHP_EOL.$str );
			fclose($f);
		}
		
		static function print_debug( $str = '' )
		{
			if( gettype($str) == 'array' )
			{
				$str = json_encode($str);
			}
			self::$file = WPPostsRateKeys::$plugin_dir . 'debugger.log';
			$f = fopen( self::$file, 'a+' );
			fwrite( $f, PHP_EOL.$str );
			fclose($f);
		}
		
		static function debug_md5( $str = '' )
		{
			if( gettype($str) == 'array' )
			{
				$str = json_encode($str);
			}
			self::$file = WPPostsRateKeys::$plugin_dir . 'md5.log';
			$f = fopen( self::$file, 'a+' );
			fwrite( $f, PHP_EOL.PHP_EOL.PHP_EOL.$str );
			fclose($f);
		}
		
	}
}