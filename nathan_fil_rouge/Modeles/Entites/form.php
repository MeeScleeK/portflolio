<?php
namespace Modeles\Entites;
class form {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $message;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        if(is_numeric($id)){
            $this->id = $id;
        }
  

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    /**
     * Get the value of nom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    /**
     * Get the value of nom
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    /**
     * Get the value of nom
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }


    /**
     * Get the value of nom
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}