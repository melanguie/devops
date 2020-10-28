<?php

require_once "controlleurs.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/*if (!isset($_SESSION['auth'])){
    header('location:connexion.php');
}*/

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8" content="text/html;charset=utf-8" >
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap/img">
    <link href="css/style.css" rel="stylesheet">


    <title>Gestion de livres</title>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTable2");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>
<body>

<h1 style="text-transform: uppercase; text-align: center; margin-top: 40px;font-weight: 600">Gestion des livres</h1>

<div class="container" style=" margin-top: 140px;">

    <input type="text" class="form-control " placeholder="rechercher ..." onkeyup="myFunction()"
           id="myInput"
           style="width: 270px; margin-bottom: 20px; margin-left: 380px">


    <div class="row">

        <div style="display: flex; justify-content: center; align-items: center;" class="col-md-7">
            <table id="dataTable2" class="table table-responsive table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>codeLivre</th>
                    <th>ISBN</th>
                    <th>auteur</th>
                    <th>titre</th>
                    <th>stock</th>
                    <th>pu</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($produits as $c): ?>

                    <tr>
                        <td><?= $c->codeLivre ?></td>
                        <td><?= $c->ISBN ?></td>
                        <td><?= $c->auteur ?></td>
                        <td><?= $c->titre ?></td>
                        <td><?= $c->stock ?></td>
                        <td><?= $c->pu ?></td>
                        <td>
                            <a href="?action=del&codeLivre=<?= $c->codeLivre ?>" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove-circle"></span>
                            </a>
                            <a href="?action=edit&codeLivre=<?= $c->codeLivre ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>


                </tbody>


                <tfoot>
                <tr>
                    <th>codeLivre</th>
                    <th>ISBN</th>
                    <th>auteur</th>
                    <th>titre</th>
                    <th>stock</th>
                    <th>pu</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class=" col-md-4">

            <form method="post">


                <input type="hidden" name="action" value="<?= !empty($action) ? 'update' : 'add' ?>">

                <div class="form-group">
                    <label for="">Designation</label>

                    <input type="text" name="ISBN" placeholder="ISBN" class="form-control"
                           value="<?= $produit->ISBN ?>"/>
                </div>
                <div class="form-group">
                    <label for="">Quantite</label>
                    <input type="number" name="stock" placeholder="stock" class="form-control"
                           value="<?= $produit->stock ?>"/>

                </div>

                <div class="form-group">
                    <label for="">pu</label>
                    <input type="number" name="pu" placeholder="pu" class="form-control"
                           value="<?= $produit->pu ?>"/>
                </div>
                <div class="form-group">
                    <label for="">titre</label>
                    <input type="text" name="titre" placeholder="titre" class="form-control"
                           value="<?= $produit->titre ?>"/>
                </div>
                <div class="form-group">
                    <label for="">auteur</label>
                    <input type="text" name="auteur" placeholder="auteur" class="form-control"
                           value="<?= $produit->auteur ?>"/>
                </div>

                <button type="submit" class="btn btn-primary"
                        style="float: right"> <?= !empty($action) ? 'Modifier' : 'Enregistrer' ?></button>
            </form>
        </div>
    </div>


</div>
</body>
</html>
