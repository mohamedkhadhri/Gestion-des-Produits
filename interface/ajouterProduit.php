<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/styleAjouter.css">
    <title>Ajouter Produit</title>
   
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="content">
        <div class="container my-5">
            <header class="d-flex justify-content-between my-4">
                <h1>Ajouter Produit</h1>
                <div>
                    <a href="../index.php" class="btn btn-primary">Retour</a>
                </div>
            </header>
            <form action="../database/crudProduit.php" method="post">
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="ref" placeholder="Référence">
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="designation" placeholder="Désignation">
                </div>
                <div class="form-element my-4">
                    <select name="type" class="form-control">
                        <option value="">Choisir type</option>
                        <option value="GSM">GSM</option>
                        <option value="PC">PC</option>
                        <option value="electromenager">Électroménager</option>
                        <option value="TV">TV</option>
                    </select>
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="disponibilite" placeholder="Disponibilité">
                </div>
                <div class="form-element my-4">
                    <input type="submit" name="create" value="Ajouter Produit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
