<?php

class model_pais extends CI_Model {

    public function select() {
        $this->db->order_by('nome');
        return $this->db->get('pais')->result();
    }

    public function insert($data) {
        $this->db->insert('pais', $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('pais');
        return $this->db->affected_rows();
    }

    public function update($pegaID) {
        $this->db->update('pais', $pegaID);
        return $this->db->affected_rows();
    }

}
