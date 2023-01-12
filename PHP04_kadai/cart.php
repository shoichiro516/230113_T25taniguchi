<?php
if (!empty($_SESSION['product'])) {
	echo '<table>';
	echo '<tr><th>選手番号</th><th>選手名</th>';
	echo '<th>身長</th><th>人数</th><th>身長合計</th><th></th></tr>';
	$total=0;
	foreach ($_SESSION['product'] as $id=>$product) {
		echo '<tr>';
		echo '<td>', $id, '</td>';
		echo '<td><a href="detail.php?id=', $id, '">', 
			$product['name'], '</a></td>';
		echo '<td>', $product['price'], '</td>';
		echo '<td>', $product['count'], '</td>';
		$subtotal=$product['price']*$product['count'];
		$total+=$subtotal;
		echo '<td>', $subtotal, '</td>';
		echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
		echo '</tr>';
	}
	echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total, 
		'</td><td></td></tr>';
	echo '</table>';
} else {
	echo 'リクルートリストに選手がいません。';
}
?>
