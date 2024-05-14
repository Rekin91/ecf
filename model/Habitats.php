<?php

class habitats {
    private int $id;
    private string $name;
    private string $description;
    private string $avis;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getDescriptions()
    {
        return $this->description;
    }
 
    public function setDescriptions($descriptions)
    {
        $this->description = $descriptions;

        return $this;
    }
    public function getAvis()
    {
        return $this->avis;
    }
    public function __construct(int $id, string $name, string $description, string $avis) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->avis = $avis;
}
}
;
?>