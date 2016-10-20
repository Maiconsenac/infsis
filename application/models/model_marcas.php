<?php

class model_marcas extends CI_Model {

    public function select() {
        $this->db->order_by('descricao');
        return $this->db->get('marca')->result();
    }

    public function insert($data) {
        $this->db->insert('marca', $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('marca');
        return $this->db->affected_rows();
    }

    public function update($pegaID) {
        $this->db->update('marca', $pegaID);
        return $this->db->affected_rows();
    }

}
