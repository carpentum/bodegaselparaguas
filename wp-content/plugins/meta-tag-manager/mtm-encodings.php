<?php 
if( !defined('ABSPATH') ) exit;

$encodings = apply_filters('mtm_charset_encodings', array(
		'Recommended' => array( 'UTF-8' ),
		'Legacy single-byte encodings' => array(
				'IBM866', 'ISO-8859-2', 'ISO-8859-3', 'ISO-8859-4', 'ISO-8859-5', 'ISO-8859-6', 'ISO-8859-7', 'ISO-8859-8', 'ISO-8859-8-I', 'ISO-8859-10', 'ISO-8859-13',
				'ISO-8859-14', 'ISO-8859-15', 'ISO-8859-16', 'KOI8-R', 'KOI8-U', 'macintosh', 'windows-874', 'windows-1250', 'windows-1251', 'windows-1252', 'windows-1253',
				'windows-1254', 'windows-1255', 'windows-1256', 'windows-1257', 'windows-1258', 'x-mac-cyrillic'
		),
		'Legacy multi-byte Chinese (simplified) encodings' => array( 'GBK', 'gb18030' ),
		'Legacy multi-byte Chinese (traditional) encodings' => array( 'Big5' ),
		'Legacy multi-byte Japanese encodings' => array( 'EUC-JP', 'ISO-2022-JP', 'Shift_JIS', ),
		'Legacy multi-byte Korean encodings' => array( 'EUC-KR' ),
		'Legacy miscellaneous encodings' => array( 'replacement', 'UTF-16BE', 'UTF-16LE', 'x-user-defined' )
));