<?php

class histovets {

    private int $id;
    private int $id_animal;
    private string $food;
    private int $gramfood;
    private $datepassage;
    private string $details;


    public function getId()
    {
        return $this->id;
    }
    public function getId_animal()
    {
        return $this->id_animal;
    }
    public function getFood()
    {
        return $this->food;
    }

    public function getGramfood()
    {
        return $this->gramfood;
    } 
    public function getDatepassage()
    {
        return $this->datepassage;
    }
    public function getDetails()
    {
        return $this->details;
    }


    public function __construct(int $id, int $id_animal, string $food, int $gramfood, $datepassage, string $details)
    {
        $this->id = $id;
        $this->id_animal = $id_animal;
        $this->food = $food;
        $this->gramfood = $gramfood;
        $this->datepassage = $datepassage;
        $this->details = $details;	

    }
}
