<?php

class model_usuarios extends CI_Model {

    public function select() {
        $this->db->order_by('nome');
        return $this->db->get('usuarios')->result();
    }
    
      public function verificaUsuario($email, $senha){
        
        $sql = "select * from usuarios where email=? and senha=? and nivel=2 ";
        $query = $this->db->query($sql, array($email, $senha));
        return $query->row();      
    }   
    
    public function insert($dados) {        
        return $this->db->insert('usuarios', $dados);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('usuarios');
        return $this->db->affected_rows();
    }

    public function update($pegaID) {
        $this->db->update('usuarios', $pegaID);
        return $this->db->affected_rows();
    }

}
