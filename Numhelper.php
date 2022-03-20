<?php
if(!function_exists('remove_thousand_separator')){
    function remove_thousand_separator($number){
		return (int)str_replace('.', '', $number);
    }
}
if(!function_exists('reformat_front_display_date_with_day_full_time')){
	function reformat_front_display_date_with_day_full_time($value = 0){
		if(empty($value)){
			return '';
		}else{
			$date = new DateTime($value);
			$day = '';
			switch($date->format('N')){
				case '1': $day = 'Senin';
				break;
				case '2': $day = 'Selasa';
				break;
				case '3': $day = 'Rabu';
				break;
				case '4': $day = 'Kamis';
				break;
				case '5': $day = 'Jum\'at';
				break;
				case '6': $day = 'Sabtu';
				break;
				case '7': $day = 'Minggu';
				break;
			}
			return $date->format('H').':'.$date->format('i').' / '.$day.' - '.$date->format('j M y');
		}
	}
}
if(!function_exists('reformat_front_display_date')){
	function reformat_front_display_date($value){
		$date = new DateTime($value);
		return $date->format('j F Y');
	}
}
if(!function_exists('reformat_display_time')){
	function reformat_display_time($value){
		$date = new DateTime($value);
		return $date->format('H').':'.$date->format('i');
	}
}
if(!function_exists('reformat_tanggal_dengan_hari')){
	function reformat_tanggal_dengan_hari($value){
		$date = new DateTime($value);
		$day = '';
		switch($date->format('N')){
			case '1': $day = 'Senin';
			break;
			case '2': $day = 'Selasa';
			break;
			case '3': $day = 'Rabu';
			break;
			case '4': $day = 'Kamis';
			break;
			case '5': $day = 'Jum\'at';
			break;
			case '6': $day = 'Sabtu';
			break;
			case '7': $day = 'Minggu';
			break;
		}
		return $day.' - '.$date->format('j F Y');
	}
}

if(!function_exists('format_rupiah')){
	function format_rupiah($value, $hide_zero = true){
		if(!empty($value))
			if ($value < 0) {
				return '- Rp '.number_format(($value * -1), '2', ',', '.');
			}else{
				return 'Rp '.number_format($value, '2', ',', '.');
			}
		else{
			if($hide_zero){
				return '';
			}else{
				return 'Rp 0,00';
			}	
		}
	}
}
if(!function_exists('format_ribuan')){
	function format_ribuan($value, $dec = 2){
		return number_format($value, $dec, ',', '.');
	}
}
/**
* Converts bytes into human readable file size.
*
* @param string $bytes
* @return string human readable file size (2,87 Мб)
* @author Mogilev Arseny
*/ 
function format_bytes($bytes, $precision = 1) { 
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;

} 
