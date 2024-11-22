<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachable Machine with Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
         body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #1d2631;
            display: flex;
            flex-direction: column;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        video, canvas {
            max-width: 100%;
            display: none;
            margin: 10px 0;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            min-height: 100px;
            white-space: pre-wrap;
        }
        .loading {
            display: none;
            margin: 10px 0;
        }
        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow-y: auto; /* Enable vertical scrolling */
            max-height: calc(100vh - 60px); /* Adjust height to allow footer space */
            padding-bottom: 60px; /* Prevent content from overlapping footer */
        }

        .center-content {
            width: 100%;
            max-width: 300px;
            text-align: center;
        }
        @media (max-width: 768px) {
            #start-button, #stop-button {
                width: auto; /* Full width on mobile */
            }
            .center-content {
                width: 100%;
                max-width: 400px;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <div class="container-fluid content mt-2 mt-md-5 mb-5">
        <div class="container center-content text-center my-5 ">
            <img src="../../assets/images/icon.png" alt="" width="150">
            
            <div class="text-center px-2 py-0 text-white my-1 my-md-5 w-100">
                <p>Help farmers, alleviate mitigation</p>
            </div>
            
            <video id="videoFeed" class="rounded" autoplay></video>
            <canvas id="canvas"></canvas>


            <div class="d-flex justify-content-center">
                <div class="p-2 text-center  w-100" >
                <button class="btn btn-primary w-100" id="startBtn">Start</button>
                <button  class="btn btn-success w-100" id="captureBtn" style="display: none;">Capture</button>
                    <div class="pt-2 text-center">
                        <a href="history.php" class="btn btn-outline-info text-decoration-none w-100 py-2 w-100">History</a>
                    </div>
                </div>
            </div>

            <div class="loading text-white" id="loadingIndicator">Processing image...</div>
            
        </div>

        <!-- Modal -->
        <div class="modal fade" id="predictionModal" tabindex="-1" aria-labelledby="predictionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: #1d2631;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="predictionModalLabel" style="color: white;">Detected</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: white;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body-content" style="color: white;">
                        <!-- Prediction content will be injected here -->

                        <!-- LOGIC IS LOCATED IN ASSETS/JS/ -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a id="solution-button" class="btn btn-success solution-link" href="#" target="_blank">Solution</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer style="background-color: #232d3b;">
        <div class="text-center">
            <strong class="text-white">Note:</strong>
            <p class="text-white font-weight-light">Click 'Start', place your camera to the pest then, click 'Detect', to know more information, click 'Solution' button.</p>    
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Import the labelDetails object from label.js



        // Example labelDetails object for additional information
        const  labelDetails = {
            "Undefined": {
                id: 0,
                explanation: "Ang peste ay hindi matukoy. Siguraduhin na malinaw ang larawan.",
                image: "../../assets/images/pest/undefined.jpg"
            },
            "wasp": {
                id: 1,
                explanation: "Ang mga wasps ay karaniwang mga predatoryong insekto.",
                image: "../../assets/images/pest/wasp.jpg"
            },
            "weevil": {
                id: 2,
                explanation: "Ang mga weevil ay mga beetle na kilala sa kanilang mahahabang pangil.",
                image: "../../assets/images/pest/weevil.jpg"
            },
            "snail": {
                id: 3,
                explanation: "Ang mga suso ay mabagal na molusko na madalas sumisira sa mga halaman.",
                image: "../../assets/images/pest/snail.jpg"
            },
            "moth": {
                id: 4,
                explanation: "Ang mga moth ay maaaring makapinsala sa mga tela at nakaimbak na produkto.",
                image: "../../assets/images/pest/moth.jpg"
            },
            "slug": {
                id: 5,
                explanation: "Ang mga slug ay katulad ng mga suso ngunit walang shell.",
                image: "../../assets/images/pest/slug.jpg"
            },
            "earwig": {
                id: 6,
                explanation: "Ang mga earwig ay nocturnal na insekto na kumakain ng mga halaman.",
                image: "../../assets/images/pest/earwig.jpg"
            },
            "grasshopper": {
                id: 7 ,
                explanation: "Ang mga grasshoppers ay mga insekto na kumakain ng halaman.",
                image: "../../assets/images/pest/grasshopper.jpg"
            },
            "Caterpillar": {
                id: 8,
                explanation: "Ang mga caterpillar ay larvae ng mga paru-paro at moth.",
                image: "../../assets/images/pest/caterpillar.jpg"
            },
            "earthworm": {
                id: 9,
                explanation: "Ang mga earthworm ay kapaki-pakinabang sa lupa para sa pag-aerate at decomposition.",
                image: "../../assets/images/pest/earthworms.jpg"
            },
            "bettle": {
                id: 10,
                explanation: "Ang mga beetle ay maaaring makasira sa mga halaman sa pamamagitan ng pagkain ng mga bahagi nito.",
                image: "../../assets/images/pest/beetle.jpg"
            },
            "ant": {
                id: 11,
                explanation: "Ang mga langgam ay sosyal na insekto na maaaring magdulot ng abala.",
                image: "../../assets/images/pest/ants.jpg"
            },
            "bees": {
                id: 12,
                explanation: "Ang mga bubuyog ay mahalagang pollinators ngunit maaaring maging agresibo.",
                image: "../../assets/images/pest/bees.jpg"
            },
            "borers": {
                id: 13,
                explanation: "Ang mga borer ay mga larvae na sumusubok pumasok sa mga puno.",
                image: "../../assets/images/pest/borers.jpg"
            },
            "cane Grubs": {
                id: 14,
                explanation: "Ang mga cane grubs ay larvae ng beetles na kumakain sa ugat ng tubo.",
                image: "../../assets/images/pest/cane_grubs.jpg"
            },
            "corn Earworm": {
                id: 15,
                explanation: "Ang mga corn earworms ay caterpillar na kumakain sa mga tenga ng mais.",
                image: "../../assets/images/pest/corn_earworm.jpg"
            },
            "corn Leaf Aphid": {
                id: 16,
                explanation: "Ang mga corn leaf aphids ay sumususo ng katas mula sa mga halaman ng mais.",
                image: "../../assets/images/pest/corn_leaf_aphid.jpg"
            },
            "cutworms": {
                id: 16,
                explanation: "Ang mga cutworms ay caterpillar na kumakain sa mga batang halaman.",
                image: "../../assets/images/pest/cutworms.jpg"
            },
            "carly Shoot Borer": {
                id: 17,
                explanation: "Ang mga early shoot borers ay umaatake sa mga batang shoots ng tubo.",
                image: "../../assets/images/pest/early_shoot_borer.jpg"
            },
            "fall Armyworm": {
                id: 18,
                explanation: "Ang mga fall armyworms ay caterpillar na sumisira sa mga tanim tulad ng mais.",
                image: "../../assets/images/pest/fall_armyworm.jpg"
            },
        };





        // Example usage
        console.log(labelDetails);
       const startBtn = document.getElementById("startBtn");
        const captureBtn = document.getElementById("captureBtn");
        const videoFeed = document.getElementById("videoFeed");
        const canvas = document.getElementById("canvas");
        const loadingIndicator = document.getElementById("loadingIndicator");

        let stream = null;

        // Start video stream
        startBtn.addEventListener("click", async () => {
            try {
                stream = await navigator.mediaDevices.getUserMedia({ 
                    video: { facingMode: "environment" } // This ensures the rear camera is used
                });
                videoFeed.srcObject = stream;
                videoFeed.style.display = "block";
                captureBtn.style.display = "inline-block";
                startBtn.style.display = "none";
            } catch (error) {
                alert("Error accessing camera: " + error.message);
            }
        });

        captureBtn.addEventListener("click", async () => {
            const context = canvas.getContext("2d");
            canvas.width = videoFeed.videoWidth;
            canvas.height = videoFeed.videoHeight;

            // Draw the current video frame onto the canvas
            context.drawImage(videoFeed, 0, 0, canvas.width, canvas.height);
            const base64Image = canvas.toDataURL("image/jpeg");

            // Convert Base64 to Blob
            const byteString = atob(base64Image.split(",")[1]);
            const arrayBuffer = new ArrayBuffer(byteString.length);
            const uint8Array = new Uint8Array(arrayBuffer);
            for (let i = 0; i < byteString.length; i++) {
                uint8Array[i] = byteString.charCodeAt(i);
            }
            const blob = new Blob([uint8Array], { type: "image/jpeg" });

            // Prepare FormData
            const formData = new FormData();
            formData.append("image", blob, "captured-image.jpg");

            // Send the image to the API
            loadingIndicator.style.display = "block";

            try {
                const response = await fetch("https://pest-detection-api.vercel.app/upload", {
                    method: "POST",
                    body: formData,
                    mode: "cors",
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();

                  // Access the class field from the predictions array
                    const detectedClass = result.predictions[0]?.class || "Undefined"; // Default to "Undefined" if no pests are detected

                    // Use the detected class to get details
                    const details = labelDetails[detectedClass] || labelDetails["Undefined"]; // Default to "Undefined" if class not found

                    // Extract explanation and image
                    const explanation = details.explanation || "No additional information available.";
                    const image = details.image || "";
                    const id = details.id || "";

                    // Use these variables to display the pest details
                    console.log("Detected Class: ", detectedClass);
                    console.log("Explanation: ", explanation);
                    console.log("Image: ", image);
                    console.log("ID: ", id);

                    // Set modal content
                    const modalBodyContent = document.getElementById("modal-body-content");

                    // Capitalize the first letter of detectedClass
                    const capitalizedClass = detectedClass.charAt(0).toUpperCase() + detectedClass.slice(1);
                    modalBodyContent.innerHTML = `
                        <h5>${capitalizedClass}</h5>
                        <p>${explanation}</p>
                        ${image ? `<img src="${image}" class="rounded" alt="${detectedClass}" style="width: 100%;">` : ''}
                    `;

                    // Update the "Solution" button href with the highestPrediction.label
                    // Get the "Solution" button element
                    const solutionButton = document.getElementById("solution-button");

                    // If the detectedClass is "Undefined", hide the "Solution" button
                    if (detectedClass === "Undefined") {
                        solutionButton.style.display = "none";
                    } else {
                        // Otherwise, make sure the "Solution" button is visible
                        solutionButton.style.display = "inline-block";
                    }
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


                ///////////////////////////////////////////////////////////////////////////////////////

                console.log("Response:", result);
            } catch (error) {
                console.error("Error:", error);
            } finally {
                loadingIndicator.style.display = "none";
            }
        });

    </script>
</body>
</html>
