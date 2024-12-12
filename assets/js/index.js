const URL = "model/";
let model, webcam, maxPredictions;
let isRunning = false;

let predictions = []; // Store predictions in a variable
// THIS IS THE PART OF JS WHERE TO GIVE YOU A PARTIAL DATA AFTER SCAN
// Example labelDetails object for additional information
const labelDetails = {
    "Undefined": {
        id: 0,
        explanation: "Ang peste ay hindi matukoy. Siguraduhin na malinaw ang larawan.",
        image: "../../assets/images/pest/undefined.jpg"
    },
    "Wasp": {
        id: 1,
        explanation: "Ang mga wasps ay karaniwang mga predatoryong insekto.",
        image: "../../assets/images/pest/wasp.jpg"
    },
    "Weevil": {
        id: 2,
        explanation: "Ang mga weevil ay mga beetle na kilala sa kanilang mahahabang pangil.",
        image: "../../assets/images/pest/weevil.jpg"
    },
    "Snail": {
        id: 3,
        explanation: "Ang mga suso ay mabagal na molusko na madalas sumisira sa mga halaman.",
        image: "../../assets/images/pest/snail.jpg"
    },
    "Moth": {
        id: 4,
        explanation: "Ang mga moth ay maaaring makapinsala sa mga tela at nakaimbak na produkto.",
        image: "../../assets/images/pest/moth.jpg"
    },
    "Slug": {
        id: 5,
        explanation: "Ang mga slug ay katulad ng mga suso ngunit walang shell.",
        image: "../../assets/images/pest/slug.jpg"
    },
    "Earwigs": {
        id: 6,
        explanation: "Ang mga earwig ay nocturnal na insekto na kumakain ng mga halaman.",
        image: "../../assets/images/pest/earwig.jpg"
    },
    "Grasshopper": {
        id: 7 ,
        explanation: "Ang mga grasshoppers ay mga insekto na kumakain ng halaman.",
        image: "../../assets/images/pest/grasshopper.jpg"
    },
    "Catterpillar": {
        id: 8,
        explanation: "Ang mga caterpillar ay larvae ng mga paru-paro at moth.",
        image: "../../assets/images/pest/caterpillar.jpg"
    },
    "Earthworms": {
        id: 9,
        explanation: "Ang mga earthworm ay kapaki-pakinabang sa lupa para sa pag-aerate at decomposition.",
        image: "../../assets/images/pest/earthworms.jpg"
    },
    "Bettles": {
        id: 10,
        explanation: "Ang mga beetle ay maaaring makasira sa mga halaman sa pamamagitan ng pagkain ng mga bahagi nito.",
        image: "../../assets/images/pest/beetle.jpg"
    },
    "Ants": {
        id: 11,
        explanation: "Ang mga langgam ay sosyal na insekto na maaaring magdulot ng abala.",
        image: "../../assets/images/pest/ants.jpg"
    },
    "Bees": {
        id: 12,
        explanation: "Ang mga bubuyog ay mahalagang pollinators ngunit maaaring maging agresibo.",
        image: "../../assets/images/pest/bees.jpg"
    },
    "Borers": {
        id: 13,
        explanation: "Ang mga borer ay mga larvae na sumusubok pumasok sa mga puno.",
        image: "../../assets/images/pest/borers.jpg"
    },
    "Cane Grubs": {
        id: 14,
        explanation: "Ang mga cane grubs ay larvae ng beetles na kumakain sa ugat ng tubo.",
        image: "../../assets/images/pest/cane_grubs.jpg"
    },
    "Corn Earworm": {
        id: 15,
        explanation: "Ang mga corn earworms ay caterpillar na kumakain sa mga tenga ng mais.",
        image: "../../assets/images/pest/corn_earworm.jpg"
    },
    "Corn Leaf Aphid": {
        id: 16,
        explanation: "Ang mga corn leaf aphids ay sumususo ng katas mula sa mga halaman ng mais.",
        image: "../../assets/images/pest/corn_leaf_aphid.jpg"
    },
    "Cutworms": {
        id: 16,
        explanation: "Ang mga cutworms ay caterpillar na kumakain sa mga batang halaman.",
        image: "../../assets/images/pest/cutworms.jpg"
    },
    "Early Shoot Borer": {
        id: 17,
        explanation: "Ang mga early shoot borers ay umaatake sa mga batang shoots ng tubo.",
        image: "../../assets/images/pest/early_shoot_borer.jpg"
    },
    "Fall armyworm": {
        id: 18,
        explanation: "Ang mga fall armyworms ay caterpillar na sumisira sa mga tanim tulad ng mais.",
        image: "../../assets/images/pest/fall_armyworm.jpg"
    },
};

