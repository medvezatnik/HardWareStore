
											 
													<table width="774"  border="0" cellspacing="0" cellpadding="0">
																<tr>
																  <td height="40" class="popular"><img src="/images/spacer.gif" alt="" width="27" height="19"><span class="popular_text">Popular Models</span></td>
																</tr>
																<tr>
																	  <td height="138" valign="top" class="popular_center">
																			  <table width="774" height="139"  border="0" cellpadding="0" cellspacing="0">
																				<tr>
																				  <td width="15">&nbsp;</td>
																				  <td width="743"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
																					<tr>
																					   <?php foreach ($data['specials'] as $special): ?>
																					  <td width="21%" height="148" align="center"><a href="/store/product/id/<?php echo $special['product_id'];?>"><img src="/<?php echo $special['picture'];?>" alt="" width="140" height="117" border="0" /></a><br>
																						<span class="style7"><a href="/store/product/id/<?php echo $special['product_id'];?>"><?php echo $special['name']; ?></a></span></td>
																					  <td width="2%" align="center"><img src="/images/op.jpg" width="14" height="117"></td>
																					  <?php endforeach; ?>
																					</tr>
																				  </table></td>
																				  <td width="16">&nbsp;</td>
																				</tr>
																			  </table>
																	  </td>
																</tr>
																<tr>
																  <td valign="top"><img src="/images/close.gif" alt="" width="774" height="9"></td>
																</tr>
													</table>
	<table width="774"  border="0" cellspacing="0" cellpadding="0">
														  <tr>
																<td width="22">&nbsp;</td>
																<td width="729">&nbsp;</td>
																<td width="23">&nbsp;</td>
														  </tr>
														  <tr>
																<td height="479">&nbsp;</td>
																<td align="left" valign="top">
															
															            <?php foreach ($data['newArrs'] as $newArr): ?>
																					<table width="207" height="234"  border="0" cellpadding="0" cellspacing="0" class="productleft_top">
																					  <tr>
																						<td align="left" valign="top" class="newtovar">
																							<table width="207"  border="0" cellspacing="0" cellpadding="0">
																							  <tr>
																								<td height="200" valign="top">
																									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
																									  <tr>
																										<td height="53"><span class="style7"><a href="/store/store/product/id/<?php echo $newArr['product_id'];?>"><?php echo $newArr['name']; ?></a></span></td>
																									  </tr>
																									  <tr>
																										<td height="147" align="center"><a href="/store/product/id/<?php echo $newArr['product_id'];?>"><img src="/<?php echo $newArr['picture']; ?>" alt="" width="175" height="144" border="0"></a></td>
																									  </tr>
																									</table>
																								</td>
																								</tr>
																							  <tr>
																								<td height="35">
																									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
																									  <tr>
																										<td width="38%" height="24"><span class="style7"><a href="/store/product/id/<?php echo $newArr['product_id'];?>" id="blue1">More details</a></span></td>
																										<td width="23%">&nbsp;</td>
																										<td width="39%" class="price"><?php echo $newArr['price']; ?> Rub</td>
																									  </tr>
																									</table>
																								</td>
																							  </tr>
																							</table>
																						</td>
																					  </tr>
																					</table>
                                                                        <?php endforeach; ?>
															


																</td>
																<td>&nbsp;</td>
																<td>&nbsp;</td>
																<td>&nbsp;</td>
														  </tr>
												
							</tr></tr>
						  </table>
