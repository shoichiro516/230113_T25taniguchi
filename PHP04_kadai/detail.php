<?php require '../PHP04_kadai/header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=playershop;charset=utf8', 
	'staff', 'password');
$sql=$pdo->prepare('select * from product where id=?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql as $row) {
	echo '<p><img alt="image" src="images/', $row['id'], '.jpg"></p>';
	echo '<form action="cart-insert.php" method="post">';
	echo '<p>選手番号：', $row['id'], '</p>';
	echo '<p>選手名：', $row['name'], '</p>';
	echo '<p>身長：', $row['price'], '</p>';
	echo '<p>人数：<select name="count">';
	for ($i=1; $i<=10; $i++) {
		echo '<option value="', $i, '">', $i, '</option>';
	}
	echo '</select></p>';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<input type="hidden" name="name" value="', $row['name'], '">';
	echo '<input type="hidden" name="price" value="', $row['price'], '">';
	echo '<p><input type="submit" value="リクルートリストに入れる"></p>';
	echo '</form>';
	echo '<p><a href="favorite-insert.php?id=', $row['id'], 
		'">エース候補に登録しておく</a></p>';
}
?>
<?php require '../PHP04_kadai/footer.php'; ?>
