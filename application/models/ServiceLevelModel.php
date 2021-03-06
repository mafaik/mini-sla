<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ServiceLevelModel extends CI_Model
{
    var $table = 'service_level';
    var $column_order = array(null, 'service_level', 'mom', 'bom', 'doc', 'demo', 'installation', 'maintenance', 'support', 'sla');
    var $column_search = array('service_level', 'mom', 'bom', 'doc', 'demo', 'installation', 'maintenance', 'support', 'sla');
    var $order = array('service_level_id' => 'asc');

    public function __construct()
    {
        parent::__construct();
    }

    public function _get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if($_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function create($data)
    {
        $this->db->trans_start();
        $this->db->insert($this->table, $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            return true;
        }
            return false;
    }

    public function get($id)
    {
        $query = $this->db->get_where($this->table, array('service_level_id' => $id));
        $row = $query->row();
        if (isset($row)) {
            return $row;
        }
            return false;
    }

    public function update($id, $data)
    {
        $this->db->trans_start();
        $this->db->where('service_level_id', $id);
        $this->db->update($this->table, $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            return true;
        }

            return false;
    }

    public function delete($id)
    {
        $this->db->delete($this->table, array('service_level_id' => $id));
    }
}