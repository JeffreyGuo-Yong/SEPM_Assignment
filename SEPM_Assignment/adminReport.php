<?php
require "functions.php";
$total = getTotalAmountAndQuantity();
$totalPaperType = getTotalPaperType();
$eachDayTotalAmount = getEachDayTotalAmount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <!-- import chart JS files -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
</head>
<body>

<div class="reportMain">

    <div class="title">The report about last 7 days sale history</div>
    <div class="content">
        <p>Total sale amount: $ <?php echo $total['totalAmount'] ?> </p>
        <p>Total sale quantity: <?php echo $total['totalQuantity'] ?> </p>
    </div>
    <div class="chart">
        <div class="barChart">
            <canvas id="myChart"></canvas>
        </div>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php
                            foreach ($eachDayTotalAmount as $day) {
                                echo "\"" . $day['date'] . "\"" . ", ";
                            }
                        ?>
                    ],
                    datasets: [{
                        data: [
                            <?php
                                foreach ($eachDayTotalAmount as $day) {
                                    echo $day['dayTotalAmount'] . ",";
                                }
                            ?>
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(83, 108, 225, 0.2)',
                            'rgba(215, 102, 155, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(83, 108, 225, 1)',
                            'rgba(215, 102, 155, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'The each day total sale amount of last 7 days',
                    },
                    legend:{
                        display:false
                    }
            }
            });
        </script>

        <div class="barChart">
            <canvas id="pie-chart" width="800" height="450"></canvas>
        </div>
        <script>
            new Chart(document.getElementById("pie-chart"), {
                type: 'pie',
                data: {
                    labels: [
                        <?php
                            foreach ($totalPaperType as $paperType) {
                                echo "\"" . $paperType['paper_type'] . "\"" . ", ";
                            }
                        ?>
                    ],
                    datasets: [{
                        label: "Population (millions)",
                        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f"],
                        data: [
                            <?php
                                foreach ($totalPaperType as $paperType) {
                                    echo $paperType['countPaperType'] . ",";
                                }
                            ?>
                        ],
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Proportion of paper types in the last 7 days'
                    }
                }
            });
        </script>

    </div>

</div>

</body>
</html>