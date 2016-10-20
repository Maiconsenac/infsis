<?php

class model_produtos extends CI_Model {

    public function select() {
        $this->db->order_by('descricao');
        return $this->db->get('produtos')->result();
    }

    public function insert($produto) {
        return $this->db->insert('produtos', $produto);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('produtos');
    }

    public function find($id) {
        $sql = "select p.*, m.descricao as marca from produtos p ";
        $sql .= "inner join marca m on p.idMarca = m.id ";
        $sql .= "where p.id = $id";
        $query = $this->db->query($sql);
        //row é adequada para o retorno de uma única linha
        return $query->row();
    }

    public function update($produto) {
        $this->db->where('id', $produto['id']);
        return $this->db->update('produtos', $produto);
    }

    public function realizaPesquisa($serPesquisado) {
        (String) $serPesquisado;
        $sql = "select * from produtos where ";
        $sql .= "id = '$serPesquisado' ";
        $sql .= "OR ";
        $sql .= "quantidade = '$serPesquisado' ";
        $sql .= "OR ";
        $sql .= "descricao = '$serPesquisado' ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function realizaPesquisaCategoria($serPesquisado) {
        (String) $serPesquisado;
        $sql = "select * from produtos where ";
        $sql .= "idCategoria = '$serPesquisado' ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function realizaPesquisaMarca($serPesquisado) {
        (String) $serPesquisado;
        $sql = "select * from produtos where ";
        $sql .= "idMarca = '$serPesquisado' ";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
