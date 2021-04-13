<?php
    /* 
    Model an abstract Activity class that allows mutation and fetching of an Activity resource from a data store, 
    your class should define contracts for basic fetch and mutate functionality. 
    Then define an implementation of the abstraction. 
    */

    abstract class Activity {
        public $data;

        public function __construct($data){
            $this->data = $data;
        }

        // define contracts for basic fetch and mutate functionality
        abstract public function getItems();
        abstract public function getItem($key);
        abstract public function addItem($key, $value);
        abstract public function deleteItem($key);
    }

    class ActivityImpl extends Activity {
        public function getItems() {
            return $this->data;
        }

        public function getItem($key) {
            return $this->data[$key];
        }

        public function addItem($key, $value) {
            $this->data[$key] = $value;
            return $this->data;
        }

        public function deleteItem($key){
            unset($this->data[$key]);
            return $this->data;
        }
    }

    $sampleData = array("gavin" => 25, "richard" => 24, "dinesh" => 35);
    $act = new ActivityImpl($sampleData);
    // print_r($act->addItem("jinyang", 22));
    // print_r($act->deleteItem("jinyang"));
    // print_r($act->getItem("gavin"));
    // print_r($act->getItems());
?>