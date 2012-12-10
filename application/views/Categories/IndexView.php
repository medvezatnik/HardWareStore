<table border="1" width="100%" cellspacing="0" cellpadding="2" id="productListing" class="productListing">
  <tbody>
  <tr>
    <td align="left" class="productListing-heading" width="50">Id</td>
    <td align="left" class="productListing-heading">Категория</td>
    
 
    <td align="left" class="productListing-heading"></td>
    <td align="left" class="productListing-heading"></td>
  </tr>
 <font color="red" size="8"><center><?php echo isset($_SESSION['msg']) ?  $_SESSION['msg'] : '' ; unset($_SESSION['msg']); ?></center></font>
<?php foreach($data['categories'] as $product): ?>
<tr><td><?php echo $product['category_id']; ?></td><td><?php echo $product['category_name']; ?></td><td><a href="/categories/edit/id/<?php echo $product['category_id']; ?>">Редактировать</a></td><td><a href="/categories/delete/id/<?php echo $product['category_id']; ?>">Удалить</a></td></tr></tbody>
  
 <?php endforeach; ?>

</table>
