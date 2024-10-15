<!-- ALL THE HISTORY IS SAVED LOCALLY TO YOUR DEVICE BROWSER(CHORME, OPERA, BRAVE ETC.)  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #1d2631;">
    <div class="container mt-5">
        <h1 class="text-center text-white">Solution History</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="index.php" class="btn btn-outline-danger px-4 ">Back</a>
            <button id="delete-history" class="btn btn-danger px-4 ">Delete History</button>
        </div>
        

        <div class="card">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Pest Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="history-list">
                    <!-- History entries will be populated here -->
                </tbody>
            </table>
        </div>
       
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get history from local storage
            const history = JSON.parse(localStorage.getItem('history')) || [];
            const historyList = document.getElementById('history-list');

            // Populate the history list
            history.forEach(entry => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${entry.date}</td>
                    <td><p class="text-decoration-none text-dark"</p>${entry.description}</td>
                    <td>
                        <a class="btn btn-info" href="solution.php?PestID=${entry.pestID}">Check</a>
                    </td>
                `;
                historyList.appendChild(row);
            });

            // Delete history functionality
            document.getElementById('delete-history').addEventListener('click', function() {
                localStorage.removeItem('history');
                historyList.innerHTML = ''; // Clear the displayed history
            });
        });


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-llh0iHHQ0S6B+J9up8l93WxS5qrrtHyQU4BO4fdL/Pw6E9SC1e3LZPBkRg9EBGmj" crossorigin="anonymous"></script>
</body>
</html>
