<?php 
$userWithMostReminders = $data['userWithMostReminders'];
require_once 'app/views/templates/header.php';
?>
<div class="container mt-2">
    <?php require_once 'app/views/reports/_buttons.php'; ?>
    <h1 class="mb-4">User with most reminders</h1>
    <p>User with most reminders: <strong><?php echo $userWithMostReminders['username']; ?></strong> (<?php echo $userWithMostReminders['count']; ?> reminders)</p>
</div>
<?php require_once 'app/views/templates/footer.php'; ?>
