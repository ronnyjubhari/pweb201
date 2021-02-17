<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	*{
		font: 18px/20px normal cursive;
	}

	body {
		background-color: #fff;
		margin: 40px;
		color: black;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: black;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: bold;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	h2{
		font-weight: bold;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 14px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Hello, CodeIgniter!</h1>

	<div id="body">
		<p>Ini program pertama saya yang dibuat dengan menggunakan PHP Framework CodeIgniter</p>
		<h2>Links :</h2>

		<code>
			<a href="<?= base_url() ?>index.php/tentangsaya">Tentang Saya</a><br>
			<a href="<?= base_url() ?>index.php/tentangkharisma">Tentang STMIK KHARISMA</a><br>
			<a href="<?= base_url() ?>index.php/desainweb">Tentang Desain Web</a><br>
		</code>

		<code>
		<a href="<?= base_url() ?>index.php/resep">Daftar Resep Kuliner Tradisional Indonesia</a><br>
		</code>
		<!-- <code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p> -->
	</div>

	<p class="footer">Pemrograman Web 201 &copy; 2020</p>

	<!--
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php //echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>/</p>
	-->

</div>

</body>
</html>
