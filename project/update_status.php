<?php
session_start();
require_once 'helpers.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "goodex_logistics";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$enquiry_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($enquiry_id <= 0) {
    die("Invalid enquiry ID");
}

$status_options = ['Pending', 'Processing', 'Completed'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_status = sanitize_input($_POST['status']);
    
    if (in_array($new_status, $status_options)) {
        $sql = "UPDATE enquiries SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $new_status, $enquiry_id);
        
        if ($stmt->execute()) {
            $success_message = "Status updated successfully";
        } else {
            $error_message = "Error updating status: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        $error_message = "Invalid status";
    }
}

$sql = "SELECT * FROM enquiries WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $enquiry_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Enquiry not found");
}

$enquiry = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Enquiry Status - GoodEx Logistics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Enquiry Status</h2>
        <?php
        if (isset($success_message)) {
            echo "<div class='alert alert-success'>$success_message</div>";
        }
        if (isset($error_message)) {
            echo "<div class='alert alert-danger'>$error_message</div>";
        }
        ?>
        <form action="update_status.php?id=<?php echo $enquiry_id; ?>" method="POST">
            <div class="mb-3">
                <label for="enquiry_id" class="form-label">Enquiry ID</label>
                <input type="text" class="form-control" id="enquiry_id" value="<?php echo $enquiry_id; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" value="<?php echo htmlspecialchars($enquiry['company_name']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <?php
                    foreach ($status_options as $option) {
                        $selected = ($option == $enquiry['status']) ? 'selected' : '';
                        echo "<option value='$option' $selected>$option</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Status</button>
            <a href="admin_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>