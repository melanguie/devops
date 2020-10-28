<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 07-Mar-20
 * Time: 10:07 PM
 */

$pdo = new PDO('mysql:host=localhost;dbname=biblio', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>