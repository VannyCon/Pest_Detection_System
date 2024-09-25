const URL = "model/";
let model, webcam, maxPredictions;
let isRunning = false;
let predictions = []; // Store predictions in a variable

// Example labelDetails object for additional information
const labelDetails = {
    "Wasp": {
        explanation: "Ang mga wasps ay karaniwang mga predatoryong insekto.",
        image: "assets/images/pest/wasp.jpg"
    },
    "Weevil": {
        explanation: "Ang mga weevil ay mga beetle na kilala sa kanilang mahahabang pangil.",
        image: "assets/images/pest/weevil.jpg"
    },
    "Snail": {
        explanation: "Ang mga suso ay mabagal na molusko na madalas sumisira sa mga halaman.",
        image: "assets/images/pest/snail.jpg"
    },
    "Moth": {
        explanation: "Ang mga moth ay maaaring makapinsala sa mga tela at nakaimbak na produkto.",
        image: "assets/images/pest/moth.jpg"
    },
    "Slug": {
        explanation: "Ang mga slug ay katulad ng mga suso ngunit walang shell.",
        image: "assets/images/pest/slug.jpg"
    },
    "Earwig": {
        explanation: "Ang mga earwig ay nocturnal na insekto na kumakain ng mga halaman.",
        image: "assets/images/pest/earwig.jpg"
    },
    "Grasshopper": {
        explanation: "Ang mga grasshoppers ay mga insekto na kumakain ng halaman.",
        image: "assets/images/pest/grasshopper.jpg"
    },
    "Caterpillar": {
        explanation: "Ang mga caterpillar ay larvae ng mga paru-paro at moth.",
        image: "assets/images/pest/caterpillar.jpg"
    },
    "Earthworm": {
        explanation: "Ang mga earthworm ay kapaki-pakinabang sa lupa para sa pag-aerate at decomposition.",
        image: "assets/images/pest/earthworms.jpg"
    },
    "Bettle": {
        explanation: "Ang mga beetle ay maaaring makasira sa mga halaman sa pamamagitan ng pagkain ng mga bahagi nito.",
        image: "assets/images/pest/beetle.jpg"
    },
    "Ants": {
        explanation: "Ang mga langgam ay sosyal na insekto na maaaring magdulot ng abala.",
        image: "assets/images/pest/ants.jpg"
    },
    "Bees": {
        explanation: "Ang mga bubuyog ay mahalagang pollinators ngunit maaaring maging agresibo.",
        image: "assets/images/pest/bees.jpg"
    },
    "Borers": {
        explanation: "Ang mga borer ay mga larvae na sumusubok pumasok sa mga puno.",
        image: "assets/images/pest/borers.jpg"
    },
    "Cane Grubs": {
        explanation: "Ang mga cane grubs ay larvae ng beetles na kumakain sa ugat ng tubo.",
        image: "assets/images/pest/cane_grubs.jpg"
    },
    "Corn Earworm": {
        explanation: "Ang mga corn earworms ay caterpillar na kumakain sa mga tenga ng mais.",
        image: "assets/images/pest/corn_earworm.jpg"
    },
    "Corn Leaf Aphid": {
        explanation: "Ang mga corn leaf aphids ay sumususo ng katas mula sa mga halaman ng mais.",
        image: "assets/images/pest/corn_leaf_aphid.jpg"
    },
    "Cutworms": {
        explanation: "Ang mga cutworms ay caterpillar na kumakain sa mga batang halaman.",
        image: "assets/images/pest/cutworms.jpg"
    },
    "Early Shoot Borer": {
        explanation: "Ang mga early shoot borers ay umaatake sa mga batang shoots ng tubo.",
        image: "assets/images/pest/early_shoot_borer.jpg"
    },
    "Fall Armyworm": {
        explanation: "Ang mga fall armyworms ay caterpillar na sumisira sa mga tanim tulad ng mais.",
        image: "assets/images/pest/fall_armyworm.jpg"
    },
    "Undefined": {
        explanation: "Ang peste ay hindi matukoy. Siguraduhin na malinaw ang larawan.",
        image: "assets/images/pest/undefined.jpg"
    }
};


async function init() {
    if (isRunning) return; // Prevent reinitialization if already running

    const modelURL = URL + "model.json";
    const metadataURL = URL + "metadata.json";

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

async function predict() {
    const prediction = await model.predict(webcam.canvas);
    predictions = prediction.map(p => ({
        label: p.className,
        probability: p.probability
    }));
}

function stopWebcam() {
    isRunning = false;
    if (webcam) {
        webcam.stop();
    }
    document.getElementById("stop-button").style.display = "none";
    document.getElementById("start-button").style.display = "inline-block";
    showHighestPrediction();
}

function showHighestPrediction() {
    if (predictions.length === 0) return;

    let highestPrediction = predictions.reduce((max, p) => p.probability > max.probability ? p : max, predictions[0]);

    // Get the details for the highest prediction label
    const details = labelDetails[highestPrediction.label] || {};
    const explanation = details.explanation || "No additional information available.";
    const image = details.image || "";

    // Set modal content
    const modalBodyContent = document.getElementById("modal-body-content");
    modalBodyContent.innerHTML = `
        <h5>${highestPrediction.label}</h5>
        <p>${explanation}</p>
        ${image ? `<img src="${image}" class="rounded" alt="${highestPrediction.label}" style="width: 100%;">` : ''}
    `;

    // Update the "Solution" button href with the highestPrediction.label
    const solutionButton = document.getElementById("solution-button");
    solutionButton.href = `view/solution.php?PestName=${encodeURIComponent(highestPrediction.label)}`;
    solutionButton.target = "_self"; // Ensures the link opens in the same tab

    // Show the modal
    $('#predictionModal').modal('show');
}