<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/styleModefier.css">
    <title>Modifier Produit</title>
    
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="content">
        <div class="container my-5">
            <header class="d-flex justify-content-between my-4">
                <h1>Modifier Produit</h1>
                <div>
                    <a href="../index.php" class="btn btn-primary">Retour</a>
                </div>
            </header>
            <form action="../database/crudProduit.php" method="post">
                <?php
                include("../database/dbConnect.php");
                $id = $_GET['id'];
                if ($id) {
                    $sql = "SELECT * FROM produits WHERE id = $id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="ref" value="<?php echo $row['ref']; ?>">
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="designation" value="<?php echo $row['designation']; ?>">
                </div>
                <div class="form-element my-4">
                    <select name="type" class="form-control">
                        <option value="GSM" <?php if($row['type'] == 'GSM') echo 'selected'; ?>>GSM</option>
                        <option value="PC" <?php if($row['type'] == 'PC') echo 'selected'; ?>>PC</option>
                        <option value="electromenager" <?php if($row['type'] == 'electromenager') echo 'selected'; ?>>Électroménager</option>
                        <option value="TV" <?php if($row['type'] == 'TV') echo 'selected'; ?>>TV</option>
                    </select>
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="disponibilite" value="<?php echo $row['disponibilite']; ?>">
                </div>
                <div class="form-element my-4">
                    <input type="submit" name="edit" value="Modifier Produit" class="btn btn-primary">
                </div>
                <?php
                    }
                } else {
                    echo "Produit introuvable.";
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
