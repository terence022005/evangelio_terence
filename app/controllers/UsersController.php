<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {
    public function __construct()
    {
        parent::__construct();
        // Load model once para magamit sa lahat ng methods
        $this->call->model('UsersModel');
    }

    public function index(): void
    {
        $data['users'] = $this->UsersModel->all();
        $this->call->view('users/index', $data);
    }

    public function create()
    {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email    = $this->io->post('email');

            $data = array(
                'username' => $username,
                'email'    => $email
            );

            if ($this->UsersModel->insert($data)) {
                redirect('users');
            } else {
                echo "Error inserting record.";
            }
        } else {
            $this->call->view('users/create');
        }
    }

    public function update($id)
    {
        $user = $this->UsersModel->find($id);
        if (!$user) {
            echo "User not found.";
            return;
        }

        if ($this->io->method() == "post") {
            $username = $this->io->post("username");
            $email    = $this->io->post("email");

            $data = array(
                'username' => $username,
                'email'    => $email
            );

            if ($this->UsersModel->update($id, $data)) {
                redirect('users');
            } else {
                echo "Error updating record.";
            }
        } else {
            $data['user'] = $user;
            $this->call->view('users/update', $data);
        }
    }

    public function delete($id)
    {
        if ($this->UsersModel->delete($id)) {
            redirect('users');
        } else {
            echo "Error deleting record.";
        }
    }
}
?>
