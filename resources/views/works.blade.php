@extends('layouts.app')

@section('content')
<?php

// 現在の年月を取得
$year = date('Y');
$month = date('n');

// 月末日を取得
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));

$calendar = array();
$j = 0;

// 月末日までループ
for ($i = 1; $i < $last_day + 1; $i++) {

// 曜日を取得
$week = date('w', mktime(0, 0, 0, $month, $i, $year));

// 1日の場合
if ($i == 1) {

// 1日目の曜日までをループ
for ($s = 1; $s <= $week; $s++) {

// 前半に空文字をセット
$calendar[$j]['day'] = '';
$j++;

}

}

// 配列に日付をセット
$calendar[$j]['day'] = $i;
$j++;

// 月末日の場合
if ($i == $last_day) {

// 月末日から残りをループ
for ($e = 1; $e <= 6 - $week; $e++) {

// 後半に空文字をセット
$calendar[$j]['day'] = '';
$j++;

}

}

}

?>

<?php
$ymd = strtotime(date('Y/m') . '/01');
$start = intval(date('w', $ymd));
$last_day = intval(date('j', strtotime('last day of '. date('F Y', $ymd))));

printf('%s年%s月のシフト申請', date('Y', $ymd), date('n', $ymd));
?>
<br>
<br>
<table>
<tr>
<th>日</th>
<th>月</th>
<th>火</th>
<th>水</th>
<th>木</th>
<th>金</th>
<th>土</th>
</tr>
<?php
$dd = 1;
$calendar = [];
for ($i=0; $i < 6; $i++) {
if ($dd > $last_day) { break; }
echo '<tr>' . PHP_EOL;
for ($j=0; $j < 7; $j++) {
if ((($i > 0)or($j >= $start))&&($dd <= $last_day)) {
printf('<td><form name="form1">
	<select name="color1">
	<option value="red">✖</option>
	<option value="yellow">○</option>
	<option value="blue">11:00-16:00</option>
	<option value="blue">16:00-21:00</option>
</select>%d</td>' . PHP_EOL, $dd, $dd);
$dd++;
} else {
print '<td>&nbsp;</td>' . PHP_EOL;
}
}
echo '</tr>' . PHP_EOL;
}
?>
</table>

</div>

<div class="button">
  <button type="submit">申請する</button>
</div>
</form>

<style>
th {
width: 60px;
height: 40px;
background-color:#ccc;
border : solid 1px #555;
}
td {
position: relative;
height: 40px;
border : solid 1px #555;
padding: 5px;
text-align: center;
}
input[type='checkbox']{
position: absolute;
right:0;
top:0;
}

</style>

@endsection