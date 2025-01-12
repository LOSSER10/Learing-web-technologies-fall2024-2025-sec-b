<?php

include '../model/database.php';


$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'register') {
        
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "INSERT INTO employees (name, contact_no, username, password) VALUES ('$name', '$contact', '$username', '$password')";

   
        if ($db->executeQuery($query)) {
            echo "Employee registered successfully!";
        } else {
            echo "Error: Could not register the employee.";
        }
    } elseif ($action === 'update') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $username = $_POST['username'];
        $password = $_POST['password'];

     
        $query = "UPDATE employees SET name='$name', contact='$contact', username='$username', password='$password' WHERE id=$id";

       
        if ($db->executeQuery($query)) {
            echo "Employee updated successfully!";
        } else {
            echo "Error: Could not update the employee.";
        }
    } elseif ($action === 'delete') {
        $id = $_POST['id'];


        $query = "DELETE FROM employees WHERE id=$id";


        if ($db->executeQuery($query)) {
            echo "Employee deleted successfully!";
        } else {
            echo "Error: Could not delete the employee.";
        }
    } elseif ($action === 'search') {
        $search = $_POST['search'];

        // Define the query to search data
        $query = "SELECT * FROM employees WHERE name LIKE '%$search%' OR id LIKE '%$search%'";

        // Fetch the results
        $results = $db->fetchQuery($query);
        echo json_encode($results);
    }
}

// Close the database connection
$db->close();
?>
