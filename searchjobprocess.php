<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Job Vacancy System</title>
    <meta name="description" content="assignment1">
    <meta name="keywords" content="">
    <meta name="Dang Khanh Toan Nguyen" content="103797499">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include 'components/navbar.php'; ?>
    <div class="container mt-5">
        <?php
         include("function.php");

         $dir = "../../data/jobposts/";
         $file_name = "jobs.txt";
         $file_path = $dir . $file_name;


        if (file_exists($file_path)) {
            if (isset($_GET['search_title']) && !empty($_GET["search_title"])) {
                $search_title = sanitizeInput($_GET["search_title"]);
                $position = isset($_GET['position']) ? sanitizeInput($_GET['position']) : "";
                $contract = isset($_GET['contract']) ? sanitizeInput($_GET['contract']) : "";
                $application = isset($_GET['application']) ? $_GET['application'] : array();
                $location = isset($_GET['location']) ? sanitizeInput($_GET['location']) : "";

                $job_records = file($file_path, FILE_IGNORE_NEW_LINES);
                $jobs_match = array();

                foreach ($job_records as $job_record) {
                    $columns = explode("\t", $job_record);
                   
                    // Check match
                    if (
                        stripos($job_record, $search_title) !== false &&
                        (($position == '' || stripos($job_record, $position) != false)) &&
                        (($contract == '' || stripos($job_record, $contract) != false)) &&
                        (   
                            (empty($application)) ||
                            (
                                (in_array('Email', $application) && in_array('Post', $application) && in_array('Email', explode(", ", $columns[6])) && in_array('Post', explode(", ", $columns[6]))) ||
                                (in_array('Email', $application) && !in_array('Post', $application) && in_array('Email', explode(", ", $columns[6]))) ||
                                (in_array('Post', $application) && !in_array('Email', $application) && in_array('Post', explode(", ", $columns[6])))
                            )
                        ) &&
                        ($location == '' || stripos($job_record, $location) != false)
                    ) {
                            $jobs_match[] = $job_record;
                    }
                }

                //Function to sort the closing_days   
                if (!empty($jobs_match)) {   
                    $currentDate = new DateTime();
                    sortJobsByClosingDate($jobs_match);
                    echo "<h2>Search Results:</h2>";
                    foreach ($jobs_match as $job_match) {
                        $columns = explode("\t", $job_match);
                        $closingDate = DateTime::createFromFormat("d/m/y", $columns[3]);
                        if ($closingDate >= $currentDate) {
                            echo "<div class='border p-3 mb-3'>";
                            echo "<p><strong>Job Title:</strong> {$columns[1]}</p>";
                            echo "<p><strong>Job Description:</strong> {$columns[2]}</p>";
                            echo "<p><strong>Closing Date:</strong> {$columns[3]}</p>";
                            echo "<p><strong>Position:</strong> {$columns[4]}</p>";
                            echo "<p><strong>Contract:</strong> {$columns[5]}</p>";
                            echo "<p><strong>Application Type:</strong> {$columns[6]}</p>";
                            echo "<p><strong>Location:</strong> {$columns[7]}</p>";
                            echo "</div>";
                        }
                    }
                } else {
                    echo "<p class='alert alert-danger'>No matching job vacancies found.</p>";
                }
            } else {
                echo "<p class='alert alert-danger'>Error: Invalid search.</p>";
            }
        } else {
            echo "<p class='alert alert-danger'>Error: File not found!</p>";
        }

        echo '<a href="searchjobform.php">Search Again</a> ||';
        echo '<a href="index.php"> Return to Home</a>';
        ?>
    </div>
</body>
<?php include 'components/footer.php'; ?>
</html>
