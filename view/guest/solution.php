<?php 
// THIS PART IS THE RESULT OF RIDERECTION AFTER SHOW THE RESULT WHERE THIS PART NEED THE PEST ID WHICH USE TO GET THE OR IDENTIFY THE PEST NAME,INFORMATION AND SOLUTION
require_once('../../controller/PestDataController.php');
$pest = new PestData();

$pestID = $_GET['PestID'];

// THIS WILL SHOW IF 
$pestInfo = $pest->getPestById($pestID);

// Check if the query was successful and returned a result
if ($pestInfo && is_array($pestInfo)) {
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
    <a class="btn btn-outline-danger" href="index.php">Back</a>
    <div class="container">
        <h1><strong><?php echo $pestInfo['pest_name'] ?></strong></h1>
        <div class="image-container">
            <img src="<?php echo '../../assets/images/pest/'.$pestInfo['pest_imagepath'] ?>" class="rounded" alt="Pest Image">
        </div>

        <div class="info">
            <strong>Information:</strong>
            <br>
            <p id='information'><?php echo $pestInfo['pest_information'] ?></p>
            <button id="infoButton" class="btn btn-info" onclick="toggleSpeech('information', 'infoButton')">Play</button>
        </div>

        <div class="solution">
            <strong>Solution:</strong>
            <br>
            <p id='solution'><?php echo $pestInfo['pest_solution'] ?></p>
            <button id="solutionButton" class="btn btn-info" onclick="toggleSpeech('solution', 'solutionButton')">Play</button>
        </div>
    </div>



    <script src="https://code.responsivevoice.org/responsivevoice.js?key=TDecW77Q"></script>
    <!-- Include ResponsiveVoice.js -->

<script>
    // THIS PART IS TO FORMAT THE TEST EX. 1. 2. 3. WILL ARRANGE VERTICALLY
    function formatSolution() {
        const solutionElement = document.getElementById('solution');
        if (!solutionElement) return;

        let text = solutionElement.innerText;

        // Split the text by numbers followed by a dot
        let items = text.split(/\d+\.\s*/).filter(item => item.trim() !== '');

        // Create a new numbered list
        let formattedHTML = '<ol>';
        items.forEach(item => {
            formattedHTML += `<li>${item.trim()}</li>`;
        });
        formattedHTML += '</ol>';

        // Replace the content of the solution element
        solutionElement.innerHTML = formattedHTML;
    }

    // Function to play TTS TO CONVERT THOSE SOLUTION AND INFORMATION TO SOUND
    // Run the formatting function when the page loads
    document.addEventListener('DOMContentLoaded', formatSolution);
    // Pronunciation dictionary

    // TO OPTIMIZE FILIPINO VOICE
    const pronunciationDict = {
        'ng': 'nang',
        'mga': 'mga',
        'ñ': 'ny',
        'nyo': 'nyo',
        'gina': 'gi-na',
        // Add more problematic words or syllables here
    };

    // Function to apply pronunciation rules
    function applyPronunciationRules(text) {
        let words = text.split(' ');
        words = words.map(word => {
            let processedWord = word.toLowerCase();
            for (const [key, value] of Object.entries(pronunciationDict)) {
                processedWord = processedWord.replace(new RegExp(key, 'g'), value);
            }
            return processedWord;
        });
        return words.join(' ');
    }

    // Function to toggle between play/stop for TTS and update button class
    function toggleSpeech(textId, buttonId) {
        const textElement = document.getElementById(textId).innerText;
        const button = document.getElementById(buttonId);

        if (responsiveVoice.isPlaying()) {
            responsiveVoice.cancel();
            button.innerText = 'Play';
            button.classList.remove('btn-danger');
            button.classList.add('btn-info');
            return;
        }

        // Apply pronunciation rules
        const processedText = applyPronunciationRules(textElement);

        // Set options for ResponsiveVoice
        const options = {
            pitch: 1,
            rate: 0.9,
            onend: () => {
                button.innerText = 'Play';
                button.classList.remove('btn-danger');
                button.classList.add('btn-info');
            }
        };

        // Set button text to 'Stop' and change class to 'btn-danger' while speaking
        button.innerText = 'Stop';
        button.classList.remove('btn-info');
        button.classList.add('btn-danger');

        // Start speaking using ResponsiveVoice
        responsiveVoice.speak(processedText, "Filipino Female", options);
    }
</script>

</body>
</html>

<?php
} else {
    echo "<p>Error: Pest data not found or invalid ID provided.</p>";
}
?>
