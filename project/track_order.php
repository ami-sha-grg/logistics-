


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoodEx Logistics</title>
    <link rel="icon" type="image/png" href="unnamed.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .top-bar {
            background-color: #f8f9fa;
            padding: 5px 0;
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-link {
            color: white !important;
        }
        .hero {
            background-image: url('/api/placeholder/1200/600');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }
        .services .card {
            border: none;
            background-color: #f8f9fa;
            text-align: center;
            padding: 20px;
        }
        .services .card img {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
        }
        footer {
            background-color: #0d6efd;
            color: white;
            padding: 40px 0;
        }
        footer h5 {
            color: white;
        }
        footer ul {
            list-style-type: none;
            padding-left: 0;
        }
        footer ul li {
            margin-bottom: 10px;
        }
        footer ul li a {
            color: white;
            text-decoration: none;
        }
        .status-message {
    font-size: 2rem; /* Adjust the size as needed */
    font-weight: bold;
    text-align: center;
    margin-top: 50px;
    color: #333;
}
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="me-3"><i class="fas fa-envelope"></i> info@goodexlogistics.com</span>
                    <span><i class="fas fa-phone"></i> +977-9801828417</span>
                </div>
                <div class="col-md-6 text-end">
                    <span class="me-3"><i class="far fa-clock"></i> Mon-Sun: 9-5</span>
                    <span><i class="fas fa-map-marker-alt"></i> Mid-Baneshwor, Miteri Marga</span>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="/api/placeholder/200/80" alt="GoodEx Logistics"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-danger" href="getaEnquiry.html">ENQUIRY</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "goodex_logistics";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $enquiry_id = $_POST['enquiry_id'];

    $sql = "SELECT * FROM enquiries WHERE id = ? AND email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $enquiry_id, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<div class="status-message">';

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Enquiry Status: " . $row['status'];
    } else {
        echo "No enquiry found with the provided information.";
    }

    echo '</div>';
    
    $stmt->close();
}

$conn->close();
?>






    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <img src="goodexlogo.png" alt="GoodEx Logistics" class="mb-3" style="max-width: 100%; max-height:100%;">
                    <p>GoodEx Logistics Pvt. Ltd.</p>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">About us</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Contact us</h5>
                    <p>GoodEx Logistics Pvt. Ltd.</p>
                    <p><i class="fas fa-map-marker-alt"></i> Mid-Baneshwor, Miteri Marga</p>
                    <p><i class="fas fa-phone"></i> +977-9801828417, 9815239961</p>
                    <p><i class="fas fa-envelope"></i> info@goodexlogistics.com</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Follow us</h5>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i> Youtube</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class="bg-primary text-white text-center py-3">
        <p class="m-0">&copy; 2024 - All Rights with GoodEx Logistics</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>