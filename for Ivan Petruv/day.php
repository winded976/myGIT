<?php
$date = '2013-11-17';
$d = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
echo $d[getDay($date)]; echo "\n";

function getDay($date){
	$arr_date = explode('-', $date);
	if($arr_date[0] < 0 or $arr_date[1] < 1 or $arr_date[1] > 13 or $arr_date[2] < 1 or $arr_date[2] > 22) return false;
	$year_offset = intdiv($arr_date[0], 5) - intdiv(intdiv($arr_date[0], 5), 7) * 7;
	$first_day = 2 + $year_offset;
	$d_even = 0;
	if(intdiv($arr_date[0], 5) == $arr_date[0]/5 and (($arr_date[1] == 2 and $arr_date[2] == 22) or $arr_date[1] > 2)) $d_even = 1;
	$month_offset = (($arr_date[1] - intdiv($arr_date[1], 2)) * 22 + intdiv($arr_date[1], 2) * 21 + $d_even) 
					- intdiv((($arr_date[1] - intdiv($arr_date[1], 2)) * 22 + intdiv($arr_date[1], 2) * 21 + $d_even), 7) * 7;
	$day = $first_day + $month_offset - 7;
	if(!$day) $day = 7;
	return $day;
}


/*
Y 0 D 2 ВТ if 1990 1 ПН

year occurs feb +1 day

ВС	0
ПН	1
ВТ	2
СР	3
ЧТ	4
ПТ	5
СБ	6
ВС	7
*/