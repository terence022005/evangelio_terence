<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel'); // siguraduhin na tama ang pangalan ng model file mo
    }

    public function index()
    {
        // Current page (default 1)
        $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int) $_GET['page'] : 1;

        // Search query
        $q = isset($_GET['q']) ? trim($this->io->get('q')) : '';

        // Records per page
        $records_per_page = 5;

        // Get data from model
        $all = $this->UsersModel->page($q, $records_per_page, $page);
        $data['users'] = $all['records'];
        $total_rows = $all['total_rows'];

        // Pagination setup
        $this->pagination->set_options([
            'first_link'         => '⏮ First',
            'last_link'          => 'Last ⏭',
            'next_link'          => 'Next →',
            'prev_link'          => '← Prev',
            'page_query_string'  => true,         // gumamit ng query string ?page=
            'query_string_segment' => 'page',     // param name
        ]);

        $this->pagination->set_theme('default');

        $this->pagination->initialize(
            $total_rows,
            $records_per_page,
            $page,
            site_url() . '?q=' . urlencode($q)
        );
        $data['page'] = $this->pagination->paginate();

        // Load view
        $this->call->view('users/index', $data);
    }

    public function create()
    {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = [
                'username' => $username,
                'email'    => $email
            ];

            if ($this->UsersModel->insert($data)) {
                redirect(site_url(''));
            } else {
                echo "Error in creating user.";
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

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email    = $this->io->post('email');

            $data = [
                'username' => $username,
                'email'    => $email
            ];

            if ($this->UsersModel->update($id, $data)) {
                redirect(site_url(''));
            } else {
                echo "Error in updating user.";
            }
        } else {
            $data['user'] = $user;
            $this->call->view('users/update', $data);
        }
    }

    public function delete($id)
    {
        if ($this->UsersModel->delete($id)) {
            redirect(site_url(''));
        } else {
            echo "Error in deleting user.";
        }
    }
}
