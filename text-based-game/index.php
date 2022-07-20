<?php
$health = 3;

define(
    "ROOM1",
    (object) [
        "name" => "Room 1",
        "flavourText" =>
        "You are in a dungeon. A goblin stares at you menacingly",
        "prompt" => "The Goblin charges toward you, blade drawn.",
        "choices" => [
            (object) [
                "name" => "Attack the goblin",
                "outcome" =>
                "You parry the goblin's strike, and cleave it in two, but not before it nicks you with a hidden blade.",
                "lostHealth" => 1
            ],
            (object) [
                "name" => "Run away",
                "outcome" =>
                "You sprint towards the nearest exit, outpacing the goblin easily",
            ],
        ],
    ],
);

define(
    "ROOM2",
    (object) [
        "name" => "Room 2",
        "flavourText" => "You pass through the exit and run down a corridor…",
        "prompt" =>
        "At the end of the corridor, you find two doors and must pass through one of them.",
        "choices" => [
            (object) [
                "name" => "Go through the right hand door",
                "outcome" =>
                "You fall down a 3 meter drop on the other side, slightly injuring your ankle. You climb out of the hole and into an open courtyard.",
                "lostHealth" => 1
            ],
            (object) [
                "name" => "Go through the left hand door",
                "outcome" =>
                "The door locks behind you and you are in an open courtyard.",
            ],
        ],
    ],
);

define(
    "ROOM3",
    (object) [
        "name" => "Room 3",
        "flavourText" => "You see a table with food and drink",
        "prompt" =>
        "You are tired, hungry and thirsty.",
        "choices" => [
            (object) [
                "name" => "Eat, drink and rest",
                "outcome" =>
                "You recover from your injuries and you are ready to move to the next room",
            ],
            (object) [
                "name" => "Ignore the table of refreshments, fearing poison and move on to the next room",
                "outcome" =>
                "Your injuries and fatigue cause you to fall into a bed of hemlock. You die. Horribly. Ouch!",
                "lostHealth" => 3
            ],
        ],
    ],
);

define(
    "ROOM4",
    (object) [
        "name" => "Room 4",
        "flavourText" => "You are now in a beer cellar. You are tempted to try the merchandise",
        "prompt" =>
        "The barkeep offers you a beer.",
        "choices" => [
            (object) [
                "name" => "Accept the offer",
                "outcome" =>
                "One beer is never enough and you get horribly drunk, in your haze, you stagger off.",
                "lostHealth" => 1

            ],
            (object) [
                "name" => "Decline and ask for directions to the W.C.",
                "outcome" =>
                "You reach the W.C. and have a wash.",
            ],
        ],
    ],
);

define(
    "ROOM5",
    (object) [
        "name" => "Room 4",
        "flavourText" => "You reach a library. You see the librarian, who is an orangutan, hanging around the desk.",
        "prompt" =>
        "The librarian says 'OOOK?'",
        "choices" => [
            (object) [
                "name" => "Return the book you borrowed last time you were here and apologise for being late.",
                "outcome" =>
                "Your apology is accepted, so you live, but there is no excuse for your tardiness and you are fined 10 Splodges.",
                "lostHealth" => 1
            ],
            (object) [
                "name" => "Borrow the book eagerly recommended by the librarian, as this is your first visit and you wish to impress",
                "outcome" =>
                "You put the book in your bag and walk towards the exit",
            ],
        ],
    ],
);

define("ROOMS", [ROOM1, ROOM2, ROOM3, ROOM4, ROOM5]);

foreach (ROOMS as $room) {
    extract(get_object_vars($room));
    printHeader($name);
    echo  $flavourText . "\n" . $prompt . "\n\n";
    printChoices($choices);
    getPlayerChoice($choices);
}

function printHeader($name)
{
    global $health;
    echo "\n\nHP: [" . $health . "/3]   " . $name . "\n\n";
}

function printChoices($choices)
{
    $choiceIndex = 1;
    foreach ($choices as $choice) {
        echo $choiceIndex . " - " . $choice->name . "\n";
        $choiceIndex += 1;
    }
}

function getPlayerChoice($choices)
{

    $playerInput = readline('What will you do?[1/2] ');

    if (!isset($choices[intval($playerInput) - 1])) {
        echo "Please select 1 or 2 \n\n";
        return getPlayerChoice($choices);
    }

    $selectedChoice = $choices[intval($playerInput) - 1]; // -1 to match $choices index

    echo $selectedChoice->outcome . "\n";

    if (isset($selectedChoice->lostHealth)) {
        global $health;
        echo 'You lost ' . $selectedChoice->lostHealth . ' health' . "\n\n";
        $health -= $selectedChoice->lostHealth;
    }
}
