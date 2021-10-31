<?php include 'masthead.php'; ?>
<div class="container">
<?php if (isset($msg)) : ?>
	<script>
		alert("Quantidade não disponivel!");
	</script>

<?php endif; ?>
<div class="row-fluid">
	<div class="span12">
	<div class="Title-page">
        <h2>Carrinho</h2>
      </div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="block">
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left">Meu Carrinho</div>
			</div>
			<div class="block-content collapse in">
				<div class="span12">
					<?php if (isset($produtos[0]['id'])) : ?>
						<div class="alert alert-warning">
							<h4>Atenção!</h4>
							<p>Complou por que quis, não tem galantia!</p>
						</div>
						<div style='color:red;'><?php if (isset($_SESSION['erro'])) : ?>
								<?= $_SESSION['erro'] ?>
							<?php endif; ?>
						</div>
						<form action="<?= site_url("Checkout/realizarPedido") ?>" method="post">
							<table class="table table-striped table-hover">
								<tr>
									<th>Foto</th>
									<th>Produto</th>
									<th>Preço</th>
									<th>Quantidade</th>
									<th>Total</th>
								</tr>

								<?php foreach ($produtos as $key) : ?>

									<tr>
										<?php $idCate = $key["idCategoriaProd"] ?>
										<?php $idLoja = $key["idLoja"] ?>
										<input type="hidden" name="idLoja<?= $idLoja ?>" value="<?= $idLoja ?>" />
										<td class="span1"><a href='<?= site_url("Checkout/listarProdutos/$idCate/$idLoja") ?>'><img src='<?= base_url($key["imagenProduto"]) ?>' /></a></td>
										<td class="span5">
											<?php $idCate = $key["idCategoriaProd"] ?>
											<?php $idLoja = $key["idLoja"] ?>

											<a href='<?= site_url("Checkout/listarProdutos/$idCate/$idLoja") ?>'><?php print_r($key["nomeProduto"]); ?></a>

										</td>
										<?php $idProd = $key["idProduto"];
										$id1 = $key["id"];
										?>
										<td class="span2"> R$ <input type="text" name="preco<?= $idProd ?>" class="input-mini preco<?= $idProd ?>" value="<?php print_r($key["precoProduto"]); ?>" readonly></td>
										<td class="span2">
											<div class="row-fluid">
												<div class="span7">
													<input type="hidden" name="idProduto<?= $idProd ?>" value="<?= $idProd ?>" />
													<input type="hidden" name="idLoja<?= $idLoja ?>" value="<?= $idLoja ?>" />
													<input type="text" name="quant<?= $idProd ?>" onkeyup='attValor(<?= $idProd ?>)' class="input-mini quantidade<?= $idProd ?>" value=1 placeholder="Qnt.">
												</div>
												<div class="span5">

													<?php $id = $key["id"] ?>
													<a href="#" onclick='confirmDelete("<?php print_r(site_url("Checkout/removerProduto/$id1")) ?>")' class="btn btn-danger btn-mini"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-x-fill" viewBox="0 0 16 16">   <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM7.354 5.646 8.5 6.793l1.146-1.147a.5.5 0 0 1 .708.708L9.207 7.5l1.147 1.146a.5.5 0 0 1-.708.708L8.5 8.207 7.354 9.354a.5.5 0 1 1-.708-.708L7.793 7.5 6.646 6.354a.5.5 0 1 1 .708-.708z"/> </svg>
													</i></a>
												</div>
											</div>
										</td>
										<td class="span1">
											<div class="total<?= $idProd ?>">R$<?php print_r($key["precoProduto"]); ?></div>
										</td>
									</tr>

								<?php endforeach; ?>

							</table>
							<hr />
							<div class="row-fluid">

								<div class="span6">
									<div class="pull-right">
										<button onclick='return confirmCompra();' class="btn btn-primary">Comprar</button>
									</div>
								</div>
							</div>
						</form>
					<?php else : ?>
						<h4>Seu carrinho está vazio</h4>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</div>


<?php include 'footer.php'; ?>