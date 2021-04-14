<?php
    require_once("vendor/autoload.php");

    /* 
    Model an abstract Activity class that allows mutation and fetching of an Activity resource from a data store, 
    your class should define contracts for basic fetch and mutate functionality. 
    Then define an implementation of the abstraction. 
    Use a Map as your data store
    */

    abstract class Activity {
        public $data = [];

        public function __construct($data){
            $this->data = new \Ds\Map($data);
        }

        public function printData(){
            foreach($this->data as $item => $value){
                echo "{$item} - {$value} \n";
            }
        }

        // define contracts for basic fetch and mutate functionality
        abstract public function get() : Ds\Sequence;
        abstract public function add($key, $value);
        abstract public function delete($key) : bool;
    }

    class ActivityImpl extends Activity {
        public function get() : Ds\Sequence {
            return $this->data->pairs();
        }

        public function add($key, $value) {
            $this->data[$key] = $value;
            return $this->data[$key];
        }

        public function delete($key) : bool {
            unset($this->data[$key]);
            return $this->data->hasKey($key) ? false : true;
        }
    }

    $sampleData = array("eating" => "daily", "climbing" => "twice yearly", "coding" => "daily");
    $act = new ActivityImpl($sampleData);
    // print_r($act->add("walking", "thrice weekly"));
    // var_dump($act->delete("climbing"));
    // var_dump($act->get());
    // $act->printData();
?>