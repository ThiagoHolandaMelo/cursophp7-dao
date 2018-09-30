<?php

class Usuario{
    
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;
    
    public function __construct($login = "", $senha = ""){
        
        $this->setDeslogin($login);
        $this->setDessenha($senha);
        
    }
    
    public function login($login, $password){
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN and dessenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
        ));
        
        echo count($results);
        
        if( count($results) > 0  ){
            
            $row = $results[0];
            
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime( $row['dtcadastro'] ));
            
        } else {
            
            throw new Exception("Login e/ou senha inválidos");
            
        }
    }
    
    public function loadById($id){
        
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id            
        ));
        
        if( count($results) > 0  ){
            
            $row = $results[0];
            
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime( $row['dtcadastro'] ));                
        }        
    }
    
    public static function search($login){
        $sql = new Sql();
        
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin like :SEARCH ORDER BY deslogin", array(
           ":SEARCH" => "%". $login ."%"          
        ));
    }
    
    public function insert(){
        
        $sql = new Sql();
        
        //TODO adicionar validacao para evitar duplicacao
        
        $sql->query("insert into tb_usuarios(deslogin, dessenha) VALUES (:LOGIN, :PASSWORD)", array(
            ":LOGIN" => $this->getDeslogin(),
            ":PASSWORD" => $this->getDessenha()
        ));
        
        //Buscar o elemento recem inserido, e atualizar ID
                
    }
    
    public function update($novoLogin, $novaSenha){
        $sql = new Sql();
        
        $sql->query("update tb_usuarios set deslogin = :LOGIN, dessenha = :PASSWORD where idusuario = :ID", array(
            ":ID" => $this->getIdusuario(),
            ":LOGIN" => $novoLogin,
            ":PASSWORD" => $novaSenha
        ));
    }
    
    public function delete(){
       
        $sql = new Sql();
        
        $sql->query("delete from tb_usuarios where idusuario = :ID", array(
            ":ID" => $this->getIdusuario()
        ));
        
        $this->setIdusuario("");
        $this->setDeslogin("");
        $this->setDessenha("");
        $this->setDtcadastro("");
        
    }
    
    public static function getList(){
        
        $sql = new Sql();
        
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
        
    }
    
    /*
     * Metodos magicos
     * 
     */
    public function __toString(){
        
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));
    }
    
    /*
     * Gets e Sets
     */    
    public function getIdusuario(){
        return $this->idusuario;
    }
    
    public function setIdusuario($value){
        $this->idusuario = $value;
    }
    
    public function getDeslogin(){
        return $this->deslogin;
    }
    
    public function setDeslogin($value){
        $this->deslogin = $value;
    }
    
    public function getDessenha(){
        return $this->dessenha;
    }
    
    public function setDessenha($value){
        $this->dessenha = $value;
    }
    
    public function getDtcadastro(){
        return $this->dtcadastro;
    }
    
    public function setDtcadastro($value){
        $this->dtcadastro = $value;
    }
}

?>