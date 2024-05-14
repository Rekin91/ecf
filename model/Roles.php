<?php
class roles {
private int $id;
private string $label;



public function getId()
{
return $this->id;
}

 
public function getLabel()
{
return $this->label;
}


public function setLabel($label)
{
$this->label = $label;

return $this;
}
}

