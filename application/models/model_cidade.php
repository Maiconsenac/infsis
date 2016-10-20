<?php

class model_cidade extends CI_Model {

    public function select() {
        $this->db->order_by('nome');
        return $this->db->get('cidade')->result();
    }

    public function insert($data) {
        $this->db->insert('cidade', $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('cidade');
        return $this->db->affected_rows();
    }

    public function update($pegaID) {
        $this->db->update('cidade', $pegaID);
        return $this->db->affected_rows();
    }

}
