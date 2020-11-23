<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les superglobales en PHP</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
            $amount = null;
            $currency = null;

            if (!empty($_POST)) {
                $amount = $_POST['amount'];
                $currency = $_POST['currency'];

                if ($currency === 'Euros vers bitcoins') {
                    $result = round($amount / 15747.57, 2);
                    echo '<h1>'.$amount.' euros valent '.$result.' bitcoins</h1>';
                } else {
                    $result = round($amount * 15747.57, 2);
                    echo '<h1>'.$amount.' bitcoins valent '.$result.' euros</h1>';
                }
            }
        ?>

        <form method="POST">
            <label for="amount">Montant</label>
            <input type="text" name="amount" id="amount" class="form-control"> <br />

            <label for="currency">Devise</label>
            <select class="form-control" name="currency" id="currency">
                <option>Euros vers bitcoins</option>
                <option>Bitcoins vers euros</option>
            </select> <br />

            <button class="btn btn-primary">Convertir</button>
        </form>
    </div>
</body>
</html>
