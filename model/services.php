<?php
Class Services{
    private int $id;
    private string $name;
    private string $description;
    private string $horaires;

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
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    public function getHoraires()
    {
        return $this->horaires;
    }

    public function setHoraires($horaires)
    {
        $this->horaires = $horaires;

        return $this;
    }

    public function __construct(int $id, string $name, string $descriptions, string $horaires) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $descriptions;
        $this->horaires = $horaires;
}

}
