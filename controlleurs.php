<?php

require_once "functions.php";

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';


$produit = (object)['codeLivre' => -1, 'ISBN' => '', 'auteur' => '', 'titre' => '', 'stock' => '', 'pu' => ''];


switch ($action) {
    case 'add':

        $ISBN = $_POST['ISBN'];
        $auteur = $_POST['auteur'];
        $titre = $_POST['titre'];
        $stock = $_POST['stock'];
        $pu = $_POST['pu'];

        AjouterProduit($ISBN, $auteur, $titre, $stock, $pu);

        break;

    case 'del':

        $codeLivre = $_REQUEST['codeLivre'];
        SupprimerProduit($codeLivre);
        break;

    case 'edit':
        $codeLivre = $_GET['codeLivre'];
        $produit = (object)getProduit($codeLivre);
        break;

    case 'update':

        $codeLivre = $_GET['codeLivre'];
        $ISBN = $_POST['ISBN'];
        $auteur = $_POST['auteur'];
        $titre = $_POST['titre'];
        $stock = $_POST['stock'];
        $pu = $_POST['pu'];
        modifierProduit($codeLivre, $ISBN, $auteur, $titre, $stock, $pu);
        header('location:index.php');
        break;

}
$produits = getAllProduit();

