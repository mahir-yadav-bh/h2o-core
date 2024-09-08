<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "h2o-core-db";
$port = "3308";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get survey data for each question
function getQuestionData($conn, $question) {
    $sql = "SELECT $question, COUNT($question) as count FROM survey_responses GROUP BY $question";
    $result = $conn->query($sql);
    
    $data = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[$row[$question]] = $row['count'];
        }
    }
    return $data;
}

// Fetch data for each question manually
$question1_data = getQuestionData($conn, 'question1');
$question2_data = getQuestionData($conn, 'question2');
$question3_data = getQuestionData($conn, 'question3');
$question4_data = getQuestionData($conn, 'question4');
$question5_data = getQuestionData($conn, 'question5');
$question6_data = getQuestionData($conn, 'question6');
$question7_data = getQuestionData($conn, 'question7');
$question8_data = getQuestionData($conn, 'question8');
$question9_data = getQuestionData($conn, 'question9');
$question10_data = getQuestionData($conn, 'question10');
$question11_data = getQuestionData($conn, 'question11');
$question12_data = getQuestionData($conn, 'question12');
$question13_data = getQuestionData($conn, 'question13');
$question14_data = getQuestionData($conn, 'question14');
$question15_data = getQuestionData($conn, 'question15');

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Survey Statistics | H2O CORE</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <link rel="stylesheet" href="styles.css">
        <style>
            .card {
                margin-bottom: 20px;
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
                <h1 class="card-title" style="font-size: 90px; font-family: Horizon, serif; margin: 0 10%;">Survey Statistics</h1>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <h2 class="text-center mb-4">Survey Results</h2>

                <!-- Question 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q1. How important is water conservation to you?</h5>
                            <canvas id="chartQuestion1"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q2. Which of the following water conservation practices do you currently use?</h5>
                            <canvas id="chartQuestion2"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q3. How often do you take shorter showers to conserve water?</h5>
                            <canvas id="chartQuestion3"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q4. What motivates you to conserve water?</h5>
                            <canvas id="chartQuestion4"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q5. Are you aware of water conservation programs or initiatives in your area?</h5>
                            <canvas id="chartQuestion5"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 6 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q6. Do you use water-saving appliances in your home (e.g. low-flow toilets, efficient dishwasher)?</h5>
                            <canvas id="chartQuestion6"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 7 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q7. Do you think your community should implement stricter water conservation measures?</h5>
                            <canvas id="chartQuestion7"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 8 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q8. How often do you check for water leaks in your home and get them fixed?</h5>
                            <canvas id="chartQuestion8"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 9 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q9. Which indoor water-saving habits have you adopted?</h5>
                            <canvas id="chartQuestion9"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 10 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q10. Are you familiar with the concept of xeriscaping for water conservation?</h5>
                            <canvas id="chartQuestion10"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 11 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q11. What actions do you think local governments should take to promote water conservation?</h5>
                            <canvas id="chartQuestion11"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 12 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q12. Do you think water conservation should be a top priority for environmental sustainability?</h5>
                            <canvas id="chartQuestion12"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 13 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q13. How does your household track water usage and conservation efforts?</h5>
                            <canvas id="chartQuestion13"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 14 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q14. Have you participated in any water conservation campaigns or events?</h5>
                            <canvas id="chartQuestion14"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Question 15 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Q15. Which of the following initiatives would encourage you to adopt more water conservation practices?</h5>
                            <canvas id="chartQuestion15"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

        <script>
            // Chart for Question 1 (with 3 options)
            const ctx1 = document.getElementById('chartQuestion1').getContext('2d');
            new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question1_data)); ?>, // 3 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question1_data)); ?>, // 3 data points
                        backgroundColor: ['#ff9999', '#66b3ff', '#99ff99'], // 3 colors
                        hoverOffset: 3
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 2 (with 6 options)
            const ctx2 = document.getElementById('chartQuestion2').getContext('2d');
            new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question2_data)); ?>, // 6 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question2_data)); ?>, // 6 data points
                        backgroundColor: ['#ffcc99', '#ff6666', '#ff9966', '#ccff66', '#99ccff', '#ff33cc'], // 6 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 3 (with 4 options)
            const ctx3 = document.getElementById('chartQuestion3').getContext('2d');
            new Chart(ctx3, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question3_data)); ?>, // 4 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question3_data)); ?>, // 4 data points
                        backgroundColor: ['#33cccc', '#ffcc99', '#99ccff', '#ff6699'], // 4 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 4 (with 5 options)
            const ctx4 = document.getElementById('chartQuestion4').getContext('2d');
            new Chart(ctx4, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question4_data)); ?>, // 5 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question4_data)); ?>, // 5 data points
                        backgroundColor: ['#cc99ff', '#ff66b3', '#66cc99', '#3399ff', '#ffcc66'], // 5 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 5 (with 2 options)
            const ctx5 = document.getElementById('chartQuestion5').getContext('2d');
            new Chart(ctx5, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question5_data)); ?>, // 2 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question5_data)); ?>, // 2 data points
                        backgroundColor: ['#ff9933', '#6699cc'], // 2 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 6 (with 2 options)
            const ctx6 = document.getElementById('chartQuestion6').getContext('2d');
            new Chart(ctx6, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question6_data)); ?>, // 2 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question6_data)); ?>, // 2 data points
                        backgroundColor: ['#99ff99', '#cc99ff'], // 2 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 7 (with 3 options)
            const ctx7 = document.getElementById('chartQuestion7').getContext('2d');
            new Chart(ctx7, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question7_data)); ?>, // 3 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question7_data)); ?>, // 3 data points
                        backgroundColor: ['#ffcc33', '#ff99ff', '#99ff99'], // 3 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 8 (with 4 options)
            const ctx8 = document.getElementById('chartQuestion8').getContext('2d');
            new Chart(ctx8, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question8_data)); ?>, // 4 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question8_data)); ?>, // 4 data points
                        backgroundColor: ['#99ccff', '#ffcc66', '#66cc99', '#ff99ff'], // 4 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 9 (with 6 options)
            const ctx9 = document.getElementById('chartQuestion9').getContext('2d');
            new Chart(ctx9, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question9_data)); ?>, // 6 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question9_data)); ?>, // 6 data points
                        backgroundColor: ['#ff6666', '#66ff99', '#cc99ff', '#3399cc', '#ffcc66', '#ff6699'], // 6 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 10 (with 2 options)
            const ctx10 = document.getElementById('chartQuestion10').getContext('2d');
            new Chart(ctx10, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question10_data)); ?>, // 2 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question10_data)); ?>, // 2 data points
                        backgroundColor: ['#ccff66', '#ff66cc'], // 2 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 11 (with 6 options)
            const ctx11 = document.getElementById('chartQuestion11').getContext('2d');
            new Chart(ctx11, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question11_data)); ?>, // 6 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question11_data)); ?>, // 6 data points
                        backgroundColor: ['#ff9966', '#99ccff', '#66cc99', '#ff6699', '#cc99ff', '#ffcc66'], // 6 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 12 (with 3 options)
            const ctx12 = document.getElementById('chartQuestion12').getContext('2d');
            new Chart(ctx12, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question12_data)); ?>, // 3 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question12_data)); ?>, // 3 data points
                        backgroundColor: ['#66cc99', '#ff9966', '#99ccff'], // 3 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 13 (with 5 options)
            const ctx13 = document.getElementById('chartQuestion13').getContext('2d');
            new Chart(ctx13, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question13_data)); ?>, // 5 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question13_data)); ?>, // 5 data points
                        backgroundColor: ['#66ccff', '#ff99cc', '#ffcc66', '#6699ff', '#99ccff'], // 5 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 14 (with 3 options)
            const ctx14 = document.getElementById('chartQuestion14').getContext('2d');
            new Chart(ctx14, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question14_data)); ?>, // 3 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question14_data)); ?>, // 3 data points
                        backgroundColor: ['#66ffcc', '#ff9966', '#6699cc'], // 3 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Chart for Question 15 (with 6 options)
            const ctx15 = document.getElementById('chartQuestion15').getContext('2d');
            new Chart(ctx15, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode(array_keys($question15_data)); ?>, // 6 labels
                    datasets: [{
                        data: <?php echo json_encode(array_values($question15_data)); ?>, // 6 data points
                        backgroundColor: ['#ff9966', '#99ccff', '#66cc99', '#ff6699', '#cc99ff', '#ffcc66'], // 6 colors
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true
                }
            });

        </script>


        <button onclick="totopFn()" id="backtotop" title="Go to top">Top</button>

    </body>
</html>
