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

        public function printData(){
            foreach($this->data as $item => $value){
                echo "{$item} - {$value} \n";
            }
        }

        // define contracts for basic fetch and mutate functionality
        abstract public function getActivities() : iterable;
        abstract public function getActivity($key);
        abstract public function addActivity($key, $value);
        abstract public function deleteActivity($key): iterable;
    }

    class ActivityImpl extends Activity {
        public function getActivities(): iterable {
            return $this->data;
        }

        public function getActivity($key) {
            return $this->data[$key];
        }

        public function addActivity($key, $value) {
            $this->data[$key] = $value;
            return $this->data;
        }

        public function deleteActivity($key): iterable {
            unset($this->data[$key]);
            return $this->data;
        }
    }

    $sampleData = array("eating" => "daily", "climbing" => "twice yearly", "coding" => "daily");
    $act = new ActivityImpl($sampleData);
    $act->addActivity("walking", "thrice weekly");
    // print_r($act->deleteActivity("climbing"));
    // print_r($act->getActivity("coding"));
    // print_r($act->getActivities());
    // $act->printData();
?>