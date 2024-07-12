<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['auth']) || $_SESSION['username'] != 'admin') {
    header("Location: /login");
    die;
}

class Reports extends Controller {

    public function index() {	
        $this->view('reports/index');
    }

        public function all_reminders() {
            $reminderModel = $this->model('Reminder');
            $allReminders = $reminderModel->get_all_reminders();
            $this->view('reports/all_reminders', ['allReminders' => $allReminders]);
        }

        public function user_with_most_reminders() {
            $reminderModel = $this->model('Reminder');
            $userWithMostReminders = $reminderModel->get_user_with_most_reminders();
            $this->view('reports/user_with_most_reminders', ['userWithMostReminders' => $userWithMostReminders]);
        }

        public function user_logins() {
            $logModel = $this->model('Log');
            $userLogins = $logModel->get_total_logins_by_username();
            $this->view('reports/user_logins', ['userLogins' => $userLogins]);
        }
}
?>