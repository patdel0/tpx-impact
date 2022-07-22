# TPX Impact Challenges

For all these projects a Todo file was created in their respective folders, which reflects how I approached each problem. 



## 1. [Poster Recreation](https://dogwishx.github.io/tpx-impact/poster/) <a name="poster-recreation"></a>

![](https://i.imgur.com/oY3iU3g.png)

[Click to see live](https://dogwishx.github.io/tpx-impact/poster/)

In this challenge we were provided a collection of posters which we would have to replicate using only HTML and CSS.
The poster chosen was ***Musica Viva Rosbaud 1959 on Flickr - Photo Sharing!***


## 2. [Javascript Stopwatch](https://dogwishx.github.io/tpx-impact/stopwatch/)

![](https://i.imgur.com/25FbAK6.png)


For this task we had to create a HTML page with a functional stopwatch. The stopwatch must have the following features:

- [x]  Time display: The current elapsed time in the following format 00:00:00:00 (hours, minutes, seconds, centiseconds)
- [x]  **Start button**: A button to start or continue a timer.
- [x]  **Pause button**: A button to pause the running timer.
- [x]  **Reset button**: A button to reset the timer to zero.


This project also includes interaction with the browser's Web Storage API, saving the laps to `window.localStorage`.

## 3. [PHP text-based game](https://github.com/DogwishX/tpx-impact/tree/main/text-based-game)

![](https://i.imgur.com/hBXrtFn.png)



For this task we had to create a command line based text adventure game using PHP. They had set out the rules of the game and the initial storyline. 

### Objective
Create a simple text based adventure game where the objective is for a player to progress through a linear series of rooms without running out of lives.

### Rules of the game

The player starts with three hearts.

The game ends if the player loses all of their hearts

The game is won when the player makes it through all of the rooms

There should be a minimum of five rooms, for which we have provided a prepared story line below.

Each room should has:
- Some flavour text
- A question
- A set of answers for the player to choose from


### How to run 

Make sure you have the latest version of php installed [v8.1 at the time of writing] and run the commands below:


```
git clone https://github.com/DogwishX/tpx-impact.git;
cd tpx-impact/text-based-game;
php index.php
```
