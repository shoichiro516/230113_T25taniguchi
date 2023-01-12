<?php
if (isset($_SESSION['customer'])) {
	echo '<table>';
	echo '<tr><th>選手番号</th><th>選手名</th>';
	echo '<th>身長</th><th></th></tr>';
	$pdo=new PDO('mysql:host=localhost;dbname=playershop;charset=utf8', 
		'staff', 'password');
	$sql=$pdo->prepare(
		'select * from favorite, product '.
		'where customer_id=? and product_id=id');
	$sql->execute([$_SESSION['customer']['id']]);
	foreach ($sql as $row) {
		$id=$row['id'];
		echo '<tr>';
		echo '<td>', $id, '</td>';
		echo '<td><a href="detail.php?id='.$id.'">', $row['name'], 
			'</a></td>';
		echo '<td>', $row['price'], '</td>';
		echo '<td><a href="favorite-delete.php?id=', $id, 
			'">削除</a></td>';
		echo '</tr>';
	}
	echo '</table>';
} else {
	echo 'エース候補の選手を表示するには、ログインしてください。';
}
?>
