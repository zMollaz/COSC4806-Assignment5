<?php 
$allReminders = $data['allReminders'];
require_once 'app/views/templates/header.php';
?>
<div class="container mt-2">
    <?php require_once 'app/views/reports/_buttons.php'; ?>
    <h1 class="mb-4">All reminders</h1>
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
<?php require_once 'app/views/templates/footer.php'; ?>
