<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database credentials
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "h2o-core-db";
        $port = "3308";

        $conn = new mysqli($servername, $username, $password, $dbname, $port);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "";

        // Function to sanitize and validate data
        function sanitize_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Get the sanitized form data
        $name = sanitize_input($_POST['name']);
        $email = sanitize_input($_POST['email']);
        $country = sanitize_input($_POST['country']);
        $state = sanitize_input($_POST['state']);
        $district = sanitize_input($_POST['district']);
        $pen_name = sanitize_input($_POST['pen_name']);
        $article_heading = sanitize_input($_POST['article_heading']);
        $article_text = sanitize_input($_POST['article_text']);
        $sources = sanitize_input($_POST['sources']);

        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format");
        }

        // Prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO user_and_article_data_collection (name, email, country, state, district, pen_name, article_heading, article_text, sources) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $name, $email, $country, $state, $district, $pen_name, $article_heading, $article_text, $sources);

        // Execute the statement and check if it was successful
        if ($stmt->execute()) {
            echo "<script>alert('Your article has been submitted successfully.')</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Submit Your Articles - H2O CORE</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <style>

            form {
                display: flex;
                flex-direction: column;
            }

            input, textarea {
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
            }

            input[type="submit"] {
                background-color: #28a745;
                color: white;
                border: none;
                cursor: pointer;
                padding: 12px;
                font-size: 16px;
                border-radius: 4px;
            }

            input[type="submit"]:hover {
                background-color: #218838;
            }


            @media (max-width: 768px) {
                
                input, textarea {
                    font-size: 14px;
                    padding: 8px;
                }

                input[type="submit"] {
                    padding: 10px;
                    font-size: 14px;
                }
            }

            @media (max-width: 480px) {
                
                input, textarea {
                    padding: 6px;
                    font-size: 12px;
                }

                input[type="submit"] {
                    padding: 8px;
                    font-size: 12px;
                }
            }

        </style>
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg header-sticky">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="logo.png" style="width: 250px; height: 50px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about-us.html">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Articles
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="articles.html#admin-added-articles">Admin Added Articles</a></li>
                            <li><a class="dropdown-item" href="articles.html#user-added-articles">Your Articles</a></li>
                            <li><a class="dropdown-item" href="articles.html#case-studies">Case Studies</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="submit-your-articles.php">Submit Your Articles</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Survey
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="survey.html">Take Survey</a></li>
                              <li><a class="dropdown-item" href="survey-stats.php">Statistics</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="quiz.html">Quiz</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="calculator.html">Calculator</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="main-screen">
            <div class="card-image-overlay">
                <h1 class="card-title" style="font-size: 90px; font-family: Horizon, serif; margin: 0 10%;">Submit Your Article</h1>
            </div>
        </div>

        <br><br><br>

        <div style="margin: 0 10%; text-align: justify; text-justify: auto;">
            <h2>Submit Now and stand a chance to get it published on our website!!</h2>
            
            <form action="" method="POST">
                <input type="text" name="name" placeholder="Enter your name *" required><br>
                <input type="email" name="email" placeholder="Enter your email *" required><br>
                <input type="text" name="country" placeholder="Enter your country *" required><br>
                <input type="text" name="state" placeholder="Enter your state *" required><br>
                <input type="text" name="district" placeholder="Enter your district"><br>
                <input type="text" name="pen_name" placeholder="Enter your pen name"><br>
                <input type="text" name="article_heading" placeholder="Enter article heading *" required><br>
                <textarea name="article_text" rows="5" placeholder="Enter your article *" required></textarea><br>
                <textarea name="sources" rows="3" placeholder="Enter the sources of the article *" required></textarea><br>
                <input type="submit" value="Submit">
            </form>
        </div>
        
        <button onclick="totopFn()" id="backtotop" title="Go to top">Top</button>
                        
            
        <script src="scripts.js"></script>     
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    </body>
</html>
