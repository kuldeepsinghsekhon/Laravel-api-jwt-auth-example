<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style>
	.error_section img {
		width: 100%;
	}

	.error_section {
		float: left;
		width: 100%;
		position: relative;
		}
	.error_section a {
		position: absolute;
		top: 50%;
		left: 46%;
		margin-top: 2rem;
		background: #fff;
		font-size: 25px;
		font-weight: 600;
		text-decoration: none;
		color: #58585a;
		padding: 5px 10px;
		border-radius: 5px;
		}
</style>
</head>
<body>
	<div id="container">
		<div class="error_section">
			<img src="<?=base_url('assets/images/show_404.jpg')?>" alt="page not found">
			<a href="<?=base_url()?>">Go to Home</a>
		</div>
	</div>
</body>
</html>