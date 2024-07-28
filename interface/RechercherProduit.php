<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/styleRechercher.css">
    <title>Rechercher Produit</title>
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="content">
        <div class="container my-5">
            <header class="d-flex justify-content-between my-4">
                <h1>Rechercher Produit</h1>
                <div>
                    <a href="../index.php" class="btn btn-primary">Retour</a>
                </div>
            </header>
            <form action="rechercherProduit.php" method="get">
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="search" placeholder="Rechercher par Référence" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                </div>
                <div class="form-element my-4">
                    <input type="submit" value="Rechercher" class="btn btn-primary">
                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Référence</th>
                        <th>Désignation</th>
                        <th>Type</th>
                        <th>Disponibilité</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include('../database/dbConnect.php');
                if (isset($_GET['search'])) {
                    $search = mysqli_real_escape_string($conn, $_GET['search']);
                    $sqlSelect = "SELECT * FROM produits WHERE ref LIKE '%$search%'";
                } else {
                    $sqlSelect = "SELECT * FROM produits";
                }
                $result = mysqli_query($conn, $sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
                    $rowClass = '';
                    if (isset($_GET['search']) && stripos($data['ref'], $_GET['search']) !== false) {
                        $rowClass = 'found';
                    }
                    echo '<tr class="' . $rowClass . '">';
                    echo '<td>' . $data['id'] . '</td>';
                    echo '<td>' . $data['ref'] . '</td>';
                    echo '<td>' . $data['designation'] . '</td>';
                    echo '<td>' . $data['type'] . '</td>';
                    echo '<td>' . $data['disponibilite'] . '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
