<?php
error_reporting(0);
if (empty($_GET['pesan'])&&$_GET['pesan']=='') {
	die('Masukin pesannya bosq');
}
$pesan=str_replace(" ", "%20", $_GET['pesan']);
$key = 'MASUKAN API YANG SUDAH DI DAPATKAN DISINI';
$url = 'http://sandbox.api.simsimi.com/request.p?key='.$key.'&lc=id&ft=1.0&text='.$pesan;
$json_data = file_get_contents($url);
$url=json_decode($json_data,1);
if($url) {
	echo $url['response'];
} else {
	echo 'Server tidak merespon';
}