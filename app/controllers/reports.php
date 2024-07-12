<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] != 'Admin') {
    header("Location: /login");
    die;
}

class Reports extends Controller {

    public function index() {	
        $logModel = $this->model('Log');
        $reminderModel = $this->model('Reminder');
        $allReminders = $reminderModel->get_all_reminders();
        $userWithMostReminders = $reminderModel->get_user_with_most_reminders();
        $userLogins = $logModel->get_total_logins_by_username();
        $this->view('report/index', ['userLogins' => $userLogins, 'userWithMostReminders' => $userWithMostReminders, 'allReminders' => $allReminders]);
    }
}
?>