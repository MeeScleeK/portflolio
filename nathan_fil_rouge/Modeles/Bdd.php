<?php
/**
Le mot-clé 'abstract' avant le mot 'class' permet de définir une classe
abstraite. 
1. Une classe abstraite ne peut être instanciée (on ne peut pas écrire
    $bdd = new Bdd; )
2. Dans une classe abstraite, on peut définir des méthodes abstraites.
    Ces méthodes n'auront pas de code, juste une définition.
        ex: public function test(arg1, arg2);
    Il n'y a pas {} et il y a un ; après les () de la méthode abstraite.
    - Toutes les classes qui héritent d'une classe abtraite doivent 
    implémenter les méthodes abstraites définies dans la classe mère.
    (implémenter = fournir du code à cette méthode)

 */
namespace Modeles;
use PDO;
use Modeles\Entites\form;  // avec 'use', on définit un alias à la classe Modeles\Entites\form

abstract class Bdd {
    public static function pdo()
    {
        return new \PDO("mysql:host=127.0.0.1:3306;dbname=formulaire_de_contact", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT ]);
    }

    public static function select(string $table){
        $pdostatement = self::pdo()->query("SELECT * FROM $table");
        var_dump($pdostatement);
        return $pdostatement->fetchAll(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table) );       
    }

    public static function selectById(string $table, int $id)
    {
        $pdostatement = self::pdo()->query("SELECT * FROM $table WHERE id = " . $id);
        var_dump($pdostatement);
        $pdostatement->setFetchMode(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table));
        return $pdostatement->fetch();
    }

    public static function insertLivre(form $livre)
    {
        $texteRequete = "INSERT INTO form (nom, prenom, email, telephone, message) 
                         VALUES (:nom, :prenom, :email, :telephone, :message)";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":nom",  $livre->getNom());
        $pdostatement->bindValue(":prenom", $livre->getPrenom());
        $pdostatement->bindValue(":email", $livre->getEmail());
        $pdostatement->bindValue("telephone", $livre->getTelephone());
        $pdostatement->bindValue(":message", $livre->getMessage());
        
        return $pdostatement->execute();
    }


    public static function deleteLivre(form $livre)
    {
        return self::pdo()->exec("DELETE FROM form WHERE id = " . $livre->getId());
    }
}