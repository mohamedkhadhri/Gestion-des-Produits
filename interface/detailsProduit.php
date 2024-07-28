<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/styleDetails.css">
    <title>Détails Produit</title>
    
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="content">
        <div class="container my-4">
            <header class="d-flex justify-content-between my-4">
                <h1>Détails Produit</h1>
                <div>
                    <a href="../index.php" class="btn btn-primary">Retour</a>
                </div>
            </header>
            <div class="book-details p-5 my-4">
                <?php
                include("../database/dbConnect.php");
                $id = $_GET['id'];
                if ($id) {
                    $sql = "SELECT * FROM produits WHERE id = $id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                     ?>
                     <h3>Référence :</h3>
                     <p><?php echo $row["ref"]; ?></p>
                     <h3>Désignation :</h3>
                     <p><?php echo $row["designation"]; ?></p>
                     <h3>Disponibilité :</h3>
                     <p><?php echo $row["disponibilite"]; ?></p>
                     <h3>Type :</h3>
                     <p><?php echo $row["type"]; ?></p>
                     <?php
                    }
                } else {
                    echo "Produit introuvable.";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
