<?php session_start(); ?>
<?php require '../PHP04_kadai/header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$id=$_REQUEST['id'];
if (!isset($_SESSION['product'])) {
	$_SESSION['product']=[];
}
$count=0;
if (isset($_SESSION['product'][$id])) {
	$count=$_SESSION['product'][$id]['count'];
}
$_SESSION['product'][$id]=[
	'name'=>$_REQUEST['name'], 
	'price'=>$_REQUEST['price'], 
	'count'=>$count+$_REQUEST['count']
];
echo '<p>リクルートリストに追加しました</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require '../PHP04_kadai/footer.php'; ?>
