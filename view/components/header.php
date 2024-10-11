<?php 
    require_once('../../controller/PestDataController.php');
    $pest = new PestData();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'logout') {
        $status = $pest->logout();
        if($status == true){
            header("Location: ../../index.php");
            exit();
        }else{
            header("Location: index.php?error=1");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachable Machine with Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #1d2631;
            display: flex;
            flex-direction: column;
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
            max-width: 600px;
            text-align: center;
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

        footer {
            background-color: #1d2631;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        #webcam-container canvas {
            border-radius: 5px; /* Makes the canvas (webcam feed) rounded */
        }

        @media (max-width: 768px) {
            #start-button, #stop-button {
                width: auto; /* Full width on mobile */
            }
        }
    </style>
</head>
<body>
    <?php 
        if (!isset($_SESSION['username'])) {
            echo "
                    <nav class='navbar navbar-expand-lg navbar-light'>
                        <div class='container-fluid mt-3 px-4 mx-2'>
                            <div class='collapse navbar-collapse' id='navbarNav'>
                                <ul class='navbar-nav ms-auto'>
                                    <li class='nav-item'>
                                        <form action='' method='post'>
                                            <input type='hidden' name='action' value='logout'>
                                            <button class='btn btn-danger btn-md' type='submit'>Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
            ";
        }
    
    ?>
