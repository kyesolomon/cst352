//Code goes here
            var randomNumber = Math.floor(Math.random()*99) + 1;
            var guesses = document.querySelector('#guesses');
            var lastResult = document.querySelector('#lastResult');
            var lowOrHi = document.querySelector('#lowOrHi');
            
            var guessSubmit = document.querySelector('.guessSubmit');
            var guessField = document.querySelector('.guessField');
            
            var guessCount = 1;
            var resetButton = document.querySelector('#reset');
            guessField.focus();
            resetButton.style.display = 'none';
            // document.getElementById("numberToGuess").innerHTML = randomNumber;
            
            //Begin Lesson 5: Conditionals
            function checkGuess(){ // JS function that determines if user's guess was to high/low or just right
                var userGuess = Number(guessField.value);
                if(guessCount===1){
                    guesses.innerHTML = 'Your previous guesses: ';
                }
                guesses.innerHTML += userGuess + ' ';
                
                    if (userGuess === randomNumber){
                        lastResult.innerHTML = 'Congratulations! You got it right!';
                        lastResult.style.color = 'pink';
                        lastResult.style.background = 'green';
                        lowOrHi.innerHTML = '';
                        setGameOver();
                    } else if (guessCount === 7){
                        lastResult.innerHTML = 'Sorry, you lost.';
                        setGameOver();
                    } else {
                        lastResult.innerHTML = 'Wrong, try again!';
                        lastResult.style.color = 'green';
                        lastResult.style.background = 'pink';
                        if (userGuess < randomNumber){
                            lowOrHi.innerHTML = 'Your last guess was too low!';
                        } else if (userGuess > randomNumber){
                            lowOrHi.innerHTML = 'Your last guess was too high!';
                        }
                    }
                guessCount++;
                guessField.value = '';
                guessField.focus();
            }
            // begin lesson 6: events
            guessSubmit.addEventListener('click', checkGuess);
            
            //begin lesson 8: finishing the game
            function setGameOver(){
                guessField.disabled = true;
                guessSubmit.disabled = true;
                resetButton.style.display = 'inline';
                resetButton.addEventListener('click', resetGame);
            }
            function resetGame(){
                guessCount = 1;
                
                var resetParas = document.querySelectorAll('.resultParas p');
                for (var i = 0; i < resetParas.length; i++){
                    resetParas[i].textContent = '';
                }
                resetButton.style.display = 'none';
                
                guessField.disabled = false;
                guessSubmit.disabled = false;
                guessField.value = '';
                guessField.focus();
                
                lastResult.style.backgroundColor = 'white';
                
                randomNumber = Math.floor(Math.random() * 99) + 1;
            }