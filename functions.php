<?php

require_once "connect.php";
header('Content-Type: text/html; charset=utf-8');

function AjouterProduit($ISBN, $auteur, $titre, $stock, $pu)
{
    global $pdo;
    $req = $pdo->prepare('INSERT INTO livres(ISBN, auteur, titre, stock, pu)  VALUES (?,?,?,?,?)');
    return $req->execute([$ISBN, $auteur, $titre, $stock, $pu]);
}

function SupprimerProduit($id_prod)
{
    global $pdo;
    $req = $pdo->prepare("DELETE FROM livres WHERE codeLivre =?");
    return $req->execute([$id_prod]);
}

function modifierProduit($id_prod, $ISBN, $auteur, $titre, $stock, $pu)
{
    global $pdo;
    $req = $pdo->prepare('UPDATE livres SET ISBN = ?,auteur = ?, titre = ?,stock = ?,pu=? WHERE codeLivre = ?');
    return $req->execute([$ISBN, $auteur, $titre, $stock, $pu, $id_prod]);
}

function getProduit($id_prod)
{
    global $pdo;
    $req = $pdo->prepare("SELECT * FROM livres WHERE codeLivre  =?");
    $req->execute([$id_prod]);
    return $req->fetch(PDO::FETCH_OBJ);
}

function getAllProduit()
{
    global $pdo;
    $req = $pdo->prepare("SELECT * FROM livres ");
    $req->execute();
    return $req->fetchAll(PDO::FETCH_OBJ);
}

?>