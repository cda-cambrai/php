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
            // Je prépare mes variables
            $number1 = null;
            $number2 = null;
            $operator = null;

            if (!empty($_POST)) { // On vérifie que $_POST ne soit pas vide
                $number1 = $_POST['number1'];
                $number2 = $_POST['number2'];
                $operator = $_POST['operator'];

                if ($operator === '+') {
                    $result = $number1 + $number2;
                } else if ($operator === '-') {
                    $result = $number1 - $number2;
                } else if ($operator === '/') {
                    $result = $number1 / $number2;
                } else if ($operator === '*') {
                    $result = $number1 * $number2;
                }

                // !!!!!!!!! SOLUTION A BANNIR !!!!!!!!!!!!
                // Si $number2 = '20; phpinfo();'; // Là le phpinfo() s'exécute
                // eval('$result = '.$number1.' '.$operator.' '.$number2.';');
                // !!!!!!!!! SOLUTION A BANNIR !!!!!!!!!!!!

                // SOLUTION SWITCH POSSIBLE
                /*switch ($operator) {
                    case '+':
                        $result = $number1 + $number2;
                    break;
                    case '-':
                        $result = $number1 - $number2;
                    break;
                    case '/':
                        $result = $number1 / $number2;
                    break;
                    case '*':
                        $result = $number1 * $number2;
                    break;
                }*/

                echo '<h1>Le résultat est '.$result.'</h1>';
            }

        ?>

        <!--
            On peut séparer le traitement PHP dans un autre fichier.
         -->
        <form method="POST" action="calcul.php">
            <label for="number1">Nombre 1</label>
            <input type="text" class="form-control" name="number1" id="number1"> <br />

            <label for="number2">Nombre 2</label>
            <input type="text" class="form-control" name="number2" id="number2"> <br />

            <label for="operator">Opérateur</label> <br />
            <input type="radio" name="operator" id="add" value="+">
            <label for="add">Addition</label> <br />
            <input type="radio" name="operator" id="sub" value="-">
            <label for="sub">Soustraction</label> <br />
            <input type="radio" name="operator" id="divide" value="/">
            <label for="divide">Division</label> <br />
            <input type="radio" name="operator" id="multiply" value="*">
            <label for="multiply">Multiplication</label> <br />

            <br />

            <button class="btn btn-primary">Calculer</button>
        </form>
    </div>
</body>
</html>
