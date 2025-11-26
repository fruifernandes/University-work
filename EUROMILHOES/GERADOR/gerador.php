<?php

class Gerador
{
    // propriedades
    public $estrelas = array();
    public $numeros = array();

    // construtor
    public function __construct () {
        $this->estrelas = $this->sorteia(1,12,2);
        $this->numeros = $this->sorteia(1,50,5);
    }
    
    // metodos
    private function sorteia($min,$max,$n) {
        $chave = array();
        while(sizeof($chave) < $n) {
            $novo = rand($min,$max);
            if (!in_array($novo,$chave)) {
                $chave[] = $novo;
                //array_push($chave, $novo);
            }
        }
        sort($chave);
        return $chave;
    }

    public function asJSON() {
        return json_encode($this);
    }
}

// teste // serviço

header('Content-Type: application/json');
$novachave = new Gerador();
echo $novachave->asJSON();

?>