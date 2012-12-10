<font color="red" size="8"><center><?php echo isset($data['msg']) ? $data['msg'] : '' ; ?></center></font>
<div style="width: 100%; height: 100%; ">
<div class="edit_panel">
	
            
<form method="POST" action="/statics/docreate/" ENCTYPE="multipart/form-data"  >
<fieldset>

<legend>Новая страница</legend>
	<table align="left" cellspacing="15" >  
<tr>
  <td><label for="pageTitle" style="font-size: 11pt;">Название</label></td>
    <td><input type="text" id="pageTitle" name="pageTitle" size="80" value="" /></td>
 </tr>
  
  <tr>  
     <td><label for="pageUrl" class="font11"  >Url-название</label></td>
     <td> <input rows="10" id="pageUrl" name="pageUrl"  /></td>
   </tr> 
  
   <tr>  
     <td><label for="pageContent" class="font11"  >Содержимое</label></td>
     <td> <textarea rows="10" id="pageContent" name="pageContent"  /></textarea></td>
   </tr> 
   
    <tr>
      <td> <input type="submit" name="submit" value="Подтвердить" /></td>
    </tr>
</table>
</fieldset>

</form>
</div>
</div>

