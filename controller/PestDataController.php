<?php
require_once("../../connection/config.php");
require_once("../../connection/connection.php");

class PestData extends config {
    public function getAllPest() {
        try {
            $query = "SELECT `id`, `pest_name`, `pest_information`, `pest_solution`, `pest_imagepath` FROM `tbl_pestdata` WHERE 1";
            $stmt = $this->pdo->prepare($query); // Prepare the query
            $stmt->execute(); // Execute the query
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getPestById($id) {
        try {
                $query = "SELECT `id`, `pest_name`, `pest_information`, `pest_solution`, `pest_imagepath` FROM `tbl_pestdata` WHERE `id` = :id";
                $stmt = $this->pdo->prepare($query); // Prepare the query
                $stmt->bindParam(':id', $id); // Bind the value
                $stmt->execute(); // Execute the query
                return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the result
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function update($id, $pest_name, $pest_information, $pest_solution) {
        try {
            // Define the query with placeholders for updating an existing record
            $query = "UPDATE `tbl_pestdata` SET `pest_name`=:pest_name,`pest_information`=:pest_information,`pest_solution`=:pest_solution WHERE `id` = :id";
    
            // Prepare the query
            $stmt = $this->pdo->prepare($query);
            // Bind the values to the placeholders
            $stmt->bindParam(':pest_name', $pest_name);
            $stmt->bindParam(':pest_information', $pest_information);
            $stmt->bindParam(':pest_solution', $pest_solution);
            $stmt->bindParam(':id', $id); // Bind the ID to identify which record to update
    
            // Execute the query
            $stmt->execute();
    
            // Return success or other relevant response
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; // Return false if the operation fails
        }
    }
    
    

}




?>
