<?php require '../php04_kadai/header.php'; ?>
<?php require 'menu.php'; ?>
<div class="th0">番号</div>
<div class="th1">選手名</div>
<div class="th1">身長</div><br>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=playershop;charset=utf8', 
	'staff', 'password');
if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'insert':
		if (empty($_REQUEST['name']) || 
			!preg_match('/^[0-9]+$/', $_REQUEST['price'])) break;
		$sql=$pdo->prepare('insert into product values(null,?,?)');
		$sql->execute(
			[htmlspecialchars($_REQUEST['name']), $_REQUEST['price']]);
		break;
	case 'update':
		if (empty($_REQUEST['name']) || 
			!preg_match('/^[0-9]+$/', $_REQUEST['price'])) break;
		$sql=$pdo->prepare(
			'update product set name=?, price=? where id=?');
		$sql->execute(
			[htmlspecialchars($_REQUEST['name']), $_REQUEST['price'], 
			$_REQUEST['id']]);
		break;
	case 'delete':
		$sql=$pdo->prepare('delete from product where id=?');
		$sql->execute([$_REQUEST['id']]);
		break;
	}
}
foreach ($pdo->query('select * from player') as $row) {
	echo '<form class="ib" action="player.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<div class="td0">';
	echo $row['id'];
	echo '</div> ';
	echo '<div class="td1">';
	echo '<input type="text" name="name" value="', $row['name'], '">';
	echo '</div> ';
	echo '<div class="td1">';
	echo '<input type="text" name="price" value="', $row['price'], '">';
	echo '</div> ';
	echo '<div class="td2">';
	echo '<input type="submit" value="更新">';
	echo '</div> ';
	echo '</form> ';
	echo '<form class="ib" action="player.php" method="post">';
	echo '<input type="hidden" name="command" value="delete">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<input type="submit" value="削除">';
	echo '</form><br>';
	echo "\n";
}
?>
<form action="player.php" method="post">
<input type="hidden" name="command" value="insert">
<div class="td0"></div> 
<div class="td1"><input type="text" name="name"></div>
<div class="td1"><input type="text" name="price"></div>
<div class="td2"><input type="submit" value="追加"></div>
</form><br>
<?php require '../PHP04_kadai/footer.php'; ?>