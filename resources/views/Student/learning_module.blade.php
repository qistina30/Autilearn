<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Uppercase and Lowercase Letters</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .letter-row {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }
        .letter {
            font-size: 3rem;
            padding: 20px;
            border: 2px solid #000;
            border-radius: 5px;
            background-color: #fff;
            cursor: pointer;
            width: 60px;
            text-align: center;
        }
        .drop-zone {
            border: 2px dashed #000;
            width: 70px;
            height: 70px;
            border-radius: 5px;
            margin: 10px;
            display: inline-block;
            text-align: center;
            line-height: 70px;
            font-size: 2rem;
            color: #000;
        }
        .score {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 20px;
            display: none; /* Hidden by default */
        }
        .timer {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 20px;
            color: #FF6347;
        }
        button {
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Match Uppercase and Lowercase Letters</h1>

    <!-- Uppercase letters -->
    <div class="letter-row" id="uppercase-letters">
        <div class="letter" id="A" draggable="true">A</div>
        <div class="letter" id="B" draggable="true">B</div>
        <div class="letter" id="C" draggable="true">C</div>
        <div class="letter" id="D" draggable="true">D</div>
        <div class="letter" id="E" draggable="true">E</div>
        <!-- Add more letters as needed -->
    </div>

    <!-- Drop zones for lowercase letters -->
    <div class="letter-row" id="lowercase-letters">
        <div class="drop-zone" id="dropA">a</div>
        <div class="drop-zone" id="dropB">b</div>
        <div class="drop-zone" id="dropC">c</div>
        <div class="drop-zone" id="dropD">d</div>
        <div class="drop-zone" id="dropE">e</div>
        <!-- Add more drop zones as needed -->
    </div>

    <!-- Score and timer -->
    <div class="score" id="score">Score: 0</div>
    <div class="timer" id="timer">Time left: 180</div>

    <!-- Reset and Submit Buttons -->
    <button onclick="resetGame()">Reset Game</button>
    <button onclick="submitGame()">Submit Game</button>
</div>

<script>
    let score = 0;
    let timeLeft = 180; // Timer set to 3 minutes (180 seconds)
    let timerInterval;
    const scoreElement = document.getElementById('score');
    const timerElement = document.getElementById('timer');
    const resetButton = document.querySelector('button:nth-of-type(1)');
    const submitButton = document.querySelector('button:nth-of-type(2)');
    const letters = document.querySelectorAll('.letter');
    const dropZones = document.querySelectorAll('.drop-zone');

    let draggedLetter = null;

    // Make letters draggable
    letters.forEach(letter => {
        letter.addEventListener('dragstart', dragStart);
        letter.addEventListener('dragend', dragEnd);
    });

    // Handle dragging start
    function dragStart(e) {
        draggedLetter = e.target;
    }

    // Handle dragging end
    function dragEnd(e) {
        // Allow the letter to be draggable again after being dropped
        draggedLetter.style.pointerEvents = 'auto';
    }

    // Allow drop
    dropZones.forEach(dropZone => {
        dropZone.addEventListener('dragover', dragOver);
        dropZone.addEventListener('drop', drop);
    });

    function dragOver(e) {
        e.preventDefault();
    }

    // Handle drop event
    function drop(e) {
        e.preventDefault();
        const dropZone = e.target;
        const dropLetter = draggedLetter.innerText;

        const dropId = dropZone.id;
        const correctLetter = dropId.replace('drop', '').toUpperCase();

        if (dropLetter === correctLetter && dropZone.innerText === dropId.replace('drop', '').toLowerCase()) {
            dropZone.innerText = dropLetter;
            dropZone.style.backgroundColor = '#4CAF50'; // Correct match
            score += 1;
        } else {
            dropZone.style.backgroundColor = '#FF6347'; // Incorrect match
        }
        draggedLetter.style.pointerEvents = 'none'; // Disable further dragging for this letter
    }

    // Timer function
    function startTimer() {
        timerInterval = setInterval(() => {
            if (timeLeft > 0) {
                timeLeft--;
                timerElement.innerText = 'Time left: ' + timeLeft;
            } else {
                clearInterval(timerInterval);
                submitButton.disabled = true; // Disable the submit button after time's up
                resetButton.disabled = false; // Enable reset button
                alert('Time is up! Submitting the game automatically.');
                submitGame();
            }
        }, 1000);
    }

    // Reset game
    function resetGame() {
        score = 0;
        timeLeft = 180;
        scoreElement.style.display = 'none'; // Hide score during reset
        scoreElement.innerText = 'Score: 0';
        timerElement.innerText = 'Time left: 180';

        dropZones.forEach(dropZone => {
            dropZone.style.backgroundColor = '#fff'; // Reset color
        });

        letters.forEach(letter => {
            letter.style.pointerEvents = 'auto'; // Enable dragging again
        });

        clearInterval(timerInterval);
        startTimer();
        submitButton.disabled = false; // Enable the submit button
        resetButton.disabled = true; // Disable reset button while game is running
    }


    // Submit game
    function submitGame() {
        clearInterval(timerInterval); // Stop the timer
        scoreElement.style.display = 'block'; // Show score after submission
        scoreElement.innerText = 'Score: ' + score;
        submitButton.disabled = true; // Disable submit button after submission
        resetButton.disabled = false; // Enable reset button
    }

    // Start the timer on page load
    startTimer();
    submitButton.disabled = false; // Enable submit button
    resetButton.disabled = true; // Disable reset button until game starts
</script>

</body>
</html>
