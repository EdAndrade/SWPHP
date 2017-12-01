<?php 

	namespace SWPHP\System\Tools;
	
	/**
	*  Para tratamento de strings e outas entradas de dados
	*/

	class Strings
	{
		
		public static function urlStrReplace( string $string ): string
		{

			$string = trim($string);

			$find = [
	            '  ',
	            '"',
	            'á',
	            'ã',
	            'à',
	            'â',
	            'ª',
	            'é',
	            'è',
	            'ê',
	            'ë',
	            'í',
	            'ì',
	            'î',
	            'ï',
	            'ó',
	            'ò',
	            'õ',
	            'ô',
	            '°',
	            'º',
	            'ö',
	            'ú',
	            'ù',
	            'û',
	            'ü',
	            'ç',
	            'ñ',
	            'Á',
	            'Ã',
	            'À',
	            'Â',
	            'É',
	            'È',
	            'Ê',
	            'Ë',
	            'Í',
	            'Ì',
	            'Î',
	            'Ï',
	            'Ó',
	            'Ò',
	            'Õ',
	            'Ô',
	            'Ö',
	            'Ú',
	            'Ù',
	            'Û',
	            'Ü',
	            'Ç',
	            'Ñ',
	        ];

	        $replace = [
	            '',
	            '',
	            'a',
	            'a',
	            'a',
	            'a',
	            'a',
	            'e',
	            'e',
	            'e',
	            'e',
	            'i',
	            'i',
	            'i',
	            'i',
	            'o',
	            'o',
	            'o',
	            'o',
	            'o',
	            'o',
	            'o',
	            'u',
	            'u',
	            'u',
	            'u',
	            'c',
	            'n',
	            'A',
	            'A',
	            'A',
	            'A',
	            'E',
	            'E',
	            'E',
	            'E',
	            'I',
	            'I',
	            'I',
	            'I',
	            'O',
	            'O',
	            'O',
	            'O',
	            'O',
	            'U',
	            'U',
	            'U',
	            'U',
	            'C',
	            'N',
	        ];

	        return strtolower(str_replace(' ', '', str_replace($find, $replace, $string)));
		}
	}