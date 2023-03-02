<?php

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\form;

class FormControleur {
    public function liste()
    {
        $livres = Bdd::select("form");
        
        include "vues/header.html.php";
        include "vues/livre/table.html.php";
        include "vues/footer.html.php";        
    }

    public function ajouter()
    {      if( $_POST ){

        if($_POST){
            $nom = $_POST["nom"] ?? null;
            $prenom = $_POST["prenom"] ?? null;
            $email = $_POST["email"] ?? null;
            $telephone = $_POST["telephone"] ?? null;
            $message = $_POST["message"] ?? null;
        
            if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone)) {
                if( strlen($nom) < 1 ) {
                    $erreurs["nom"] = "Vous devez obligatoirement mettre votre nom";
                }
                if( strlen($nom) > 30 ) {
                    $erreurs["nom"] = "Ce champ est limité à 30 caractères";
                }
                if( strlen($prenom) < 1 ) {
                    $erreurs["prenom"] = "Vous devez obligatoirement mettre votre prenom";
                }
                if( strlen($prenom) > 30 ) {
                    $erreurs["prenom"] = "Ce champ est limité à 30 caractères";
                }
                if( strlen($email) < 1 ) {
                    $erreurs["email"] = "Vous devez obligatoirement mettre votre email";
                }
                if( strlen($email) > 50 ) {
                    $erreurs["email"] = "Ce champ est limité à 50 caractères";
                }
                if( strlen($telephone) < 1 ) {
                    $erreurs["telephone"] = "Vous devez obligatoirement mettre votre telephone";
                }
                if( strlen($telephone) > 11 ) {
                    $erreurs["telephone"] = "Les chiffres doivent etre attachés";
                }
            } else {
                $erreurs["generale"] = "Veuillez remplir les champs requis";
            }
        
            if( empty($erreurs) ){
                $l = new form;
                $l->setNom($nom);
                $l->setPrenom($prenom);
                $l->setEmail($email);
                $l->setTelephone($telephone);
                $l->setMessage($message);
                $resultat = Bdd::insertLivre($l);
                if( $resultat ){
                    redirection("index.php?controleur=form&methode=liste");
                } else {
                    echo "Erreur SQL lors de l'insertion";
                }
            }
        
        }
        
  }
        
        
        // AFFICHAGE

        $livre = new form;
        include "vues/header.html.php";
        include "vues/livre/form.html.php";
        include "vues/footer.html.php";
    }


    public function supprimer($id)
    {

        if($id) {
            if( is_numeric($id) ) {
                $livre = Bdd::selectById("form", $id);

                if($livre) {
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        if( Bdd::deleteLivre($livre) == 1 ) {
                            redirection("index.php?controleur=form&methode=liste");
                        }
                    }
                } else {
                    redirection("index.php?controleur=form&methode=liste");
                }
            }
        }
        affichage("livre/suppression.html.php", [ "livre" => $livre ]);
    }
}