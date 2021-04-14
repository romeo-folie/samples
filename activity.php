<?php
    require_once("vendor/autoload.php");

    /* 
    Model an abstract Activity class that allows mutation and fetching of an Activity resource from a data store, 
    your class should define contracts for basic fetch and mutate functionality. 
    Then define an implementation of the abstraction. 
    Use a Map as your data store
    */

    abstract class Activity {
        protected $data = [];

        public function __construct($data){
            $this->data = new \Ds\Map($data);
        }

        public function printData(){
            foreach($this->data as $key => $value){
                echo "{$key} - {$value} \n";
            }
        }

        // define contracts for basic fetch and mutate functionality
        abstract public function all() : Ds\Sequence; 
        abstract public function get($key);
        abstract public function add($key, $value);
        abstract public function delete($key) : bool;
    }

    class ActivityImpl extends Activity {
        public function all() : Ds\Sequence {
            return $this->data->pairs();
        }

        public function get($key) {
            return $this->data->get($key);
        }

        public function add($key, $value) {
            $this->data->put($key, $value);
            return $this->data->get($key);
        }

        public function delete($key) : bool {
            $this->data->remove($key);
            return $this->data->hasKey($key);
        }
    }

    $sampleData = array("eating" => "daily", "climbing" => "twice yearly", "coding" => "daily");
    $act = new ActivityImpl($sampleData);
    // print_r($act->add("walking", "thrice weekly"));
    // var_dump($act->delete("climbing"));
    // print_r($act->get("coding"));
    // print_r($act->all());
    // $act->printData();
?>