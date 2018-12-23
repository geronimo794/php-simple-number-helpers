<?php
if(!function_exists('remove_thousand_separator')){
    function remove_thousand_separator($number){
		return (int)str_replace('.', '', $number);
    }
}
if(!function_exists('reformat_front_display_date_with_day_full_time')){
	function reformat_front_display_date_with_day_full_time($value){
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
			return $date->format('H').':'.$date->format('m').' / '.$day.' - '.$date->format('j M y');
	}
}
if(!function_exists('reformat_front_display_date')){
	function reformat_front_display_date($value){
		$date = new DateTime($value);
		return $date->format('j F Y');
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