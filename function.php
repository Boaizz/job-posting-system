<?php
    // Function to sanitize input data
        function sanitizeInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    // Function to check if positionID is unique
    function isUniqueID($file_name, $position_id) {
        $job_records = file_get_contents($file_name);
        $job_array = explode("\n", $job_records);
        foreach ($job_array as $job) {
            if (strncmp($job, $position_id, 7) == 0) {
                return false;
            }
        }
        return true;
    }
    // Function to sort jobs by nearest closing date
    function sortJobsByClosingDate(&$jobs) {
        $job_count = count($jobs);
        for ($i = 0; $i < $job_count - 1; $i++) {
            for ($j = 0; $j < $job_count - $i - 1; $j++) {
                $job1_closing_day = explode("\t", $jobs[$j]);
                $job2_closing_day = explode("\t", $jobs[$j + 1]);
                
                $closing_day1 = DateTime::createFromFormat("d/m/y", $job1_closing_day[3]); 
                $closing_day2 = DateTime::createFromFormat("d/m/y", $job2_closing_day[3]);
    
                if ($closing_day1 < $closing_day2) {
                    $temp = $jobs[$j];
                    $jobs[$j] = $jobs[$j + 1];
                    $jobs[$j + 1] = $temp;
                }
            }
        }
    }
   