<font color="red" size="8"><center><?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : '' ; unset($_SESSION['msg']) ?></center></font>
<div style="width: 100%; height: 100%; ">
<div class="edit_panel">
	
            
<form method="POST" action="/products/docreate/" ENCTYPE="multipart/form-data"  >
<fieldset>

<legend>Информация о товаре</legend>
	<table align="left" cellspacing="15" >  
<tr>
  <td><label for="name" style="font-size: 11pt;">Название</label></td>
    <td><input type="text" id="name" name="name" size="80" value="" /></td>
 </tr>
 
 <tr style="font-size: 80pt;">
  <td><label for="сategoryId" class="font11" >Категория</label></td>
   <td>
     <select name="categoryId">
	 <?php foreach($data['categories'] as $category): ?>
	   <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
     <?php endforeach; ?>
     </select>
   </td>
  </tr>  
  
   <tr>  
     <td><label for="description" class="font11"  >Описание</label></td>
     <td> <textarea rows="10" id="description" name="description"  /></textarea></td>
   </tr> 
   
   <tr> 
     <td><label for="price" class="font11">Цена</label></td>
     <td> <input type="text" id="price" name="price" value="" /></td>
   </tr>
   
   <tr> 
     <td><label for="price" class="font11">Количество</label></td>
     <td> <input type="text" id="amount" name="amount" value="" /></td>
   </tr>
   
    <tr>
      <td><label for="picture" class="font11" >Картинка</label></td>
      <td> <input type="file" id="picture" name="picture" /></td>
      <td width="440">Картинка должна быть меньше 200 кб. </td></td>
    </tr>
    
    <tr>
      <td><label for="special" class="font11" >Акция</label></td>
      <td>
		  <input type="radio" name="special" value="2">Да  
          <input type="radio" name="special" value="1">Нет
      </td>
    </tr>
   
    <tr>
      <td> <input type="submit" name="submit" value="Подтвердить" /></td>
    </tr>
   
</table>
</fieldset>

</form>
</div>
</div>
