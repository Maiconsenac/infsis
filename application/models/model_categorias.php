<?php

class model_categorias extends CI_Model {

    public function select() {
        $this->db->order_by('descricao');
        return $this->db->get('categorias')->result();
    }

    public function insert($data) {
        $this->db->insert('categorias', $data);
        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('categorias');
        return $this->db->affected_rows();
    }

    public function update($pegaID) {
        $this->db->update('categorias', $pegaID);
        return $this->db->affected_rows();
    }

}
