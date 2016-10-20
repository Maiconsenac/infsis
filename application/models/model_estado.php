<?php

class model_estado extends CI_Model {

    public function select() {
        $this->db->order_by('nome');
        return $this->db->get('estado')->result();
    }

    public function insert($data) {
        $this->db->insert('estado', $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('estado');
        return $this->db->affected_rows();
    }

    public function update($pegaID) {
        $this->db->update('estado', $pegaID);
        return $this->db->affected_rows();
    }

}
