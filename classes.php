<?php
// c:\xampp\php\php.exe -S localhost:8000

declare(strict_types=1); // tipos estrictos

class SuperHero
{

  // hay public y private

  // promoted properties -> PHP 8
  public function __construct(
    readonly public string $name,
    public array $powers,
    public string $planet
  ) {
  }

  // propiedades -> PHP < 8
  // public $name;
  // public $powers;
  // public $planet;

  // metodos -> PHP < 8
  // public function __construct($name, $powers, $planet)
  // {
  //   $this->name = $name;
  //   $this->powers = $powers;
  //   $this->planet = $planet;
  // }

  public function attack()
  {
    return "!$this->name ataca con sus poderes";
  }

  public function show_all() {
    return get_object_vars($this);
  }

  public function description()
  {
    $powers = implode(", ", $this->powers);  // es como el join en python
    return "$this->name es un superheroe que viene del planeta
    $this->planet y tiene los siguientes poderes: $powers";
  }

  // se llaman sin tener instancia de una clase, no pueden usar las propiedades de la clase
  // se llama asi: SuperHero::random()
  
  // public static function random() {
  // }

}

$hero = new SuperHero("Goku", ["Kamehameha, kaioken, Genkidama"], "Vegita");

// echo $hero->name;
var_dump($hero->show_all());