<?php 
$allReminders = $data['allReminders'];
$userWithMostReminders = $data['userWithMostReminders'];
$userLogins = $data['userLogins'];
require_once 'app/views/templates/header.php';
?>
<div class="container mt-2">
    <h1 class="mb-4">Admin Reports</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="h5 mb-0">All Reminders</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User</th>
                                <th scope="col">Reminder</th>
                                <th scope="col">Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allReminders as $reminder): ?>
                            <tr>
                                <th scope="row"><?php echo $reminder['id']; ?></th>
                                <td><?php echo $reminder['username']; ?></td>
                                <td><?php echo $reminder['subject']; ?></td>
                                <td><?php echo $reminder['created_at']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="h5 mb-0">User with Most Reminders</h2>
                </div>
                <div class="card-body">
                    <p class="card-text">User with most reminders: <strong><?php echo $userWithMostReminders['username']; ?></strong> (<?php echo $userWithMostReminders['count']; ?> reminders)</p>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="h5 mb-0">Total Logins by Users</h2>
                </div>
                <div class="card-body">
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
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('loginsChart').getContext('2d');
    var loginsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($userLogins, 'username')); ?>,
            datasets: [{
                label: 'Number of logins',
                data: <?php echo json_encode(array_column($userLogins, 'count')); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
<?php require_once 'app/views/templates/footer.php'; ?>
