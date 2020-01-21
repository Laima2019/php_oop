<?php

namespace Core;

class FileDB
{

    private $file_name;
    private $data;

    public function __construct($file_name)
    {
        $this->file_name = $file_name;
        $this->load();
    }

    /**
     * returnina visus duomenis gauti duomenis, grazins areju arba null
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    //is pradziu paduodame duomenis setData


    public function setData($data)
    {
        $this->data = $data;
    }



    /** tada galima duomenis uzsaugoti
     * @return bool
     */
    public function save()
    {
        $encoded_array = json_encode($this->data);
        $bytes_written = file_put_contents($this->file_name, $encoded_array);
        if ($bytes_written !== false) {
            return true;
        }

        return false;
    }

    // tuomet duomenis galima pasiekti

    public function load()
    {
        if (file_exists($this->file_name)) {
            $this->data = json_decode(file_get_contents($this->file_name), true);
        } else {
            $this->data = [];
        }
    }



    /**sukuriame nauja lentele, pries tai patikrine gal ji jau egzistuoja
     * @param $table_name
     * @return bool
     */
    public function createTable(string $table_name)
    {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    /**
     * @param $table_name
     * @return bool
     */
    public function tableExists($table_name)
    {
        if (isset($this->data[$table_name])) {
            return true;
        }

        return false;
    }

    // istriname visa lentele is $this->$data  (kai dedame $this pasiekiame properties)

    /**
     * @param $table_name
     * @return bool
     */
    public function dropTable($table_name)
    {
        if ($this->tableExists($table_name)) {
            unset($this->data[$table_name]);
            return true;
        }
        return false;
    }

    // istriname duomenis is lenteles, bet paliekame pacia lentele
    public function truncateTable($table_name)
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }
    // si funkcija i pasirinkta Table, nauju ar nurodytu indeksu ideda row masyva
    // irasyti eilutes masyva $row i table $row+id = null, jeigu kvieciant funkcija nepaduosime
    // trecio paramentro, tai jis bus null, tokia israiska reiskia default
    // jeigu null istatysime i if () jis nesuveiks
    public function insertRow($table_name, $row, $row_id = null)
    {
        if ($row_id) {
            if (!($this->rowExists($table_name,$row_id ))) {
                $this->data[$table_name][$row_id] = $row;
                return $row_id;
            } else {
                return false;
            }
        } else {
            $this->data[$table_name][] = $row;

            // funkcija array_key_last randa paskutini indeksa, bet sioje vietoje parodo kokiu indeksu irase
            // realiai si funkcija zemiau veikia tik storm aukstesnia versija
//            return array_key_last($this->data[$table_name]);
            return array_keys($this->data[$table_name])[count($this->data[$table_name])-1];
        }
    }

    /** ar aplamai egzistuoja tokia eilute
     * @param string $table_name
     * @param int $row_id
     * @return bool
     */
    public function rowExists(string $table_name, int $row_id){
        if(isset($this->data[$table_name][$row_id])){
            return true;
        }
        return false;
    }

    /** i pasirinktos lenteles i pasirinkta  indeksa iraso naujus duomenis nauji duomenis bus array$row
     * @param string $table_name
     * @param int $row_id
     * @param array $row
     * @return int|null
     */
    public function updateRow(string $table_name, int $row_id, array $row): ?int {
        if ($this->rowExists($table_name,$row_id)) {
            $this->data[$table_name][$row_id] = $row;
            return true;
        }
        return false;
    }

    /** istriname visos eilutes duomenis
     * @param string $table_name
     * @param int $row_id
     * @return bool
     */
    public function deleteRow(string $table_name, int $row_id) {
        if ($this->rowExists($table_name,$row_id )) {
            // istriname eilutes duomenis, bet paliekame eilutes indeksa:
            $this->data[$table_name][$row_id] = [];
            //istrins visa eilute su visu indeksu:
            unset($this->data[$table_name][$row_id]);
            return true;
        }
        return false;
    }


    /** grazina eilute is table pagal $row_id
     * @param string $table_name
     * @param int $row_id
     * @return bool
     */
    public function getRow(string $table_name, int $row_id) {
        if ($this->rowExists($table_name,$row_id )) {
            return
            $this->data[$table_name][$row_id];

        }
        return false;
    }
    //$conditions arejus kuriame t.b. vardas ir paswordas, arba duomenu bazeje $data, lenteleje
    // getRowWhere esme surasti eilutes pagal kazkokius conditions, ji isfiltruoja ir grazina
    public function getRowsWhere($table_name, array $conditions) {
        $results =[];
        foreach ($this->data[$table_name] as $row_id => $row) {
            $found = true;
            foreach ($conditions as $condition_key => $condition_value) {
                // $row_value visiskai naujas variablas  ji sukuriame ir jam priskiriame $row[$condition_key]
               // t.y. vardas , t.y Alius
                $row_value = $row[$condition_key];
// jeigu zemiau: alius nera alius
                if($row_value != $condition_value) {
                    $found = false;
                    break;
                 }
            }
            if ($found == true) {
                // rezultatus deda automatiniu indeksu $results[] =$row; o reikia, kad konkreciu

                $results[$row_id] =$row;
            }
        }
        return $results;
    }

    /**
     * __destruct iskviecia sistema , t.y automatiskai,
     * 1 kai pasibaigia kodas,
     * 2 kai buna funkcijos viduje sukurtas ojektas, ir kai pasibaigia pati funkcija
     * 3 unset
     */
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->save();
    }
}

