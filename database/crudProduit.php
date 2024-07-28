<?php
session_start();
include('dbConnect.php');

// CREATE operation
if (isset($_POST["create"])) {
    $ref = mysqli_real_escape_string($conn, $_POST["ref"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $designation = mysqli_real_escape_string($conn, $_POST["designation"]);
    $disponibilite = mysqli_real_escape_string($conn, $_POST["disponibilite"]);

    $sqlInsert = "INSERT INTO produits(ref, designation, type, disponibilite) VALUES ('$ref', '$designation', '$type', '$disponibilite')";
    
    if(mysqli_query($conn, $sqlInsert)){
        $_SESSION["create"] = "Produit ajouté avec succès !";
        header("Location: ../index.php");
        exit();
    } else {
        die("Erreur: " . mysqli_error($conn));
    }
}

// UPDATE operation
if (isset($_POST["edit"])) {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $ref = mysqli_real_escape_string($conn, $_POST["ref"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $designation = mysqli_real_escape_string($conn, $_POST["designation"]);
    $disponibilite = mysqli_real_escape_string($conn, $_POST["disponibilite"]);

    $sqlUpdate = "UPDATE produits SET ref = '$ref', type = '$type', designation = '$designation', disponibilite = '$disponibilite' WHERE id='$id'";
    
    if(mysqli_query($conn, $sqlUpdate)){
        $_SESSION["update"] = "Produit modifié avec succès !";
        header("Location: ../index.php");
        exit();
    } else {
        die("Erreur: " . mysqli_error($conn));
    }
}

// DELETE operation
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sqlDelete = "DELETE FROM produits WHERE id='$id'";
    
    if(mysqli_query($conn, $sqlDelete)){
        $_SESSION["delete"] = "Produit supprimé avec succès !";
        header("Location: ../index.php");
        exit();
    } else {
        die("Erreur: " . mysqli_error($conn));
    }
} else {
    echo "Opération invalide.";
}
?>
