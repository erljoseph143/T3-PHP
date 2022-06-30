<?php

$possibleMenCharThatGirlsWant = [
    'good looking',
    'non-smoker',
    'Gentle and slightly pervert',
    'Has a sense of humor'
];

$possibleMenLifeStatusThatGirlsWant = [ 
    'financially stable',
    'Has a Job',
    'Has a car',
    'Has investment'
];

const PASS_PERCENTAGE = 75;

$passingDetails = [ 
    'menChar' => 'failed',
    'menLifeStatus' => 'failed'
];


function getManCharPercentage(array $menCharPassed = [], array $possibleMenCharThatGirlsWant = []) {
    $counter = 0;
    foreach($menCharPassed as $menChar) {
        
        if (in_array($menChar, $possibleMenCharThatGirlsWant)) {
            $counter += 1;
        }

    }

    $getMenCharLength = count($possibleMenCharThatGirlsWant);
    $grade = ($counter / $getMenCharLength) * 100;
    return $grade >= PASS_PERCENTAGE ? 'passed' : 'failed';
}

function getMenLifeStatPercentage(array $menLifeStatPassed = [], $possibleMenLifeStatusThatGirlsWant = []) {
    $counter = 0;
    foreach($menLifeStatPassed as $menLifeStat) {
        
        if (in_array($menLifeStat, $possibleMenLifeStatusThatGirlsWant)) {
            $counter += 1;
        }
    }

    $getMenLifeStatLength = count($possibleMenLifeStatusThatGirlsWant);
    $grade = ($counter / $getMenLifeStatLength) * 100;
    return $grade >= PASS_PERCENTAGE ? 'passed' : 'failed';
}

function getGirlAnswer(array $passingDetails = []) {
    if (in_array('passed', $passingDetails) && !in_array('failed', $passingDetails)) {
        return 'Yes! You can have as your girl friend';
    } else if (in_array('passed', $passingDetails) && in_array('failed', $passingDetails)) {
        return 'Sorry, I am not yet ready';
    } else {
        return 'I\'m very sorry, I don\'t have any feelings for you :(';
    }
}


if (isset($_POST['submit'])) {
    
    session_start();
    $menChar = isset($_POST['menChar']) ? $_POST['menChar'] : [];
    $menLifeStat = isset($_POST['menLifeStat']) ? $_POST['menLifeStat'] : [];

     
    $passingDetails['menChar'] = getManCharPercentage($menChar, $possibleMenCharThatGirlsWant);
    $passingDetails['menLifeStatus'] = getMenLifeStatPercentage($menLifeStat, $possibleMenLifeStatusThatGirlsWant);
    $_SESSION['girl_answer'] = getGirlAnswer($passingDetails);
    
    $_SESSION['menChar'] = $menChar;
    $_SESSION['menLifeStat'] = $menLifeStat;
    header("location:index.php");
}
