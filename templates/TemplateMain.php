<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Computer Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<table width="996"  border="0" cellspacing="0" cellpadding="0" align="center" >
<tr>
<td height="607" valign="top">
							<table width="996"  border="0" cellspacing="0" cellpadding="0" >
							  <tr>
								<td width="285" height="52"><a href="/"><img src="/images/logo.jpg" alt="" width="415" height="52" border="0"></a></td>
								<td width="711" class="menu"> 
										<table width="581"  border="0" cellspacing="0" cellpadding="0">
										  <tr>
											<td width="85"><span class="style4"><a href="" id="whitetxt">Главная</a></span></td>
											<td width="116" align="center"><span class="style4"><a href="/static/context/page/contacts/" id="whitetxt">Контакты </a></span></td>
											<td width="86" align="center"><span class="style4"><a href="/static/context/page/about/" id="whitetxt">О нас</a></span></td>
											<td width="98" align="center"><span class="style4"><a href="<?php echo empty($_SESSION['userCookie']) ? '/Login/registration" id="whitetxt">Регистрация' : '/Login/myaccount" id="whitetxt">Мой аккаунт';?> </a></span></td>
											<td width="196"><span class="style4"><img src="/images/spacer.gif" alt="" width="20" height="1"><a href="/" id="whitetxt">Войти </a></span></td>
										  </tr>
										</table>
								</td>
							  </tr>
							</table>
							<table width="100%"  border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td width="60%" height="66" align="left" valign="top">
										  <table width="597"  border="0" cellspacing="0" cellpadding="0">
											<tr>
											  <td><img src="/images/afterlogo.jpg" width="597" height="38"></td>
											</tr>
											<tr>
											  <td height="28" class="slide">
													  <table width="597"  border="0" cellspacing="0" cellpadding="0">
														<tr>
														  <td width="76" height="14">&nbsp;</td>
														  <td width="134"><a href="http://www.templatesfreelance.com/" id="white">Preview #1</a></td>
														  <td width="147"><a href="http://www.templatesfreelance.com/" id="white">Preview #2</a></td>
														  <td width="123"><a href="http://www.templatesfreelance.com/" id="white">Preview #3</a></td>
														  <td width="99"><a href="http://www.templatesfreelance.com/" id="white">Preview #4</a></td>
														  <td width="18">&nbsp;</td>
														</tr>
													  </table>
											  </td>
											</tr>
										  </table>
								  </td>
								  <td width="40%">
										  <table width="399"  border="0" cellspacing="0" cellpadding="0">
											<tr>
											  <td width="157">&nbsp;</td>
											  <td width="58"><a href="http://www.templatesfreelance.com/"><img src="/images/trash.jpg" alt="" width="47" height="48" border="0"></a></td>
											  <td width="184"><span class="style6">Shopping Cart:</span> <br>
												<a href="/cart/show"><span class="style7"><?php echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0 ; ?> items</span></a></td>
											</tr>
										  </table>
								  </td>
								</tr>
							</table>
							<table width="996"  border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td><a href="http://www.templatesfreelance.com/"><img src="/images/header.jpg" alt="" width="996" height="300" border="0"></a></td>
								</tr>
							</table>
						<table width="996"  border="0" cellspacing="0" cellpadding="0" height="1024">
							<tr align="left" valign="top">
									  <td width="202" height="334">
												  <table width="202"  border="0" cellspacing="0" cellpadding="0">
													<tr>
													  <td height="320" align="left" valign="top">
														<div class="category"><img src="/images/spacer.gif" alt="" width="30" height="19">Categories<a href="http://www.templatesfreelance.com/"><img src="/images/spacer.gif" alt="" width="10" height="10" border="0"></a></div>
														<?php foreach ($data['categories'] as $category): ?>
														<div class="linkmenu"><img src="/images/spacer.gif" alt="" width="20" height="19"><span class="red">&bull;</span>&nbsp;&nbsp;<a href="/store/category/id/<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></a></div>
														<?php endforeach; ?>
														
													</td>
													</tr>
													<tr>
													  <td height="26">&nbsp;</td>
													</tr>
													<tr>
													  <td align="center">
				
<?php if (empty($_SESSION['userCookie'])) { ?>
  <form action='/Login/signin' enctype='multipart/form-data' method='post' class='uniForm'>
<fieldset class='blockLabels'>
	<legend>Авторизация</legend>

	
	<div class='ctrlHolder'>
		<label><em>*</em> <strong>Email</strong></label><br />
		<input id="text-2" name='signin_email' class='textInput' type='text' value="">
	</div>
	<div class='ctrlHolder'>
		<label><em>*</em> <strong>Пароль</strong></label><br />
		<input id="password-3" name='signin_password' class='textInput' value="" type="password">
	</div>

	

	
	<div class='ctrlHolder'>
		<div>
			<label class='inlinelabel'>	
				&nbsp;
			</label>
		</div>
	</div>
	
	<div class="buttonHolder">
		<button type="submit" name="submit" value="submit" class="submitButton">Войти</button>
	</div>
</fieldset>
</form>
<?php } else { ?>	
<fieldset class='blockLabels'>
	<legend>Ваши данные</legend>

	
	<div class='ctrlHolder'>
		<label>Добро пожаловать, </label><strong> <?php echo $_SESSION['userName']; ?></strong>
		
	</div>
	

	

	
	
	<div class="buttonHolder">
		  <form action='/Login/signout' enctype='multipart/form-data' method='post' class='uniForm'>
		<button type="submit" name="submit" value="submit" class="submitButton">Выйти</button>
		</form>
	</div>
</fieldset>

<?php } ?>



												  
													  </td>
													</tr>
												  </table>
									  </td>
									  <td width="20">&nbsp;</td>
									  <td width="778">
					
											  
											  
									<?php include($contentView); ?>
									</td>
						  <table width="996"  border="0" cellspacing="0" cellpadding="0">
							<tr>
							  <td><img src="/images/footer.jpg" alt="" width="996" height="5"></td>
							</tr>
							<tr>
							  <td height="76"><table width="996"  border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td width="329" height="78" align="right"><a href="/"><span class="category"><a href="http://www.templatesfreelance.com/"><img src="/images/spacer.gif" alt="" width="10" height="10" border="0"></a></span><img src="/images/hard.jpg" alt="" width="191" height="50" border="0"></a></td>
								  <td width="14">&nbsp;</td>
								  <td width="653">
									<a href="/">Шел медведь по лесу видит машина горит, сел в нее и сгорел</a> Copyright &copy; 2012 </td>
								</tr>
							  </table></td>
							</tr>
						  </table>
				  
				</td>
			</tr>
		</table>
</body>
</html>

