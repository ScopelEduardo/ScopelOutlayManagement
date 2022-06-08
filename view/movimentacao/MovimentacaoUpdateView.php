<?php

class MovimentacaoUpdateView extends AbstractView
{
    public static function execute($params)
    {
        echo "
<!doctype html>
<html lang='en'>
<head>
    <title>Update Movimentacao</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap' rel='stylesheet'>

    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link rel='stylesheet' href='css/style.css'>

</head>
<body>
<section class='ftco-section'>
    <div class='container'>
        <div class='row justify-content-center'>
            <div class='col-md-6 text-center mb-5'>
                <h2 class='heading-section'>Update</h2>
            </div>
        </div>
        <div class='row justify-content-center'>
            <div class='col-md-6 col-lg-5'>
                <div class='login-wrap p-4 p-md-5'>
                    <form action='./savePost' class='login-form' method='post'>
                    <input name='id' id='id' type='hidden' class='form-control rounded-left'
                                   placeholder='Valor' value='".$params['id']."' required>
                        <div class='form-group'>
                            <input name='value' id='value' type='text' class='form-control rounded-left'
                                   placeholder='Valor' value='".$params['value']."' pattern='[0-9]+$' required>
                        </div>
                        <div class='form-group d-flex'>
                            <input name='description' id='description' type='text' class='form-control rounded-left'
                                   placeholder='Descrição' value='".$params['description']."'>
                        </div>
                        <div class='form-group d-md-flex'>
                            <div class='form-group'>
                                <button type='submit' class='btn btn-primary rounded submit p-3 px-5'>Update</button>
                            </div>
                    </form>
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