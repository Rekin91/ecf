<?php

class opinions {
    private int $id;
    private string $pseudo;
    private string $avis;
    private int $validate;



    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
 
    public function getPseudo()
    {
        return $this->pseudo;
    }


    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getAvis()
    {
        return $this->avis;
    }
 
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    public function getValidate()
    {
        return $this->validate;
    }

    public function setValidate($validate)
    {
        $this->validate = $validate;

        return $this;
    }


    public function __construct(int $id, string $pseudo, string $avis, int $validate) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->avis = $avis;
        $this->validate = $validate;
}
}