<?php if (!empty($_SESSION['cart'])):?>
<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Фото</th>
				<th>Наименование</th>
				<th>Кол-во</th>
				<th>Цена</th>
				<th><span class="glyphicon glyphicon-remove"></span></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($_SESSION['cart'] as $id => $item): ?>			
			<tr>
				<td><a href="product/<?=$item['alias']?>"><img src="images/<?=$item['img']?>" alt="" width="80"></a></td>
				<td><a href="product/<?=$item['alias']?>"><?=$item['title']?></a></td>
				<td><?=$item['qty']?></td>
				<td><?=$item['price']?></td>
				<td><span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item"></span></td>
			</tr>
		<?php endforeach; ?>

		<tr>
			<td class="text-right" colspan="2">Итого:</td>
			<td class="cart-qty text-right" colspan="3"><?= $_SESSION['cart.qty'];?></td>
		</tr>
		
		<tr>
			<td class="text-right" colspan="2">На сумму:</td>
			<td class="cart-sum text-right" colspan="3"><?= $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?></td>
		</tr>
		</tbody>
	</table>
</div>
<?php else:?>
	<h3>Корзина пуста</h3>
<?php endif;?>