<?php

class MovimentacaoReadView extends AbstractView
{

    public static function execute($params)
    {
        echo "
<!doctype html>
<html lang='en'>
  <head>
  	<title>Movimentações List</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	
	<link rel='stylesheet' href='css/style.css'>

	</head>
	<body>
	<section class='ftco-section'>
		<div class='container'>
			<div class='row justify-content-center'>
				<div class='col-md-6 text-center mb-5'>
					<h2 class='heading-section'>Movimentações List</h2>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-12'>
					<div class='table-wrap'>
						<table class='table'>
						  <thead class='thead-primary'>
						    <tr>
						      <th>#</th>
						      <th>Value</th>
						      <th>Description</th>
						      <th>Actions</th>
						    </tr>
						  </thead>
						  <tbody>
						  ";

        /** @var MovimentacaoModel $movimentacao */
        $movimentacoes = $params['list'];
        $qtdMovimentacoes = count($movimentacoes);
        for ($i = 0; $i < $qtdMovimentacoes; $i++) {
            echo "
                            <tr>
						      <th scope='row'>" . ($i + 1) . "</th>
						      <td>" . $movimentacoes[$i]->getValue() . "</td>
						      <td>" . $movimentacoes[$i]->getDescription() . "</td>
						      <td><a href='./update?id=" . $movimentacoes[$i]->getId()."'>Update</a><br><a href='./deletePost?id=" . $movimentacoes[$i]->getId() . "'>Delete</a></td>
						    </tr>
            ";
        }
        echo "
						  </tbody>
						</table>
						<div>
						    <a href='./create'>Create Movimentacao</a>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src='js/jquery.min.js'></script>
  <script src='js/popper.js'></script>
  <script src='js/bootstrap.min.js'></script>
  <script src='js/main.js'></script>

	</body>
</html>


    ";
    }
}