  <h1><?php echo $data['product']['name']; ?></h1>
        <div style="font-size: 14pt;"><?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : ''  ?></div>
	<img src="/<?php echo $data['product']['picture']; ?>" />
	<p style="font-size:12pt;">Описание: <?php echo $data['product']['description']; ?></p>
	</br>
	<center><a href="/cart/add/productid/<?php echo $data['product']['product_id']; ?>" style="font-size:20pt; font-color:red;"><font color="red">Купить</font></a></center>
