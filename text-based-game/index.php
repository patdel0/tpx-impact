<?php
include './rooms.php';

$health = 3;

startGame();

function startGame()
{
    global $health;
    $health = 3;

    foreach (ROOMS as $room) {
        extract(get_object_vars($room));
        printHeader($name);
        printRoomText($flavourText, $prompt);
        printChoices($choices);
        $playerChoice = getPlayerChoice($choices);
        handlePlayerChoice($playerChoice);
        if ($health <= 0) {
            return gameOver();
        }
    }
}

function printHeader($name)
{
    global $health;
    print "\n\nHP: " . $health . "/3   " . $name . "\n\n";
}


function printRoomText($flavourText, $prompt)
{
    print  $flavourText . "\n" . $prompt . "\n\n";
}

function printChoices($choices)
{
    $choiceIndex = 1;
    foreach ($choices as $choice) {
        print $choiceIndex . " - " . $choice->name . "\n";
        $choiceIndex += 1;
    }
}

function getPlayerChoice($choices)
{

    $playerInput = readline('What will you do?[1/2] ');

    if (!isset($choices[intval($playerInput) - 1])) {
        print "Please select 1 or 2 \n\n";
        return getPlayerChoice($choices);
    }

    $playerChoice = $choices[intval($playerInput) - 1];   // -1 to match $choices index   
    return $playerChoice;
}


function handlePlayerChoice($playerChoice)
{
    print "\n" . $playerChoice->outcome . "\n";
    sleep(2);
    if (isset($playerChoice->lostHealth)) {
        global $health;
        print 'You lost ' . $playerChoice->lostHealth . ' health' . "\n\n";
        $health -= $playerChoice->lostHealth;
        sleep(2);
    }
}

function gameOver()
{
    print "\nYou died - Game Over!\n";
    $restartGame = readline("Would you like to play again?[y/n] ");
    if ($restartGame === 'y') return startGame();

    print "\n\nThanks for playing. See you next time! ;)";
}
