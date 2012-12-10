
	<h1>Категория</h1>
	

<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-spacing: 2px; border-collapse: separate;">	
	<tbody><tr>
		
		<td>
			<table border="0" width="100%" cellspacing="0" cellpadding="2" id="productListing" class="productListing">
  <tbody><tr>
	 <?php if (isset($data['products'][0]['category_id'])) { ?> 
    <td align="center" class="productListing-heading">&nbsp;&nbsp;</td>
    <td class="productListing-heading">&nbsp;<a href="/store/category/id/<?php echo $data['products'][1]['category_id']; ?>/by/name/order/<?php echo ($data['by']=='name' ? ($data['order']=='asc' ? 'desc' : 'asc') : 'asc') ?>" title="Сортировка товаров по убыванию по параметру Наименование" class="productListing-heading">Наименование+</a>&nbsp;</td>
    <td align="right" class="productListing-heading">&nbsp;<a href="/store/category/id/<?php echo $data['products'][1]['category_id']; ?>/by/price/order/<?php echo ($data['by']=='price' ? ($data['order']=='asc' ? 'desc' : 'asc') : 'asc') ?>" title="Сортировка товаров по возрастанию по параметру Цена" class="productListing-heading">Цена</a>&nbsp;</td>
    <td align="center" class="productListing-heading">&nbsp;Купить&nbsp;</td>
    <?php } else { ?> 
    <td align="center" class="productListing-heading">&nbsp;&nbsp;</td>
    <td class="productListing-heading">&nbsp;Наименование+&nbsp;</td>
    <td align="right" class="productListing-heading">&nbsp;Цена&nbsp;</td>
    <td align="center" class="productListing-heading">&nbsp;Купить&nbsp;</td>
    <?php } ?>
  </tr>
<?php foreach ($data['products'] as $product): ?>
  <tr class="productListing-odd">
    <td align="center" class="productListing-data">&nbsp;<a href="/store/product/id/<?php echo $product['product_id']; ?>"><img src="/<?php echo $product['picture']; ?>" border="0"  width="160" height="130" ></a>&nbsp;</td>
    <td class="productListing-data">&nbsp;<a href="/store/product/id/<?php echo $product['product_id']; ?>"><?php echo $product['name']; ?></a>&nbsp;<br><table border="0" cellspacing="1" cellpadding="0"><tbody><tr></tr></tbody></table></td>
    <td align="right" class="price">&nbsp;<?php echo $product['price']; ?> Руб&nbsp;</td>
    <td align="center" class="productListing-data"><a href="/cart/add/productid/<?php echo $product['product_id']; ?>"><img src="/images/trash.jpg" border="0" alt="Положить в корзину" title="Положить в корзину " width="111" height="120"></a></td>
  </tr>
<?php endforeach; ?>
</tbody></table>
<br>
			</td>
	</tr>
	
</tbody></table>
</div>


