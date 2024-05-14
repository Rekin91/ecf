<?php
class historiques {
private int $id;
private int $id_Animal;
private string $date;
private string $details;

 
public function getDate()
{
return $this->date;
}


public function setDate($date)
{
$this->date = $date;

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
}
