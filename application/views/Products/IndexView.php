<table border="1" width="100%" cellspacing="0" cellpadding="2" id="productListing" class="productListing">
  <tbody>
  <tr>
    <td align="left" class="productListing-heading" width="50">Id</td>
    <td align="left" class="productListing-heading">Наименование товара</td>
    <td align="left" class="productListing-heading" width="600">Описание</td>
 
    <td align="left" class="productListing-heading"></td>
    <td align="left" class="productListing-heading"></td>
  </tr>
 <font color="red" size="8"><center><?php echo isset($_SESSION['msg']) ?  $_SESSION['msg'] : '' ; unset($_SESSION['msg']); ?></center></font>

<?php foreach($data['products'] as $product): ?>
<tr><td><?php echo $product['product_id']; ?></td><td><?php echo $product['name']; ?></td><td><?php echo $product['description']; ?></td><td><a href="/products/edit/id/<?php echo $product['product_id']; ?>">Редактировать</a></td><td><a href="/products/delete/id/<?php echo $product['product_id']; ?>">Удалить</a></td></tr></tbody>
  
 <?php endforeach; ?>

</table>
<?php foreach($data['pr'] as $page): ?>
 <?php echo '<a href="/products/index/page/' . $page . '">' . $page . '</a> '; ?>
 <?php endforeach; ?>
