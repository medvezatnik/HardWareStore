

<font color="red" size="8"><center><?php echo isset($data['error']) ? $data['error'] : '' ; ?></center></font>
<div style="width: 100%; height: 100%; ">
<div class="edit_panel">
	
            
<form method="POST" action="/categories/doedit/id/<?php echo $data['category']['category_id'];  ?>" ENCTYPE="multipart/form-data"  >
<fieldset>

<legend>Информация о категории</legend>
	<table align="left" cellspacing="15" >  
<tr>
  <td><label for="name" style="font-size: 11pt;">Название</label></td>
    <td><input type="text" id="name" name="name" size="80" value="<?php echo $data['category']['category_name'] ?>" /></td>
 </tr>
   
    <tr>
      <td> <input type="submit" name="submit" value="Подтвердить" /></td>
    </tr>
     <input type="hidden" name="category_id" value="<?php echo $data['category']['category_id']; ?>">
</table>
</fieldset>

</form>
</div>
</div>
