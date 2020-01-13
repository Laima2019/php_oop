<?php


//namespace App\Drink;


class Drink
{
    private $data;
    private $properties = [
        'name',
        'amount',
        'abarot',
        'image'
    ];

    /**
     * @param mixed $data
     *  : void nera return, tas pats, kad nieko neuzrasyta
     */
    public function setName(string $name): void
    {
        $this->data['name'] = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->data['name'];
    }
    public function setAmount(int $amount_ml): self{
        $this->data['amount'] = $amount_ml;
        return $this;
    }
    public function getAmount(){
        return $this->data['amount'];
    }
    public function setAbarot(float $abarot): self{
        $this->data['abarot'] = $abarot;
    }
    public function getAbarot(){
        return $this->data['abarot'];
    }
    public function setImage(string $url){
        $this->data['image'] = $url;
    }
    public function getImage(){
        return $this->data['image'];
    }

    // Note bene kiekvienai klasei turi buti savas konstruktorius, bet gali konstruktoriaus ir nebuti

// funkcija ikelia duomenis i areju $data
    public function setData(array $data){
        var_dump($data);
        foreach ($this->properties as $property){
            if(isset($data[$property])){
                // naujas sukurtas kintamasis $value yra Svyturys, duomenu masyve indeksu name 62 eilute
                // kintamasis value igyja kita verte kiekvieno foreacho metu t.y. antro foreacho metu
                // bus 4 (nes indeksas amount, trecio foreacho - 7 (abarot)
                $value = $data[$property];
               var_dump($property);
               // $setter , jeigu yra _, ji sunaikina '_'replasina stringa pvz name i setName, public function setName
                // kito ciklo metu amount i setamount ....
                $setter = str_replace('_', '',  'set' .$property);
                var_dump($setter);
                $this->{$setter}($value);
            }
            // kiek kartu ciklas suksis tiek vard'um bus kvieciant var 63 eilute 4
//            var_dump($data);
        }
     }
    public function getData(): array{
        $data =[];
        foreach ($this->properties as $property){
            $getter = str_replace('_', '',  'get' .$property);
$data[$property] = $this->getter();
        }
        return $data;
    }
}