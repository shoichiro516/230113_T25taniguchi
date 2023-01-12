<?php session_start(); ?>
<?php require '../PHP04_kadai/header.php'; ?>
<?php require 'menu.php'; ?>
<?php
unset($_SESSION['product'][$_REQUEST['id']]);
echo 'リクルートリストから選手を削除しました。';
echo '<hr>';
require 'cart.php';
?>
<?php require '../PHP04_kadai/footer.php'; ?>
