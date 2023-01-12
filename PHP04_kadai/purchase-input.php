<?php session_start(); ?>
<?php require '../PHP04_kadai/header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (!isset($_SESSION['customer'])) {
	echo 'スカウト手続きを行うにはログインしてください。';
} else 
if (empty($_SESSION['product'])) {
	echo 'スカウトリストに選手がいません。';
} else {
	echo '<p>お名前：', $_SESSION['customer']['name'], '</p>';
	echo '<p>ご住所：', $_SESSION['customer']['address'], '</p>';
	echo '<hr>';
	require 'cart.php';
	echo '<hr>';
	echo '<p>内容をご確認いただき、スカウトを確定してください。</p>';
	echo '<a href="purchase-output.php">スカウトを確定する</a>';
}
?>
<?php require '../footer.php'; ?>

