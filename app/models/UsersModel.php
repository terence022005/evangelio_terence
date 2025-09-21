<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: Usersmodel
 */
class Usersmodel extends Model {
    protected $table = 'user';  // pangalan ng table mo
    protected $primary_key = 'id';
    
    // fields na pwedeng i-insert/update (wag isama ang id kung auto_increment)
    protected $allowed_fields = ['username', 'email'];

    // validation rules para sa form inputs
    protected $validation_rules = [
        'username' => 'required|min_length[2]|max_length[100]',
        'email'    => 'required|valid_email|max_length[150]'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function page($q = '', $records_per_page = null, $page = null)
    {
        if (is_null($page)) {
            // return all without pagination
            return [
                'total_rows' => $this->db->table($this->table)->count_all(),
                'records'    => $this->db->table($this->table)->get_all()
            ];
        } else {
            $query = $this->db->table($this->table);

            if (!empty($q)) {
                $query
                      ->like('username', '%'.$q.'%')
                      ->or_like('email', '%'.$q.'%');
            }

            // count total rows
            $countQuery = clone $query;
            $data['total_rows'] = $countQuery->select_count('*', 'count')->get()['count'];

            // fetch paginated records
            $data['records'] = $query->pagination($records_per_page, $page)->get_all();

            return $data;
        }
    }
}
