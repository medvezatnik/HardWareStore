<table border="1" width="100%" cellspacing="0" cellpadding="2" id="productListing" class="productListing">
  <tbody>
  <tr>
    <td align="left" class="productListing-heading" width="50">Id</td>
    <td align="left" class="productListing-heading">Заголовок</td>
    <td align="left" class="productListing-heading">Url-заголовк</td>
 
    <td align="left" class="productListing-heading"></td>
    <td align="left" class="productListing-heading"></td>
  </tr>
 <font color="red" size="8"><center><?php echo isset($_SESSION['msg']) ?  $_SESSION['msg'] : '' ; unset($_SESSION['msg']); ?></center></font>
<?php foreach($data['staticPages'] as $staticPage): ?>
<tr><td><?php echo $staticPage['page_id']; ?></td><td><?php echo $staticPage['page_title']; ?></td><td><?php echo $staticPage['page_url']; ?></td><td><a href="/statics/edit/id/<?php echo $staticPage['page_id']; ?>">Редактировать</a></td><td><a href="/statics/delete/id/<?php echo $staticPage['page_id']; ?>">Удалить</a></td></tr></tbody>
  
 <?php endforeach; ?>

</table>
