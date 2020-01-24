<?php


namespace App\Orders;


class Order
{
    private $data;
    private $properties =
    [
    'id',
    'drink_id',
    'timestamp',
    'status'
    ];
    public function setId(int $id){
        $this->data['id'] = $id;
    }
    public function getId()
    {
        return $this->data['id'] ?? null;
    }
    public function setDrinkId(int $drink_id){
        $this->data['drinkid'] = $drink_id;
    }
    public function getDrinkId()
    {
        return $this->data['id'] ?? null;
    }
    public function setTimeStamp(int $time_stamp)
    {
        $this->data['timestamp'] = $time_stamp;
    }

    public function getTimeStamp()
    {
        return $this->data['timestamp'];
    }
    public function setStatus(string $status)
    {
        $this->data['status'] = $status;
    }

    public function getStatus()
    {
        return $this->data['status'];
    }

    // Note bene kiekvienai klasei turi buti savas konstruktorius, bet gali konstruktoriaus ir nebuti

// funkcija ikelia duomenis i areju $data
    public function setData(array $data)
    {
        // var_dump($data);
        foreach ($this->properties as $property) {
            if (isset($data[$property])) {
                // naujas sukurtas kintamasis $value yra Svyturys, duomenu masyve indeksu name 62 eilute
                // kintamasis value igyja kita verte kiekvieno foreacho metu t.y. antro foreacho metu
                // bus 4 (nes indeksas amount, trecio foreacho - 7 (abarot)
                $value = $data[$property];
                // var_dump($property);
                // $setter , jeigu yra _, ji sunaikina '_'replasina stringa pvz name i setName, public function setName
                // kito ciklo metu amount i setamount ....
                $setter = str_replace('_', '', 'set' . $property);
                // var_dump($setter);
                $this->{$setter}($value);
            }
            // kiek kartu ciklas suksis tiek vard'ump bus kvieciant var
//            var_dump($data);
        }
    }
// getData grazina masyva , si funkcija tai yra iskviecia visus geterius (get name, get amount....)
    public function getData(): array
    {
        $data = [];
        foreach ($this->properties as $property) {
            $getter = str_replace('_', '', 'get' . $property);
            $data[$property] = $this->{$getter}();
        }
        return $data;
    }
    // si funkcija zemiau tam reikalinga kai kuriant objekta, galime butu iskarta paduoti duomenis, nebereiktu set
    public function __construct(array $data = null){
        if ($data){
            return $this->setData($data);
        }
    }
}


