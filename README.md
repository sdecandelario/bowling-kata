# Introduction
The objective of this game it's to simulate a bowling game. The main objective it's passing a sequence calculate the final score.

A bowling game consists of 10 rolls, in each roll you need to knock down all the pins.

# Rules
## Not needed
* Don't need to check if a roll sequence is valid
* Don't need to calculate the intermediate score

## Needed
* Every game have ten turns or rolls
* In every turn your intention is to knock down all
  * If you not knock down all the pins, this is the score for the turn
  * If you knock down all the pins in **two** turn is called **SPARE**
  * If you knock down all the pins in **one** turn is called **STRIKE**
* If you make an **SPARE** the score is ten plus the score of the **next roll**
* If you make an **STRIKE** the score is ten plus the score of the **next two rolls**
* If is the last turn (tenth), the additional turns are counted as simple rolls, and not apply the additional points in the eleven and twelve turn.

# Bowling score calculator
If you need some help to calculate the score and make some tests, you can visit [Bowling calculator](http://www.bowlinggenius.com/), and make all the tests you need.

# Example tests
After start coding and thinking about all the mechanism is interesting to have in mind some interesting tests.

* A game with all misses (all the turns mark as 0)
* A game with some points and without **spare** and **strike**
* A game with one spare before tenth turn
* A game with one strike before tenth turn
* A game with **spare** in the tenth turn
* A game with **strike** in the tenth turn
* A game with all **spares** of 5
* A game with ten **strikes** (perfect game)