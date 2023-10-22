<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Job Vacancy System</title>
    <meta name="description" content="assignment1">
    <meta name="keywords" content="">
    <meta name="author" content="Dang Khanh Toan Nguyen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php include 'components/navbar.php'; ?>
    <div class="container mt-5">
    <ol>
                <li class="question">
                    What is the PHP version installed in mercury?
                </li>
                <ul>
                    <li>My PHP version is: <strong><?php echo phpversion() ?></strong>.
                    </li>
                </ul>
                <hr>
                <li class="question">
                    What tasks you have not attempted or not completed?
                </li>
                <ul>
                   <li>None</li>
                </ul>
                <hr>
                <li class="question">
                    What special features have you done, or attempted, in creating the site that we should know about?
                </li>
                <ul>
                    <li>
                        I have also added the Navbar and Footer for the website. The website is also designed to make it responsive for tablets and mobile devices.
                    </li>
                    <li>
                        I have done the <a href="searchjobform.php">search job form</a> so when the user selects any criteria, the system will exclusively search for the search term within the specified criteria. However, if the user doesn't select any criteria, the system will perform a search across all criteria for that string.
                    </li>
                </ul>
                <hr>
                <li class="question">
                    What discussion points did you participated on in the unit’s discussion board for
                    Assignment 1? If you did not participate, state your reason.
                </li>
                <ul>
                    <li>
                        <img class="image" src="./style/discussion.png" id="discussion" alt="discussion">
                    </li>
                    <li>
                    I have joined the discussion on Canvas to ask for problems related to input validation.
                    </li>
                </ul>
            </ol>
        <a href="index.php">Return to Home</a>
    </div>
</body>
</html>