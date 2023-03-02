<h1>confirmation de la suppression du contact n°<?= $livre->getId() ?></h1>

<ul class="list-group">
    <li class="list-group-item">
        <strong>Nom : </strong> <?= $livre->getNom() ?>
    </li>
    <li class="list-group-item">
        <strong>Prenom : </strong> <?= $livre->getPrenom() ?>
    </li>
    <li class="list-group-item">
        <strong>Email : </strong> <?= $livre->getEmail() ?>
    </li>
    <li class="list-group-item">
        <strong>Telephone : </strong> <?= $livre->getTelephone() ?>
    </li>
    <li class="list-group-item">
        <strong>Message : </strong> <?= $livre->getMessage() ?>
    </li>
</ul>

<form method="post">
    <div class="d-flex justify-content-between">
        <button class="btn btn-success">Confirmer</button>
        <a href="<?= lien("form", "liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>
