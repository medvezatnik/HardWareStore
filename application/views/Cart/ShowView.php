Everybody you know is a critic this days
<table border="0" width="100%" cellspacing="0" cellpadding="2" id="productListing" class="productListing">
  <tbody><tr>
    <td align="center" class="productListing-heading">Удалить</td>
    <td class="productListing-heading">Товары</td>
   <td align="center" class="productListing-heading">Количество</td>
    <td align="right" class="productListing-heading">Стоимость</td>
  </tr>
  <form method="post" action="/cart/order/">
  <?php foreach ($data['shoplist'] as $product): ?>
  <tr class="productListing-even">
    <td align="center" class="productListing-data" valign="top"><input type="checkbox" name="cartDelete[]" value="<?php echo $product['product_id']; ?>" /></td>
    <td class="productListing-data"><table border="0" cellspacing="2" cellpadding="2">  <tbody><tr>    <td class="productListing-data" align="center"><a href="/store/product/id/<?php echo $product['product_id']; ?>"><img src="/<?php echo $product['picture']; ?>" border="0" alt="" title="<?php echo $product['name']; ?>  " width="160" height="130"></a></td>    <td class="productListing-data" valign="top"><a href="/store/product/id/<?php echo $product['product_id']; ?>"><b><?php echo $product['name']; ?></b></a>    </td>  </tr></tbody></table></td>
     
        <td align="center" class="productListing-data" valign="top"><input type="text" name="cartProdAmount[]" value="<?php echo $product['amount'] ?>" size="4"></td>
    <td align="right" class="productListing-data" valign="top"><b><?php echo $product['price']*$product['amount'] ; ?></b></td>
    <input type="hidden" value="<?php echo $product['product_id']; ?>" name="cartProdIds[]" />
    <input type="hidden" value="<?php echo $product['name']; ?>" name="cartProdNames[]" />
    <input type="hidden" value="<?php echo $product['price']*$product['amount']; ?>" name="cartProdPrices[]" />
  </tr>
  <?php endforeach; ?>
  <table>
  <tr width = "758" height = "654">
  <td align="right" width = "770" height = "15" valign="top"><input type="submit" name="submit" value="Заказать" /></td>
  </tr>
  </table
  </form>
</tbody></table>
