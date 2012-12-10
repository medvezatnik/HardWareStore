<div  style="font-size: 19pt;"><b>Ваш чек:</b> </div>
<table border="0" width="100%" cellspacing="0" cellpadding="2" id="productListing" class="productListing">
  <tbody>
  <tr>
    <td align="left" class="productListing-heading" width="50">Id</td>
    <td align="left" class="productListing-heading" width="600">Наименование товара</td>
    <td align="left" class="productListing-heading">Количество</td>
    <td align="left" class="productListing-heading">Цена за шт.</td>
    <td align="left" class="productListing-heading">Общая стоимость</td>
  </tr>

<?php for($i=0;$i<count($data['products']['cartProdNames']);$i++) { ?>
<tr  ><td><?php echo $i+1; ?></td><td><?php echo $data['products']['cartProdNames'][$i] ?></td><td><?php echo $data['products']['cartProdAmount'][$i] ?></td><td ><?php echo $data['products']['cartProdPrices'][$i] / $data['products']['cartProdAmount'][$i] ?></td><td><?php echo $data['products']['cartProdPrices'][$i] ?></td></tr>" <?php } ?>                                                                                        

</tbody>
  </table>
  
  <table border="0" width="100%" cellspacing="0" cellpadding="2" >
  <tbody><tr>
    <td align="left" width="50"></td>
    <td align="left" width="600"></td>
    <td align="left"></td>
    <td align="left"></td>
    <td align="right" width="170" style="border-left: 1px solid #C7C3BC;border-right: 1px solid #C7C3BC;border-bottom: 1px solid #C7C3BC;">Итого <?php echo array_sum($data['products']['cartProdPrices']); ?> </td>
  </tr>
  

  
  
  
  </tbody>
  </table>
  

<br /><br /><br /><br />
<a href="/"><font color="red" size="6"><center>Спасибо за заказ. Возращайтесь к нам</center></font></a>
