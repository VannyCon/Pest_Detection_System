<?php 

    //////////////////// LOGIN /////////////////////////
    session_start();
    require_once("connection/config.php");
    require_once("connection/connection.php");
    
    // Redirect to login if not logged in
    if (isset($_SESSION['username'])) {
        header("Location: view/admin/index.php");
        exit();
    }

    /// THIS IS THE LOGIN CLASS
    class LoginAccess extends config {
        public function login($username, $password){
            try {
                // Prepare and execute query to get user by username
                $query = "SELECT * FROM tbl_admin_access WHERE username = :username";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user && $password === $user['password']) {
                    // Password is correct, start a session
                    $_SESSION['fullname'] =  $user['fullname'];
                    $_SESSION['username'] = $user['username'];
                    // Redirect to a protected page
                    return true;
                    exit();
                } else {
                    $error = "Invalid username or password.";
                    return false;
                }
            } catch (PDOException $e) {
                $error = "Database error: " . $e->getMessage();
                return false;
            }
        }
        
    }


    // Instantiate the class to GET THE LOGIN
    $access = new LoginAccess();

    // TO CHECK LOGIN FORM INPUTS
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'login') {
        // Retrieve form input
        $username = $access->clean('username', 'post');
        $password = $access->clean('password', 'post');

        if (!empty($username) && !empty($password)) { 

            // USERNAME AND PASSWORD PASS TO LOGIN FUNCTION FROM LOGINACESS
            $status = $access->login($username,$password);
            if($status == true){
                header("Location: view/admin/index.php");
                exit();
            }else{
                header("Location: index.php?error=1");
            }
           
        } else {
            $error = "Please fill in both fields.";
        }
    }



?>