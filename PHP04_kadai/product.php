<?php require '../PHP04_kadai/header.php'; ?>
<?php require 'menu.php'; ?>
<form action="product.php" method="post">
選手検索
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>
<hr>
<?php
echo '<table>';
echo '<tr><th>選手番号</th><th>選手名</th><th>身長</th></tr>';
$pdo=new PDO('mysql:host=localhost;dbname=playershop;charset=utf8', 
	'staff', 'password');
if (isset($_REQUEST['keyword'])) {
	$sql=$pdo->prepare('select * from product where name like ?');
	$sql->execute(['%'.$_REQUEST['keyword'].'%']);
} else {
	$sql=$pdo->query('select * from product');
}
foreach ($sql as $row) {
	$id=$row['id'];
	echo '<tr>';
	echo '<td>', $id, '</td>';
	echo '<td>';
	echo '<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
	echo '</td>';
	echo '<td>', $row['price'], '</td>';
	echo '</tr>';
}
echo '</table>';
?>
<?php require '../PHP04_kadai/footer.php'; ?>
