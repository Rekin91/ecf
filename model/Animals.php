<?php
class animals {
private int $id;
private int $id_Habitat;
private int $id_Race;
private string $name;
private string $food;
private string $etat;
private string $details;
private $datePassage;
private int $gramFood;
private string $photos;

public function getId()
{
return $this->id;
}

public function getId_Habitat()
{
return $this->id_Habitat;
}

public function getId_Race()
{
return $this->id_Race;
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
 
public function getFood()
{
return $this->food;
}

public function setFood($food)
{
$this->food = $food;

return $this;
}

public function getEtat()
{
return $this->etat;
}

public function setEtat($etat)
{
$this->etat = $etat;

return $this;
}

public function getDetails()
{
return $this->details;
}

public function setDetails($details)
{
$this->details = $details;

return $this;
}

public function getDatepassage()
{
return $this->datePassage;
}

public function setDatepassage($datepassage)
{
$this->datePassage = $datepassage;

return $this;
}
 
public function getGramfood()
{
return $this->gramFood;
}

public function setGramfood($gramfood)
{
$this->gramFood = $gramfood;

return $this;
}

public function getPhotos()
{
return $this->photos;
}

public function setPhotos($photos)
{
$this->photos = $photos;

return $this;
}

public function __construct(int $id, int $id_Habitat, int $id_Race, string $name, string $food, string $etat, ?string $details,  $datePassage, int $gramFood, ?string $photos)
{
    $this->id = $id;
    $this->id_Habitat = $id_Habitat;
    $this->id_Race = $id_Race;
    $this->name = $name;
    $this->food = $food;
    $this->etat = $etat;
    $this->details = $details ?? '';
    $this->datePassage = $datePassage;
    $this->gramFood = $gramFood;
    $this->photos = $photos ?? '';
}
    
};
?>
