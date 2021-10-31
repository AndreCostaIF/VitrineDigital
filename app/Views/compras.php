<?php include 'masthead.php'; 
include 'personal.php';?>


<?php if (isset($_SESSION['shopkeeper']['name'])) : ?>
	<div class="container">
	<?php $cont = 0; ?>
	<?php if (isset($resultado)) : ?>
		<?php foreach ($resultado as $key => $item) : ?>
			<div class="row-fluid">
				<div class="span12">
					<h2>Pedido N#<?php print_r($pedido[$cont]["idPedido"]) ?></h2>

				</div>
			</div>

			<div class="row-fluid">
				<div class="span12">
					<div class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left">Informações do cliente e Produtos</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">


                                <form action="#" method="post">
                                    <table class="table table-striped table-hover">

                                        
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Telefone </th>
                                            <th>E-mail</th>
                                            <th>Data do pedido</th>
                                        </tr>

                                        <tr>
                                            <td><?= $users[$cont]['NomeUsuario'] ?></td>
                                            <td><?= $users[$cont]['Telefone'] ?></td>
                                            <td><?= $users[$cont]['EmailUsuario'] ?></td>
                                            <td><?= $pedido[$cont]["data"] ?></td>
                                        </tr>
										</tr>

										<tr>
											<th>
												<h5>Endereço</h5>
											</th>
										</tr>
										<tr>
											<th>Rua</th>
											<th>Bairro </th>
											<th>N°</th>
											<th>Cidade</th>
											<th>UF </th>
										</tr>

										<tr>
											<td><?= $users[$cont]['Rua'] ?></td>
											<td><?= $users[$cont]['Bairro'] ?></td>
											<td><?= $users[$cont]['Numero'] ?></td>
											<td><?= $users[$cont]['Cidade'] ?></td>
											<td><?= $users[$cont]['UF'] ?></td>
										</tr>


										<tr>
											<th>Foto</th>
											<th>Produto</th>
											<th>Preço</th>
											<th>Quantidade</th>
											<th>Total</th>

										</tr>

										<?php foreach ($item as $chave => $value) : ?>

											<tr>
												<?php $idCate = $value["idCategoriaProd"];
												$idLoja = $value["idLoja"] ?>
												<td class="span1"><a href='<?= site_url("Checkout/listarProdutos/$idCate/$idLoja") ?>'><img src='<?= base_url($value["imagenProduto"]) ?>' height="90px" width="90px" /></a></td>
												<!--NOME DO PRODUTO-->
												<td class="span5">
													<a href='<?= site_url("Checkout/listarProdutos/$idCate/$idLoja") ?>'><?php print_r($value["nomeProduto"]); ?></a>
												</td>


												<!--PREÇO DO PRODUTO-->
												<td class="span2"> <label class="input-mini preco"> <?php print_r($value["precoProduto"]); ?> </label> </td>

												<td class="span2">

													<div class="row-fluid">
														<div class="span2">

															<label class="input-mini quantidade"> <?php print_r($value["quantidade"]); ?> </label>
														</div>

													</div>
												</td>
												<!--PRECO DO PRODUTO X QUANTIDADE-->
												<td class="span1">
													<div class="total">R$<?php print_r($value["total"]); ?></div>
												</td>
											</tr>
											<?php if ($value["idPedido"] == $pedido[$cont]["idPedido"]) : ?>
												<?php $total = $pedido[$cont]["Total"] ?>
											<?php endif; ?>

										<?php endforeach; ?>
										<!--PRECO TOTAL-->
										<?php if (isset($total)) : ?>

											<th>
												Status
											</th>
											<th>Total do pedido</th>
											<tr>
												<?php if ($pedido[$cont]["finalizado"] == 1) : ?>
													<td class="span2">
														<label class="input-mini preco" style="background: yellow; color: black">pendente</label>
													</td>
												<?php elseif ($pedido[$cont]["finalizado"] == 10) : ?>
													<td class="span2">
														<label class="input-mini preco" style="background: green; color: white">Entregue</label>
													</td>
												<?php elseif ($pedido[$cont]["finalizado"] == 20) : ?>
													<td class="span2">
														<label class="input-mini preco" style="background: red; color: white">Inviabilizado</label>
													</td>
												<?php elseif ($pedido[$cont]["finalizado"] == 30) : ?>
													<td class="span2">
														<label class="input-mini preco" style="background: green; color: white">Viabilizado</label>
													</td>
												<?php elseif ($pedido[$cont]["finalizado"] == 40) : ?>
													<td class="span2">
														<label class="input-mini preco" style="background: red; color: white">Cancelado</label>
													</td>
												<?php endif; ?>
												<td class="span2">
													<div class="total">R$<?php print_r($total); ?></div>
												</td>
											</tr>
										<?php endif; ?>
									</table>
									<hr />
									<div class="row-fluid">

										<div class="span6">
											<?php if ($pedido[$cont]["finalizado"] == 1) : ?>
												<div class="pull-right">
													<a href="<?= site_url("Compras/statusPedido/{$users[$cont]['IdUsuario']}/{$pedido[$cont]['idPedido']}/30") ?>" class="btn btn-primary" style="background: green;">Viabilizar</a>
													<a href="<?= site_url("Compras/statusPedido/{$users[$cont]['IdUsuario']}/{$pedido[$cont]['idPedido']}/20") ?>" class="btn btn-primary" style="background: red; ">Inviabilizar</a>
												</div>
											<?php elseif ($pedido[$cont]["finalizado"] == 30) : ?>
												<a href="<?= site_url("Compras/statusPedido/{$pedido[$cont]['idPedido']}/10") ?>" class="btn btn-primary" style="background: green;">Entregue</a>
											<?php elseif ($pedido[$cont]["finalizado"] == 40) : ?>
												<h2 class="btn btn-primary" style="background: red;">Cancelado</h2>
											<?php endif; ?>
										</div>
									</div>
								</form>


							</div>
						</div>
					</div>
				</div>
			</div>



			<?php $cont++ ?>

		<?php endforeach; ?>
	<?php else : ?>
		<h4>Você ainda não tem pedidos</h4>
	<?php endif; ?>
