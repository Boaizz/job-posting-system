<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Job Vacancy System</title>
	<meta name="description" content="assignment1">
	<meta name="keywords" content ="">
	<meta name="Dang Khanh Toan Nguyen" content="103797499">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
</head>
<body>
<?php include 'components/navbar.php'; ?>
    <div class="container">
            <div class="card customStyle-card-form">
                <div class="card-body">
                <h5 class="card-title"><i class="bi bi-person"></i>Post a Job</h5>
                <form class="row mt-3" action="postjobprocess.php" method="POST">
                    <div class="col-md-4">
                        <label for="position_id">Position ID:</label>
                        <input type="text" name="position_id" pattern="PID\d{4}"><br>
                    </div>
                    <div class="col-md-8">
                        <label for="title">Title:</label>
                        <input type="text" name="title" maxlength="20" pattern="[A-Za-z0-9\s,.!]+"><br>
                    </div>
                    <div class="col-md-12">
                        <label for="description">Description:</label>
                        <textarea name="description" rows="4" maxlength="250"></textarea><br>
                    </div>
                    <div class="col-md-4">
                        <label for="closing_date">Closing Date:</label>
                        <input type="text" name="closing_date" value="<?php echo date('d/m/y'); ?>"><br>
                    </div>
                        <div class="col-md-12">
                            <label for="position">Position:</label>
                            <input type="radio" name="position" value="Full Time"> Full Time
                            <input type="radio" name="position" value="Part Time"> Part Time<br>
                        </div>
                        <div class="col-md-12">
                            <label for="contract">Contract:</label>
                            <input type="radio" name="contract" value="On-going">On-going
                            <input type="radio" name="contract" value="Fixed term">Fixed term<br>
                        </div>
                    <div class="col-md-12">
                        <label>Application by:</label>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="post" value="Post">Post
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="email" value="Email">Mail
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="location">Location:</label>
                        <select name="location">
                            <option value="">---</option>
                            <option value="ACT">ACT</option>
                            <option value="NSW">NSW</option>
                            <option value="NT">NT</option>
                            <option value="QLD">QLD</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="VIC">VIC</option>
                            <option value="WA">WA</option>
                        </select><br>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="reset" name="reset" value="Reset" class="btn btn-secondary">
                    </div>
                </form>
                </div>
            </div>
       
        <br>
        <a href="index.php">Return to Home</a>
    </div>
    
</body>
<?php include 'components/footer.php'; ?>
</html>