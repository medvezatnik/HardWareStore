

	<form method="post" action = "/Login/changeuserdata/">
    <table> 
<tbody><tr>
        <td><table border="0" width="778" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td class="pageHeading">Мои данные</td>
            
          </tr>
          <tr>
            <td>
                         </td>
          </tr>
        </tbody></table></td>
      </tr>
      
      <tr>
        <td class="smallText"><br>На этой странице вы можете частично изменить свои личные данные, чтобы мы знали, куда отправлять посылку :-) </a>.</td>
      </tr>
      <tr>
      <td><font color="#FF0000" size="4"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : '';?></font></td>
      </tr>
        <td></td>
      </tr>
      
      <tr>
        <td class="main"><b>Ваш адрес</b></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tbody><tr class="infoBoxContents">
            <td><table border="0" cellspacing="2" cellpadding="2">


              <tbody><tr>

                <td class="main">Страна:</td>

                <td class="main"><input type="text" name="country" value="<?php echo $data['userData']['country'];?>">&nbsp;<span class="inputRequirement">*</span></td>

              </tr>

              <tr>

                <td class="main">Почтовый индекс:</td>
                                <td class="main"><input type="text" name="postcode" value="<?php echo $data['userData']['postcode'];?>">&nbsp; для Москвы не обязателен &nbsp;<span class="inputRequirement">*</span></td>
                <!--td class="main"><input type="hidden" name="postcode" value="101000"></td-->

              </tr>
              <tr>
                <td class="main">Город:</td>
                
                <td class="main"><input type="text" name="city" value="<?php echo $data['userData']['city'];?>">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>
<tr>
<td class="main">Область:</td>
<td class="main">
<input type="text" name="region" value="<?php echo $data['userData']['region'];?>">&nbsp;<span class="inputRequirement">*</span></td>
</tr>

              <tr>

                <td class="main">Улица, номер дома, квартира:</td>

                
                <td class="main"><input type="text" name="street_address" value="<?php echo $data['userData']['street_address'];?>">&nbsp;<span class="inputRequirement">*</span></td>

              </tr>
            </tbody></table></td>
          </tr>
        </tbody></table></td>
      </tr>
     
      <tr>
        <td class="main"><b>Контактная информация</b></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tbody><tr class="infoBoxContents">
            <td><table border="0" cellspacing="2" cellpadding="2">
              <tbody><tr>
                <td class="main">Телефон:</td>
                <td class="main"><input type="text" name="phone" value="<?php echo $data['userData']['phone'];?>">&nbsp;<span class="inputRequirement" value="">*</span></td>
              </tr>
              <tr>
                <td class="main">Мобильный:</td>
                <td class="main"><input type="text" name="mobile_phone" value="<?php echo $data['userData']['mobile_phone'];?>">&nbsp;</td>
              </tr>
            </tbody></table></td>
          </tr>
        </tbody></table></td>
      </tr>
     
      
   
      
      <tr>
        <td class="main"><b>Ваш пароль</b></td>
      </tr>
<!-- -->
 <td class="smallText"><br><font color="#FF0000"><small><b>ВНИМАНИЕ:</b></small></font> ОСТАВЬТЕ ФОРМУ ПУСТОЙ, ЕСЛИ НЕ ХОТИТЕ ИЗМЕНИТЬ СВОЙ ТЕКУЩИЙ ПАРОЛЬ</a>.</td>
    <!--  -->
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tbody><tr class="infoBoxContents">
            <td><table border="0" cellspacing="2" cellpadding="2">
              <tbody><tr>                <td class="main">Пароль:</td>
                <td class="main"><input type="password" name="password1" maxlength="40">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>
              <tr>
                <td class="main">Подтвердите пароль:</td>
                <td class="main"><input type="password" name="password2" maxlength="40" >&nbsp;<span class="inputRequirement">*</span></td>                 </tr>
            </tbody></table></td>
          </tr>
        </tbody></table></td>
      </tr>
      
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tbody><tr class="infoBoxContents">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tbody><tr>
                
                <td align="right"><input type="submit" name="submit" value="submit" src="" border="0" alt="Продолжить" title=" Продолжить "></td>
                 
              </tr>
            </tbody></table></td>
          </tr>
        </tbody></table></td>
      </tr>
    </tbody>
    </table>


