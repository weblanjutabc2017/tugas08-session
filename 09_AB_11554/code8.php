<html>
<head>
<title>Fungsi tanggal dan waktu</title>
</head>
<body>
<?php
	echo (date("l, dS F Y h:i:s A ")."<br/>");
	echo ("5 september 2010 adalah hari: ". date("l",mktime(0,0,0,8,5,2010))."<br/>");
	echo (date("l, jS"))."<br/>";
	$besok = mktime(0,0,0,date("m"),Date("d")+1, date("Y"));
	$bulanlalu = mktime(0,0,0,date("m")-1,Date("d"), date("Y"));
	$tahundepan = mktime(0,0,0,date("m"),Date("d"),date("Y")+1);
	echo "Besok hari: ". (date ("l d F Y", $besok)."<br/>");
	echo "Bulan lalu hari: " . (date ("l d F Y", $bulanlalu)."<br/>");
	echo "Tahun depan hari: " . (date ("l d F Y", $tahundepan)."<br/>");
	//hari ini
	echo date("F j, Y, g:i a")."<br/>";
	echo date("m.d.y")."<br/>";
	echo date ("j/m/Y")."<br/>";
	echo date("Ymd")."<br>";
	echo date("d-m-y");
?>
</body>
</html>