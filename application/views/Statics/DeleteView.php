<font color="red" size="4"><?php echo isset($data['msg']) ? $data['msg'] : '';?></font>
<table width="100%" >
  <tr>
    <td align="center"><h1> Вы уверены, что хотите удалить эту страницу ?</h1> </td>
  </tr>
</table>

<form action="/statics/dodelete/id/<?php echo $data['pageId']; ?>" method="post">
<table>
  <tr>
	<td width="65%"></td>
    <td align="right" ><input type="submit" name="submit" value="Да" align="center" style="width:100px;" /> </td>
    <td align="right" ><input type="submit" name="submit" value="Нет" align="center" style="width:100px;" /></td>
  </tr>
</table>
</form>
