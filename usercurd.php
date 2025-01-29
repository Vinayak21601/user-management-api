<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require 'include/dbconfig.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            echo json_encode($stmt->fetch());
        } else {
            $stmt = $pdo->query("SELECT * FROM users");
            echo json_encode($stmt->fetchAll());
        }
        break;
    
        case 'POST':
            // Check if email already exists
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
            $stmt->execute([$input['email']]);
            $emailExists = $stmt->fetchColumn();
    
            if ($emailExists) {
                echo json_encode(["error" => "Email already exists. Please use a different email."]);
                exit;
            }
    
            // Insert new user
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password, dob) VALUES (?, ?, ?, ?)");
            $passwordHash = password_hash($input['password'], PASSWORD_DEFAULT);
            $stmt->execute([$input['name'], $input['email'], $passwordHash, $input['dob']]);
            echo json_encode(["message" => "User created successfully"]);
            break;
    
            case 'PUT':
                // Ensure user ID is passed in the URL
                if (!isset($_GET['id'])) {
                    echo json_encode(["error" => "User ID required"]);
                    exit;
                }
            
                // Decode the JSON body of the request
                $input = json_decode(file_get_contents('php://input'), true);
            
                if (!$input || !isset($input['name'], $input['email'], $input['dob'])) {
                    echo json_encode(["error" => "Invalid data"]);
                    exit;
                }
            
                // Hash the password if it's present
                $passwordHash = isset($input['password']) ? password_hash($input['password'], PASSWORD_DEFAULT) : null;
            
                // Prepare and execute the update statement
                $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, password = ?, dob = ? WHERE id = ?");
                
                // If the password is not null (i.e., user is updating the password)
                if ($passwordHash) {
                    $stmt->execute([$input['name'], $input['email'], $passwordHash, $input['dob'], $_GET['id']]);
                } else {
                    // If password is not being updated, use the existing password
                    $stmt->execute([$input['name'], $input['email'], $input['password'], $input['dob'], $_GET['id']]);
                }
            
                // Return success message
                echo json_encode(["message" => "User updated successfully"]);
                break;
            
            
    
    case 'DELETE':
        if (!isset($_GET['id'])) {
            echo json_encode(["error" => "User ID required"]);
            exit;
        }
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        echo json_encode(["message" => "User deleted successfully"]);
        break;
    
    default:
        echo json_encode(["error" => "Invalid request method"]);
        break;
}
