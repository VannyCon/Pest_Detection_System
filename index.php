<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachable Machine with Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 70px
        }

        #webcam-container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        canvas {
            width: 100% !important;
            height: auto !important;
        }

        .heading-large {
            font-weight: bold;
            font-size: 2rem; /* Adjust size as needed */
        }
        @media (max-width: 768px) {
            #start-button, #stop-button {
                width: auto; /* Full width on mobile */
                
            }
            .center-content {
                margin-top: 10px
            }
        }
    </style>
</head>
<body style="background-color: #1d2631;">

    <div class="container-fluid">
        <div class="container center-content">
            <img src="assets/images/icon.png" alt="" srcset="" width="150">
            
            <div class="row text-left px-2 py-0">
                <strong class="text-white">Note: </strong>
                <p class="text-white">Click Start then place the Camera to Pest after it click Detect then to know more click Solution button</p>
            </div>
            
            <div id="webcam-container" class="rounded"></div>
            
            <div class="p-2 text-center">
                <!-- Button with responsive width -->
                <button id="start-button" type="button" class="btn btn-primary px-5 py-2" onclick="init()">Start</button>
                <button id="stop-button" type="button" class="btn btn-danger px-5 py-2" onclick="stopWebcam()" style="display: none;">Capture</button>
            </div>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a id="solution-button" class="btn btn-success" href="#" target="_blank">Solution</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

   
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/js/index.js"></script>
</body>
</html>
