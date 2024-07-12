<?php 
$userLogins = $data['userLogins'];
require_once 'app/views/templates/header.php';
?>
<div class="container mt-2">
    <?php require_once 'app/views/reports/_buttons.php'; ?>
    <h1 class="mb-4">Total logins by users</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">User Logins</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userLogins as $login): ?>
            <tr>
                <td><?php echo $login['username']; ?></td>
                <td><?php echo $login['count']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="chart-container" style="position: relative; height:40vh; width:80vw">
        <canvas id="loginsChart"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('loginsChart').getContext('2d');
    const loginsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($userLogins, 'username')); ?>,
            datasets: [{
                label: 'Number of logins',
                data: <?php echo json_encode(array_column($userLogins, 'count')); ?>,
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 205, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                  'rgb(255, 99, 132)',
                  'rgb(255, 159, 64)',
                  'rgb(255, 205, 86)',
                  'rgb(75, 192, 192)',
                  'rgb(54, 162, 235)',
                  'rgb(153, 102, 255)',
                  'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?php require_once 'app/views/templates/footer.php'; ?>
