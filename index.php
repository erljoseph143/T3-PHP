<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to Court A Girl</title>
</head>
<body>
    <?php session_start(); ?>
    <H1>How to Court a girl</H1>
    <hr>
    <form action="CourtingInProcedural.php" method="POST">
       
        <h2>Possible Men Characters that the girls want</h2>
        <hr/>
            <p>
                <input type="checkbox" name="menChar[]" id="" value="good looking" <?php echo in_array("good looking", $_SESSION['menChar']) ? 'checked' : ''; ?> />
                Good looking
            </p>
            <p>
                <input type="checkbox" name="menChar[]" id="" value="non-smoker" <?php echo in_array("non-smoker", $_SESSION['menChar']) ? 'checked' : ''; ?> >
                Non-smoker
            </p>
            <p>
                <input type="checkbox" name="menChar[]" id="" value="Gentle and slightly pervert" <?php echo in_array("Gentle and slightly pervert", $_SESSION['menChar']) ? 'checked' : ''; ?>>
                Gentle and slightly pervert
            </p>
            <p>
                <input type="checkbox" name="menChar[]" id="" value="Has a sense of humor" <?php echo in_array("Has a sense of humor", $_SESSION['menChar']) ? 'checked' : ''; ?>>
                Has a sense of humor
            </p>
        <hr/>
        <h2>Possible Men Life Status that the girls want</h2>
        <hr/>
            <p>
                <input type="checkbox" name="menLifeStat[]" id="" value="financially stable" <?php echo in_array("financially stable", $_SESSION['menLifeStat']) ? 'checked' : ''; ?>>
                financially stable
            </p>
            <p>
                <input type="checkbox" name="menLifeStat[]" id="" value="Has a Job" <?php echo in_array("Has a Job", $_SESSION['menLifeStat']) ? 'checked' : ''; ?>>
                Has a Job
            </p>
            <p>
                <input type="checkbox" name="menLifeStat[]" id="" value="Has a car" <?php echo in_array("Has a car", $_SESSION['menLifeStat']) ? 'checked' : ''; ?>>
                Has a car
            </p>
            <p>
                <input type="checkbox" name="menLifeStat[]" id="" value="Has investment" <?php echo in_array("Has investment", $_SESSION['menLifeStat']) ? 'checked' : ''; ?>>
                Has investment
            </p>
        <hr/>
        <input type="submit" name="submit" value="court now">
    </form>

    <hr/>
    <h2>Girls Possible Answer:</h2>
    <h1>
    <?php 
    echo $_SESSION['girl_answer']; 
    ?>
    </h1>
</body>
</html>