<?php 
require_once('../controller/SolutionController.php');

$pestname = $_GET['PestName'];
// Example usage:
$pestInfo = PestDescriptions::getPestInfo($pestname);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pest Details with TTS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1d2631;
            color: white;
            padding: 20px;
            margin: 0;
        }

        .container {
            text-align: left;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
            color: #ff6b81;
        }

        .info {
            font-size: 18px;
            margin: 20px 0;
        }

        .solution {
            font-size: 18px;
            margin: 20px 0;
        }

        .image-container {
            margin: 20px 0;
        }

        img {
            width: 500px;
            height: auto;
        }
        @media (max-width: 768px) {
            img {
                width: 100%; /* Full width on mobile */
            }
        }

        button {
            background-color: #00c0f7;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin: 10px 0;
        }

        button:hover {
            background-color: #00a7d1;
        }
    </style>
</head>
<body>
    <a class="btn btn-outline-danger" href="../index.php">Back</a>
    <div class="container">
        <h1><strong><?php echo $pestInfo->name ?></strong></h1>
        <div class="image-container">
            <img src="<?php echo $pestInfo->imagePath ?>" class="rounded" alt="Pest Image">
        </div>

        <div class="info">
            <strong>Information:</strong>
            <br>
            <p id='information'><?php echo $pestInfo->information ?></p>
            <button id="infoButton" class="btn btn-info" onclick="toggleSpeech('information', 'infoButton')">Play</button>
        </div>

        <div class="solution">
            <strong>Solution:</strong>
            <br>
            <p id='solution'><?php echo $pestInfo->solution ?></p>
            <button id="solutionButton" class="btn btn-info" onclick="toggleSpeech('solution', 'solutionButton')">Play</button>
        </div>
    </div>

    <script>
        // Initialize speech synthesis
        const synth = window.speechSynthesis;
        let currentUtterance = null;

        // Filipino voice preference function
        function getFilipinoVoice() {
            let voices = synth.getVoices();
            return voices.find(voice => voice.lang === 'fil-PH');
        }

        // Function to toggle between play/stop for TTS and update button class
        function toggleSpeech(textId, buttonId) {
            const textElement = document.getElementById(textId).innerText;
            const button = document.getElementById(buttonId);

            // If currently speaking, stop and reset button text/class
            if (synth.speaking) {
                synth.cancel();
                button.innerText = 'Play';
                button.classList.remove('btn-danger');
                button.classList.add('btn-info');
                return;
            }

            // Create the utterance and set the voice
            currentUtterance = new SpeechSynthesisUtterance(textElement);
            const filipinoVoice = getFilipinoVoice();
            if (filipinoVoice) currentUtterance.voice = filipinoVoice;

            // Set button text to 'Stop' and change class to 'btn-danger' while speaking
            button.innerText = 'Stop';
            button.classList.remove('btn-info');
            button.classList.add('btn-danger');

            // Listen for when speech finishes or gets interrupted
            currentUtterance.onend = () => {
                button.innerText = 'Play';
                button.classList.remove('btn-danger');
                button.classList.add('btn-info');
            };
            currentUtterance.onerror = () => {
                button.innerText = 'Play';
                button.classList.remove('btn-danger');
                button.classList.add('btn-info');
            };

            // Start speaking
            synth.speak(currentUtterance);
        }

        // Ensure voices are loaded
        window.speechSynthesis.onvoiceschanged = () => {
            getFilipinoVoice();
        };
    </script>
</body>
</html>
