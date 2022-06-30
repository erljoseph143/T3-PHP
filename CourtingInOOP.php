<?php

class CourtingInOOP {

    public $possibleMenCharThatGirlsWant = [
        'good looking',
        'non-smoker',
        'Gentle and slightly pervert',
        'Has a sense of humor'
    ];

    public $possibleMenLifeStatusThatGirlsWant = [ 
        'financially stable',
        'Has a Job',
        'Has a car',
        'Has investment'
    ];

    const PASS_PERCENTAGE = 75;
    
    public $passingDetails = [ 
        'menChar' => 'failed',
        'menLifeStatus' => 'failed'
    ];


    public function getManCharPercentage(array $menCharPassed = []) {
        $counter = 0;
        foreach($menCharPassed as $menChar) {
            
            if (in_array($menChar, $this->possibleMenCharThatGirlsWant)) {
                $counter += 1;
            }

        }

        $getMenCharLength = count($this->possibleMenCharThatGirlsWant);
        $grade = ($counter / $getMenCharLength) * 100;
        $this->passingDetails['menChar'] =  $grade >= self::PASS_PERCENTAGE ? 'passed' : 'failed';

        return $this;
    }

    public function getMenLifeStatPercentage(array $menLifeStatPassed = []) {
        $counter = 0;
        foreach($menLifeStatPassed as $menLifeStat) {
            
            if (in_array($menLifeStat, $this->possibleMenLifeStatusThatGirlsWant)) {
                $counter += 1;
            }
        }

        $getMenLifeStatLength = count($this->possibleMenLifeStatusThatGirlsWant);
        $grade = ($counter / $getMenLifeStatLength) * 100;
        $this->passingDetails['menLifeStatus'] = $grade >= self::PASS_PERCENTAGE ? 'passed' : 'failed';
        
        return $this;
    }

    public function getGirlAnswer() {
        if (in_array('passed', $this->passingDetails) && !in_array('failed', $this->passingDetails)) {
            return 'Yes! You can have as your girl friend';
        } else if (in_array('passed', $this->passingDetails) && in_array('failed', $this->passingDetails)) {
            return 'Sorry, I am not yet ready';
        } else {
            return 'I\'m very sorry, I don\'t have any feelings for you :(';
        }
    }
}


$courting = new CourtingInOOP();

if (isset($_POST['submit'])) {
    
    session_start();
    $menChar = isset($_POST['menChar']) ? $_POST['menChar'] : [];
    $menLifeStat = isset($_POST['menLifeStat']) ? $_POST['menLifeStat'] : [];

    $_SESSION['girl_answer'] = $courting->getManCharPercentage($menChar)->getMenLifeStatPercentage($menLifeStat)->getGirlAnswer();
    
    $_SESSION['menChar'] = $menChar;
    $_SESSION['menLifeStat'] = $menLifeStat;
    header("location:index.php");
}