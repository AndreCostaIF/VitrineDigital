<?php 

include 'masthead.php';
include 'personal.php'; ?>

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
		<h4>Você ainda não tem favoritos</h4>
	<?php endif; ?>
<?php endif; ?>

<?php include 'footer.php'; ?>