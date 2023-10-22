<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Using PHP variables, Arrays and Operators</title>
    <meta name="description" content="assignment1">
    <meta name="keywords" content="">
    <meta name="Dang Khanh Toan Nguyen" content="103797499">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include 'components/navbar.php'; ?>
    <div class="container">
        <div class="card customStyle-card-form">
        <h5 class="card-title"><i class="bi bi-search"></i>Search a Job</h5>
            <form class="row mt-3" action="searchjobprocess.php" method="GET">
                <div class="col-md-8">
                    <label for="title">Job Title:</label>
                    <input class="form-control" type="text" name="search_title" id="title" size="20"/>
                </div>
                <div class="col-md-5">
                    <label for="full-time">Employment type:(Optional)</label><br />

                    <input type="radio" value="Full Time" name="position" id="full-time" class="mr-1">Full Time

                    <input type="radio" value="Part Time" name="position" id="part-time" class="ml-3 mr-1">Part Time
                </div>
                <div class="col-md-5">
                    <label for="contract">Contract:(Optional)</label><br>
                    <input type="radio" name="contract" value="On-going" class="mr-1">On-going
                    <input type="radio" name="contract" value="Fixed term" class="ml-3 mr-1">Fixed term<br>
                </div>
                <div class="col-md-5">
                    <label for="post">Application Type:(Optional)</label><br>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" value="Post" name="application[]" id="post" class="form-check-input">Post
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" value="Email" name="application[]" id="email" class="form-check-input">Email
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="location">Location:(Optional)</label>
                    <select class="form-control" id="location" name="location">
                        <option value="">---</option>
                        <option value="ACT">ACT</option>
                        <option value="NSW">NSW</option>
                        <option value="NT">NT</option>
                        <option value="QLD">QLD</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="VIC">VIC</option>
                        <option value="WA">WA</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="submit" name="searchButton" class="btn btn-primary">Search <i class="bi bi-search"></i></button>
                    <input type="reset" name="reset" value="Reset" class="btn btn-secondary">
                </div>
            </form>
            <br>
        </div>
        <br>
        <a href="index.php">Return to Home</a>
    </div>
</body>
<?php include 'components/footer.php'; ?>
</html>
