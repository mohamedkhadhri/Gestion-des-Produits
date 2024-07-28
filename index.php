<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Gestion Produit</title>
    <link rel="stylesheet" href="./style/styleIndex.css">
</head>
<body>
    <?php include('interface/sidebar.php'); ?>
    <div class="content">
        <div class="container my-4">
            <header class="d-flex justify-content-between my-4">
                <h1>Liste Produits</h1>
            </header>
            <?php
            session_start();
            if (isset($_SESSION["create"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION["create"];
                ?>
            </div>
            <?php
            unset($_SESSION["create"]);
            }
            ?>
            <?php
            if (isset($_SESSION["update"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION["update"];
                ?>
            </div>
            <?php
            unset($_SESSION["update"]);
            }
            ?>
            <?php
            if (isset($_SESSION["delete"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION["delete"];
                ?>
            </div>
            <?php
            unset($_SESSION["delete"]);
            }
            ?>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Ref</th>
                        <th>Désignation</th>
                        <th>Type</th>
                        <th>Disponibilité</th> 
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="productTable">
                <?php
                include('database/dbConnect.php');
                $sqlSelect = "SELECT * FROM produits";
                $result = mysqli_query($conn,$sqlSelect);
                while($data = mysqli_fetch_array($result)){
                ?>
                    <tr data-id="<?php echo $data['id']; ?>">
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['ref']; ?></td>
                        <td><?php echo $data['designation']; ?></td>
                        <td><?php echo $data['type']; ?></td>
                        <td><?php echo $data['disponibilite']; ?></td>
                        <td>
                            <button class="btn btn-info btn-more mx-1">Plus</button>
                            <button class="btn btn-edit mx-1">Modifier</button>
                            <button class="btn btn-delete mx-1">Supprimer</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-4">
                <a href="interface/ajouterProduit.php" class="btn btn-add mx-1">Ajouter Produit</a>
                <a href="interface/RechercherProduit.php" class="btn btn-secondary mx-1">Rechercher</a>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const productTable = document.getElementById('productTable');

            productTable.addEventListener('click', (event) => {
                if (event.target.tagName === 'BUTTON') {
                    const row = event.target.closest('tr');
                    const productId = row.getAttribute('data-id');
                    
                    if (event.target.classList.contains('btn-more')) {
                        window.location.href = `interface/detailsProduit.php?id=${productId}`;
                    } else if (event.target.classList.contains('btn-edit')) {
                        window.location.href = `interface/modifierProduit.php?id=${productId}`;
                    } else if (event.target.classList.contains('btn-delete')) {
                        if (confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
                            window.location.href = `database/crudProduit.php?id=${productId}`;
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
