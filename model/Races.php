<?php
class races {
private int $id;
private string $label;

public function getId()
{
return $this->id;
}

public function setId($id)
{
$this->id = $id;

return $this;
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

public function __construct(int $id, string $label) {
    $this->id = $id;
    $this->label = $label;

}
}