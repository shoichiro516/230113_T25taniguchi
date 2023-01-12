<?php session_start(); ?>
<?php require '../PHP04_kadai/header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (isset($_SESSION['customer'])) {
	$pdo=new PDO('mysql:host=localhost;dbname=playershop;charset=utf8', 
		'staff', 'password');
	$sql=$pdo->prepare(
		'delete from favorite where customer_id=? and product_id=?');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
	echo 'エース候補者から選手を削除しました。';
	echo '<hr>';
} else {
	echo 'エース候補者から選手を削除するには、ログインしてください。';
}
require 'favorite.php';
?>
<?php require '../PHP04_kadai/footer.php'; ?>
