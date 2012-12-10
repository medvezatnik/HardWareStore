<font color="red" size="8"><center><?php echo isset($data['msg']) ? $data['msg'] : '' ; ?></center></font>
<div style="width: 100%; height: 100%; ">
<div class="edit_panel">
	
            
<form method="POST" action="/statics/doedit/id/<?php echo $data['staticPage']['page_id'];  ?>" ENCTYPE="multipart/form-data"  >
<fieldset>

<legend>Информация о Странице</legend>
	<table align="left" cellspacing="15" >  
<tr>
  <td><label for="pageTitle" style="font-size: 11pt;">Название</label></td>
    <td><input type="text" id="pageTitle" name="pageTitle" size="80" value="<?php echo $data['staticPage']['page_title'] ?>" /></td>
 </tr>
 
  <tr>  
     <td><label for="pageUrl" class="font11"  >Url-заголовок</label></td>
     <td> <input id="pageUrl" name="pageUrl"  value="<?php echo $data['staticPage']['page_url'] ?>" /></textarea></td>
   </tr> 
  
  
   <tr>  
     <td><label for="pageContent" class="font11"  >Содержимое</label></td>
     <td> <textarea rows="10" id="pageContent" name="pageContent"  /><?php echo $data['staticPage']['page_content'] ?></textarea></td>
   </tr> 
   
   
    <tr>
      <td> <input type="submit" name="submit" value="Подтвердить" /></td>
    </tr>
     <input type="hidden" name="pageId" value="<?php echo $data['staticPage']['page_id']; ?>">
</table>
</fieldset>

</form>
</div>
</div>
