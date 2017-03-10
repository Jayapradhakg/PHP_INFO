<?php
define('BR', "<BR>\r\n");


/**
 * Class PerformanceCalcException
 * - Used to throw exception
 */
class PerformanceCalcException extends Exception {}

/**
 * Class PerformanceCalc
 *  - Used to compare 2 different PHP built-in functionalities
 *
 */
class PerformanceCalc {
    static public $iteration = 100000;
    static private $record_time = array();
    static private $per_iteration_record_time = array();
    static private $counter_iterator = array();
    static public function recordTime($string_name = 'test', $time){
        if(isset(self::$record_time[$string_name])) {
            self::$per_iteration_record_time[$string_name][self::$counter_iterator[$string_name]++] = $time - self::$record_time[$string_name];
            unset(self::$record_time[$string_name]);
        }else {
            if(! isset(self::$counter_iterator[$string_name])) {
                self::$counter_iterator[$string_name] = 0;
            }
            self::$record_time[$string_name] = $time;
        }
        return;
    }

    static public function summary(){
        if(empty(self::$per_iteration_record_time)) {
            throw new PerformanceCalcException(" Called Summary Before recording the time taken by functions");
        }
        if(count(self::$per_iteration_record_time) == 1) {
            echo "Can't compare as there is no other functionality" . BR;
            echo "statics for 1 function given below " . BR;
        }
        /*
         * Average Time taken by each functionality
         */
        foreach(self::$per_iteration_record_time as $string_name => $array) {
            $avg_time_taken[$string_name] = 0;
            $time_taken[$string_name] = 0;
           foreach($array as $key => $value){
               $time_taken[$string_name] = $time_taken[$string_name] + $value;
           }
            $avg_time_taken[$string_name] = $time_taken[$string_name]/self::$iteration;

            echo "Avg time taken by " . $string_name . " : "  . $avg_time_taken[$string_name] . BR;
            echo "Total time taken by " . $string_name . " : "  . $time_taken[$string_name] . BR;

        }

        /*
         * which one of these is quicker
         */
        if(count(self::$per_iteration_record_time) > 1){
            foreach($time_taken as $string_name => $value) {
                echo " Comparison : " . $string_name . BR;
                foreach($time_taken as $string_to_comp => $value_to_comp){
                    if(!strcmp($string_name, $string_to_comp) ) {
                        if($value > $value_to_comp) {
                            echo $string_name . ' is quicker by '. ($value - $value_to_comp ).BR;
                        }else {
                            echo $string_to_comp . ' is quicker by '.($value_to_comp - $value).BR;
                        }
                    }
                }
            }
        }
        return;
    }

    static public function printDetailIterationRecordTime($string_name = null){
        if(is_null($string_name)) {
            echo print_r(self::$per_iteration_record_time, true);
        }else {
            if(isset(self::$per_iteration_record_time[$string_name])){
                echo print_r(self::$per_iteration_record_time[$string_name], true);
            }else {
                throw new PerformanceCalcException("Invalid String_name" . $string_name);
            }
        }
        return ;
    }

}
try {
    echo 'Performance Testing PHP if / else VS switch with 100,000 iterations'.BR.BR;

    for ($x = 0; $x < PerformanceCalc::$iteration; $x++) {
        $arg_value = rand(1,5);
        if (0 == fmod($x,2)) {
            testSwitch($arg_value);
            testIf($arg_value);
        } else {
            testIf($arg_value);
            testSwitch($arg_value);
        }
    }

//    PerformanceCalc::printDetailIterationRecordTime();
    PerformanceCalc::summary();
}
catch(Exception $e) {
    echo print_r($e->getTraceAsString());
}

function testSwitch($arg_value) {
    PerformanceCalc::recordTime(__FUNCTION__, microtime(true));

    switch($arg_value) {
        case 1: $output = 1; break;
        case 2: $output = 2; break;
        case 3: $output = 3; break;
        case 4: $output = 4; break;
        case 5: $output = 5; break;
    }
    PerformanceCalc::recordTime(__FUNCTION__, microtime(true));
    return;
}

function testIf($arg_value) {
    PerformanceCalc::recordTime(__FUNCTION__, microtime(true));
    if (1 == $arg_value) {
        $output = 1;
    } elseif(2 == $arg_value) {
        $output = 2;
    } elseif(3 == $arg_value) {
        $output = 3;
    } elseif(4 == $arg_value) {
        $output = 4;
    } elseif(5 == $arg_value) {
        $output = 5;
    }
    PerformanceCalc::recordTime(__FUNCTION__, microtime(true));
    return ;
}

?>