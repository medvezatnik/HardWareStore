
<font color="red" size="8"><center><?php echo isset($data['msg']) ? $data['msg'] : '' ; ?></center></font>
<div style="width: 100%; height: 100%; ">
<div class="edit_panel">
	
            
<form method="POST" action="/products/doedit/id/<?php echo $data['product']['product_id'];  ?>" ENCTYPE="multipart/form-data"  >
<fieldset>

<legend>Информация о товаре</legend>
	<table align="left" cellspacing="15" >  
<tr>
  <td><label for="name" style="font-size: 11pt;">Название</label></td>
    <td><input type="text" id="name" name="name" size="80" value="<?php echo $data['product']['name'] ?>" /></td>
 </tr>
 
 <tr style="font-size: 80pt;">
  <td><label for="сategoryId" class="font11" >Категория</label></td>
   <td>
     <select name="сategoryId">
	 <?php foreach($data['categories'] as $category): ?>
	   <option <?php echo $category['category_id']==$data['product']['category_id'] ? 'selected' :''?>  value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
     <?php endforeach; ?>
     </select>
   </td>
  </tr>  
  
   <tr>  
     <td><label for="description" class="font11"  >Описание</label></td>
     <td> <textarea rows="10" id="description" name="description"  /><?php echo $data['product']['description'] ?></textarea></td>
   </tr> 
   
   <tr> 
     <td><label for="price" class="font11">Цена</label></td>
     <td> <input type="text" id="price" name="price" value="<?php echo $data['product']['price'] ?>" /></td>
   </tr>
   
   <tr> 
     <td><label for="price" class="font11">Количество</label></td>
     <td> <input type="text" id="amount" name="amount" value="<?php echo $data['product']['amount'] ?>" /></td>
   </tr>
   
    <tr>
      <td><label for="picture" class="font11" >Картинка</label></td>
      <td> <input type="file" id="picture" name="picture" /></td>
      <td width="440">Картинка должна быть меньше 200 кб. </td></td>
    </tr>
    
    <tr>
      <td><label for="special" class="font11" >Акция</label></td>
      <td>
		  <input type="radio" name="special" value="1">Да  
          <input type="radio" name="special" value="0">Нет
      </td>
    </tr>
   
    <tr>
      <td> <input type="submit" name="submit" value="Подтвердить" /></td>
    </tr>
     <input type="hidden" name="product_id" value="<?php echo $data['product']['product_id']; ?>">
</table>
</fieldset>

</form>
</div>
</div>
