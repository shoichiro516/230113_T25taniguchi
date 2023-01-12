<?php session_start(); ?>
<?php require '../PHP04_kadai/header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (isset($_SESSION['customer'])) {
	$pdo=new PDO('mysql:host=localhost;dbname=playershop;charset=utf8', 
		'staff', 'password');
	$sql=$pdo->prepare('insert into favorite values(?,?)');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
	echo 'エース候補に選手を追加しました。';
	echo '<hr>';
	require 'favorite.php';
} else {
	echo 'エース候補に選手を追加するには、ログインしてください。';
}
?>
<?php require '../PHP04_kadai/footer.php'; ?>
