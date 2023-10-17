<?php 
include_once('qaheader.php'); ?><!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/portalheader.css">
    <link rel="stylesheet" type="text/css" href="css/createpolicy.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
    <title>Create Policy</title>
</head>

<body>
    <div class="create-policy-form">
        <h2>Create New Policy</h2>
        <form>
            <div class="form-group">
                <label for="policyTitle">Policy Title:</label>
                <input type="text" id="policyTitle" name="policyTitle" placeholder="Enter policy title" autofocus
                    required>
            </div>

            <div class="form-group">
                <label for="policyType">Policy Type:</label>
                <select id="policyType" name="policyType">
                    <option value="generic">Generic</option>
                    <option value="instructor">Student</option>
                    <option value="instructor">Instructor</option>
                    <option value="programCoordinator">Program Coordinator</option>

                </select>
            </div>

            <div class="form-group">
                <label for="policyDescription">Policy Description:</label>
                <textarea id="policyDescription" name="policyDescription" rows="8" cols="50"
                    placeholder="Enter policy description" required></textarea>
            </div>

            <button class="create-button update" type="submit">Create</button>
        </form>
    </div>


</body>

</html>
<?php 
include_once('qafooter.php'); ?>