<?php endif; ?>

<!--CLIENTE-->
<?php if (isset($_SESSION['user']['name'])) : ?>
	<div class="container">
	<?php $cont = 0; ?>

	<?php if (isset($pedido)) : ?>
		<?php foreach ($pedido as $key) : ?>

			<div class="row-fluid">
				<div class="span12">
					<h2>Pedido N#<?php print_r($key["pedido"]["IdPedido"]) ?></h2>

				</div>
			</div>

			<div class="row-fluid">
				<div class="span12">
					<div class="block">
						<div class="navbar navbar-inner block-header">
							<div class="muted pull-left">Produtos</div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">


								<form action="#" method="post">
									<table class="table table-striped table-hover">
										<tr>
											<th>Data do pedido</th>
											<td><?php
												$data =  $key["pedido"]["DataPedido"];
												$data = date_create($data);
												$data = date_format($data, 'd/m/Y');
												print_r($data); ?></td>
										</tr>
										<tr>
											<th>Foto</th>
											<th>Produto</th>
											<th>Loja</th>
											<th>Preço</th>
											<th>Quantidade</th>
											<th>Total</th>

										</tr>
										
										<?php 
											if(is_array($key["produtos"])):
											foreach ($key["produtos"] as $chave):
										?>
											
											<tr>
												<?php $idCate = $chave["idCategoriaProd"];
												$idLoja = $chave["idLoja"] ?>
												<td class="span1"><a href='<?= site_url("Checkout/listarProdutos/$idCate/$idLoja") ?>'><img src='<?= base_url($chave["imagenProduto"]) ?>' height="90px" width="90px" /></a></td>
												<!--NOME DO PRODUTO-->
												<td class="span5">
													<a href='<?= site_url("Checkout/listarProdutos/$idCate/$idLoja") ?>'><?php print_r($chave["nomeProduto"]); ?></a>
												</td>
												<!--NOME DA LOJA-->
												<?php foreach ($loja as $id) : ?>
													<?php if ($id["IdLoja"] == $chave["idLoja"]) : ?>
														<?php $idLoja = $id["IdLoja"] ?>
														<td class="span5"> <a href='<?= site_url("Lista/index/$idLoja") ?>'> <?= $id["NomeFantasia"]; ?> </a> </td>
													<?php endif; ?>
												<?php endforeach; ?>

												<!--PREÇO DO PRODUTO-->
												<td class="span2"> <label class="input-mini preco"> <?php print_r($chave["precoProduto"]); ?> </label> </td>

												<td class="span2">

													<div class="row-fluid">
														<div class="span2">

															<label class="input-mini quantidade"> <?php print_r($chave["quantidade"]); ?> </label>
														</div>

													</div>
												</td>
												<!--PRECO DO PRODUTO X QUANTIDADE-->
												<td class="span1">
													<div class="total">R$<?php print_r($chave["precoTotal"]); ?></div>
												</td>
											</tr>

											<?php $total = $key["pedido"]["TotalPedido"] ?>



										
										
											<?php endforeach;
												  endif;?>
										<!--PRECO TOTAL-->
										<?php if (isset($total)) : ?>

											<th>
												Status
											</th>
											<th>Total do pedido</th>
											<tr>
												<?php if ($key["pedido"]["Status"] == 1) : ?>
													<td class="span2">
														<label class="input-mini preco" style="background: yellow; color: black">pendente</label>
													</td>
												<?php elseif ($key["pedido"]["Status"] == 10) : ?>
													<td class="span2">
														<label class="input-mini preco" style="background: green; color: white">Entregue</label>
													</td>
												<?php elseif ($key["pedido"]["Status"] == 20) : ?>
													<td class="span2">
														<label class="input-mini preco" style="background: red; color: white">Inviabilizado</label>
													</td>
												<?php elseif ($key["pedido"]["Status"] == 30) : ?>
													<td class="span2">
														<label class="input-mini preco" style="background: green; color: white">Viabilizado</label>
													</td>
												<?php elseif ($key["pedido"]["Status"] == 40) : ?>
													<td class="span2">
														<label class="input-mini preco" style="background: red; color: white">Cancelado</label>
													</td>
												<?php endif; ?>

												<td class="span2">
													<div class="total">R$<?php print_r($total); ?></div>
												</td>
											</tr>
										<?php endif; ?>
									</table>
									<hr />
									<div class="row-fluid">

										<div class="span6">
											<?php if ($key["pedido"]["Status"] == 1) : ?>
												<div class="pull-right">
													<a href="<?= site_url("Compras/statusPedido/{$key["pedido"]['IdPedido']}/40") ?>" class="btn btn-primary" style="background: red;">Cancelar</a>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</form>


							</div>
						</div>
					</div>
				</div>
			</div>


			
		<?php endforeach; ?>
	<?php else : ?>
		<h4>Você ainda não tem pedidos</h4>
	<?php endif; ?>
<?php endif; ?>

<?php include 'footer.php'; ?>