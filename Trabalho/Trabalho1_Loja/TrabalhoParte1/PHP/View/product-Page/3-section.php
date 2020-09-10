<?php
	if ((int) $_GET["id"] <= 20) {
		$retornoEmJSON  = file_get_contents("https://ramos-api.herokuapp.com/produtos?id=".$_GET["id"]."&pront=3006301&key=909d4f72da60d472d68815e2c53fe509");
		$requisaoJSON = json_decode( $retornoEmJSON );

		if ($requisaoJSON->semelhante != "") {
			$semelhantes = explode(";", $requisaoJSON->semelhante);
			$arraySemelhantes = array();
			foreach ($semelhantes as $value) {
				$requisao = file_get_contents("https://ramos-api.herokuapp.com/produtos?id=".$value."&pront=3006301&key=909d4f72da60d472d68815e2c53fe509");
				$arraySemelhantes[] = json_decode($requisao);
			}
		} else {
			$arraySemelhantes = [];
		}
	}

/* Este 'else' abaixo é somente para que eu possa usar os itens que eu criei no arquivo data.json ao invés de duplicar o array da requisão feita na API (apesar de ser mais fácil) */
	else { 
		$itens = file_get_contents("Includes/data.json");
		$itensDecoded = json_decode($itens);
		foreach ($itensDecoded as $value) {
			if ( $value->id == $_GET["id"]) {
				$requisaoJSON = $value;
				break;
			}
		}

		$semelhantes = explode(";", $requisaoJSON->semelhante);
		$arraySemelhantes = array();
		foreach ($semelhantes as $id_semelhante) {
			foreach ($itensDecoded as $produto) {
				if ( $produto->id == $id_semelhante) {
					$arraySemelhantes[] = $produto;
					break;
				}
			}
		}
	}
?>

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">

				<?php
					include_once $_SESSION["root"]."PHP/View/product-page/3A-imagemProduct.php";
					include_once $_SESSION["root"]."PHP/View/product-page/3B-informacoesProduto.php";
					include_once $_SESSION["root"]."PHP/View/product-page/3C-descricaoProduto.php";
				?>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->