// THIS PART IS TO INITALIZE THE TENSORFLOW LITE SCANNING
async function init() {
    if (isRunning) return; // Prevent reinitialization if already running

    //LOCATION OF MODEL WHICH IS THE OUTPUT OF THE RESULT OF TRAINING MODEL IN TEACHABLE MACHINE
    const modelURL = URL + "../../../model/model.json";
    const metadataURL = URL + "../../../model/metadata.json";

    model = await tmImage.load(modelURL, metadataURL);
    maxPredictions = model.getTotalClasses();

    const flip = false; // Disable flipping, as we want the back camera
    webcam = new tmImage.Webcam(200, 200, flip);
    await webcam.setup({ facingMode: "environment" }); // Request the back camera

    const webcamContainer = document.getElementById("webcam-container");
    webcamContainer.innerHTML = ""; // Clear the container

    await webcam.play();
    isRunning = true;
    window.requestAnimationFrame(loop);

    document.getElementById("start-button").style.display = "none";
    document.getElementById("stop-button").style.display = "inline-block";

    webcamContainer.appendChild(webcam.canvas);
}

async function loop() {
    if (isRunning) {
        webcam.update();
        await predict();
        window.requestAnimationFrame(loop);
    }
}

// RETURN YOU A RESULT OF SCANNING
async function predict() {
    const prediction = await model.predict(webcam.canvas);
    predictions = prediction.map(p => ({
        label: p.className,
        probability: p.probability
    }));
}

// THIS IS THE LOGIC WHERE IF YOU CLICK THE START IT WILL HIDE  THEN THE CAPTURE SHOW
function stopWebcam() {
    isRunning = false;
    if (webcam) {
        webcam.stop();
    }
    document.getElementById("stop-button").style.display = "none";
    document.getElementById("start-button").style.display = "inline-block";
    showHighestPrediction();
}

/// THIS IS THE PART WILL PERFORM A IDENTIFICATION
function showHighestPrediction() {
    if (predictions.length === 0) return;

    let highestPrediction = predictions.reduce((max, p) => p.probability > max.probability ? p : max, predictions[0]);

    // Get the details for the highest prediction label
    const details = labelDetails[highestPrediction.label] || {};
    const explanation = details.explanation || "No additional information available.";
    const image = details.image || "";
    const id = details.id || "";

    // Set modal content
    const modalBodyContent = document.getElementById("modal-body-content");
    modalBodyContent.innerHTML = `
        <h5>${highestPrediction.label}</h5>
        <p>${explanation}</p>
        ${image ? `<img src="${image}" class="rounded" alt="${highestPrediction.label}" style="width: 100%;">` : ''}
    `;

    // Update the "Solution" button href with the highestPrediction.label
    const solutionButton = document.getElementById("solution-button");
    solutionButton.href = `solution.php?PestID=${encodeURIComponent(id)}`;
    solutionButton.target = "_self"; // Ensures the link opens in the same tab

    // Save to local storage before redirecting
    const date = new Date().toLocaleString(); // Get the current date and time
    const historyEntry = {
        pestID: id,
        date: date,
        description: explanation,
    };

    // Get existing history from local storage or initialize it
    let history = JSON.parse(localStorage.getItem('history')) || [];

    // Add the new entry to the history
    history.push(historyEntry);

    // Save updated history to local storage
    localStorage.setItem('history', JSON.stringify(history));

    // Show the modal
    $('#predictionModal').modal('show');
}