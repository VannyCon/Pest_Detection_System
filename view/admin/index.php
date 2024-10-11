<?php 
require_once('../../controller/PestDataController.php');
$pest = new PestData();
$pestDatas = $pest->getAllPest();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $pest_name = $_POST['pest_name'];
    $pest_information = $_POST['pest_information'];
    $pest_solution = $_POST['pest_solution'];

    // Update the pest data in the database
    $pest->update($id, $pest_name, $pest_information, $pest_solution);

    // Redirect back to the manage page
    header('Location: index.php');
    exit();
}
?>
<?php include_once('../components/header.php'); ?>

<div class="p-3">

    <div class="p-4">
        <h3 class="text-white">Pest Data List</h3>

        <!-- Search Input -->
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search for pest...">
        </div>

        <div class="table-responsive card">
            <!-- Table for nursery owners -->
            <table border="1" class="table p-2" id="pestData">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Pest Name</th>
                        <th>Information</th>
                        <th>Solution</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pestDatas)): ?>
                        <?php foreach ($pestDatas as $pestData): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($pestData['id']); ?></td>
                                <td><img style="width: 150px; height: auto;" src="<?php echo '../../assets/images/pest/'.$pestData['pest_imagepath'] ?>" class="rounded" alt="Pest Image"></td>
                                <td><?php echo htmlspecialchars($pestData['pest_name']); ?></td>
                                <td><?php echo htmlspecialchars($pestData['pest_information']); ?></td>
                                <td><?php echo htmlspecialchars($pestData['pest_solution']); ?></td>
                                <td>
                                    <!-- Button to trigger modal -->
                                    <button type="button" class="btn btn-info mx-0 mx-md-2 my-1 my-md-0" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#updateModal"
                                        data-bs-id="<?php echo htmlspecialchars($pestData['id']); ?>"
                                        data-bs-name="<?php echo htmlspecialchars($pestData['pest_name']); ?>"
                                        data-bs-info="<?php echo htmlspecialchars($pestData['pest_information']); ?>"
                                        data-bs-solution="<?php echo htmlspecialchars($pestData['pest_solution']); ?>">
                                        Update
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Button if no records are found -->
            <div id="noRecords" class="text-center mt-3" style="display: none;">
                <p>No results found.</p>
                <a type="button" class="btn btn-warning" href="create.php">Create</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Updating Pest Info -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Pest</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="pestId" name="id">
                    <div class="form-group">
                        <label for="pestName">Pest Name</label>
                        <input type="text" class="form-control" id="pestName" name="pest_name" required>
                    </div>
                    <div class="form-group">
                        <label for="pestInformation">Information</label>
                        <textarea class="form-control" id="pestInformation" name="pest_information" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pestSolution">Solution</label>
                        <textarea class="form-control" id="pestSolution" name="pest_solution" rows="3" required></textarea>
                    </div>
                </div>
                <input type="hidden" name="action" value="update">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Corrected Bootstrap and other JS includes -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Modal functionality
        $('#updateModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('bs-id'); // Extract info from data-* attributes
            var name = button.data('bs-name');
            var info = button.data('bs-info');
            var solution = button.data('bs-solution');

            // Update the modal's content.
            var modal = $(this);
            modal.find('.modal-body #pestId').val(id);
            modal.find('.modal-body #pestName').val(name);
            modal.find('.modal-body #pestInformation').val(info);
            modal.find('.modal-body #pestSolution').val(solution);
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input, filter, table, tr, td, i, j, txtValue, found;
            input = document.getElementById('searchInput');
            filter = input.value.toLowerCase();
            table = document.getElementById('pestData');
            tr = table.getElementsByTagName('tr');
            found = false;

            // Loop through all table rows, excluding the header
            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none"; // Hide the row initially

                // Check if any cell in the row contains the search input value
                td = tr[i].getElementsByTagName('td');
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            tr[i].style.display = ""; // Show the row if a match is found
                            found = true;
                            break;
                        }
                    }
                }
            }

            // Show or hide the 'No records' message
            var noRecords = document.getElementById('noRecords');
            if (!found) {
                noRecords.style.display = "block"; // Show "no records" message if nothing is found
            } else {
                noRecords.style.display = "none"; // Hide "no records" message if results are found
            }
        });
    });
</script>


