<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Job Vacancy System</title>
    <meta name="description" content="assignment1">
    <meta name="keywords" content="">
    <meta name="Dang Khanh Toan Nguyen" content="103797499">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include 'components/navbar.php'; ?>
    <div class="container mt-5">
        <div class="card customStyle-card-form">
        <?php
        include("function.php");
        // File path directory
        $dir = "../../data/jobposts/";
        $file_name = "jobs.txt";
        $file_path = $dir . $file_name;

        // Creating directory and file if not exist
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        if (!file_exists($file_path)) {
            $new_file = fopen($file_path, "w");
            if ($new_file) {
                fclose($new_file);
                echo "<p class='alert alert-success'>File created!</p>";
            } else {
                echo "<p class='alert alert-danger'>Error in creating file!</p>";
            }
        }
        if (
            isset($_POST['position_id']) &&
            isset($_POST['title']) &&
            isset($_POST['description']) &&
            isset($_POST['closing_date']) &&
            isset($_POST['position']) &&
            isset($_POST['contract']) &&
            (isset($_POST['post']) || isset($_POST['email'])) &&
            isset($_POST['location'])
        ) {
            // Sanitize input data
            $position_id = sanitizeInput($_POST['position_id']);
            $title = sanitizeInput($_POST['title']);
            $description = sanitizeInput($_POST['description']);
            $closing_date = sanitizeInput($_POST['closing_date']);
            $position = sanitizeInput($_POST['position']);
            $contract = sanitizeInput($_POST['contract']);
            if (!empty($_POST['email']) && !empty($_POST['post'])) {
                $application_by = $_POST['email'] . ', ' . $_POST['post'];
            } else if (!empty($_POST['email'])) {
                $application_by = $_POST['email'];
            } else if (!empty($_POST['post'])) {
                $application_by = $_POST['post'];
            }
            $location = sanitizeInput($_POST['location']);
            $valid = true;

            // Check valid positionID
            if (!preg_match('/^PID\d{4}$/', $position_id)) {
                echo "<p class='alert alert-danger'>PositionID invalid!</p>";
                $valid = false;
            }

            // Check valid title
            if ((!preg_match('/^[a-zA-Z0-9 ,.!]{1,20}$/', $title)) && (empty($title))) {
                echo "<p class='alert alert-danger'>Title invalid!</p>";
                $valid = false;
            }

            // Check valid description
            if (empty($description) || strlen($description) > 250) {
                echo "<p class='alert alert-danger'>Description invalid!</p>";
                $valid = false;
            }

            // Validate date format
            if (!preg_match('/^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{2}$/', $closing_date)) {
                echo "<p class='alert alert-danger'>Invalid date format. Please use dd/mm/yy format.</p>";
                $valid = false;
            }

            if ($valid) {
                // Create the job record
                $job_record = "$position_id\t$title\t$description\t$closing_date\t$position\t$contract\t$application_by\t$location\n";
                // Check if the positionID is used or not, then write the job record to jobs.txt
                if (isUniqueID($file_path, $position_id)) {
                    file_put_contents($file_path, $job_record, FILE_APPEND);
                    echo "<p class='alert alert-success'>Job vacancy saved successfully!</p>";
                } else {
                    echo "<p class='alert alert-danger'>Position ID already in use.</p>";
                }
            } else {
                // Validation failed
                echo "<p class='alert alert-danger'>Validation failed. The job vacancy was not saved.</p>";
            }
        } else {
            echo "<p class='alert alert-warning'>All fields are required. Please fill out all fields.</p>";
        }
        

        echo '<a href="postjobform.php">Return to Post Job Vacancy page</a>'; 
        echo '<a href="index.php">Return to Home</a>';
        ?>
        </div>
    </div>
</body>
<?php include 'components/footer.php'; ?>
</html>
