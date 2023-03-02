<?php if(isset($erreurs)) : ?>
    <?php foreach($erreurs as $champ => $message): ?>
        <div class="alert alert-danger"><?= $champ ?> : <?= $message ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Entre vos informations </h1>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nom">entrez votre Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" required
                value="<?= !empty($livre) ? $livre->getNom() : "" ?>">
    </div>

    <div class="form-group">
        <label for="prenom">entrez votre Prenom</label>
        <input type="text" name="prenom" id="prenom" class="form-control" required
                value="<?= $livre->getPrenom() ?? "" ?>">
    </div>
 
    <div class="form-group">
        <label for="email">Entrez votre Email</label>
        <input type="text" name="email" id="email" class="form-control" required
                value="<?= $livre->getEmail() ?? "" ?>">
    </div>
    <div class="form-group">
        <label for="telephone">Entrez votre Telephone</label>
        <input type="text" name="telephone" id="telephone" class="form-control" required
                value="<?= $livre->getTelephone() ?? "" ?>">
    </div>
 
    <div class="form-group">
        <label for="message">Message facultatif</label>
        <textarea name="message" id="message"  class="form-control"><?= $livre->getMessage() ?? "" ?></textarea>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-secondary">Effacer</button>
    </div>
</form>
