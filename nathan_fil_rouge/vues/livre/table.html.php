<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Message</th>
            <th>Supprimer</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($livres as $livre): ?>
        <tr>
            <td>
                <?= $livre->getId() ?>
            </td>
            <td>
                <?= $livre->getNom() ?>
            </td>
            <td>
                <?= $livre->getPrenom() ?>
            </td>
            <td>
                <?= $livre->getEmail() ?>
            </td>
            <td>
                <?= $livre->getTelephone() ?>
            </td>
            <td>
                <?= $livre->getMessage() ?>
            </td>

            <td>
                <a href="<?= lien("form", "supprimer", $livre->getId()) ?>">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
