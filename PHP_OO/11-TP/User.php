<?php

class User
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $tel;
    private $errors = [];

    const NOM_INVALIDE = 1;
    const PRENOM_INVALIDE = 2;
    const EMAIL_INVALIDE = 3;
    const TEL_INVALIDE = 4;



    public function __construct($data = [])
    {
        $this->hydratation($data);
    }

    public function hydratation($data)
    {
        foreach ($data as $key => $value) {

            $setter = "set" . ucfirst($key);

            if (method_exists($this, $setter)) {

                $this->$setter($value);
            }
        }
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        if (!empty($id)) {
            $this->id = $id;
        }
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        if (!is_string($nom) || empty($nom)) {
            $this->errors[] = self::NOM_INVALIDE;
        } else {
            $this->nom = $nom;
        }
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        if (!is_string($prenom) || empty($prenom)) {
            $this->errors[] = self::PRENOM_INVALIDE;
        } else {
            $this->prenom = $prenom;
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

 
    public function setEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            $this->errors[] = self::EMAIL_INVALIDE;
        }
    }

 
    public function getTel()
    {
        return $this->tel;
    }


    public function setTel($tel)
    {
        if (!is_string($tel) || empty($tel)) {
            $this->errors[] = self::TEL_INVALIDE;
        } else {
            $this->tel = $tel;
        }
    }


    public function getErrors()
    {
        return $this->errors;
    }

    public function isValid()
    {
        return !(empty($this->nom) || empty($this->prenom) || empty($this->email));
    }
}
