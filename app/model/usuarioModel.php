<?php

namespace App\model;

class usuarioModel extends Conexao
{

    public function __construct()
    {
        parent::__construct();
    }

    public function detalheUsuario($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE idusuario = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function listarUsuario()
    {
        $usuario = $this->pdo->query("SELECT * FROM usuario")->fetchAll(\PDO::FETCH_OBJ);
        return $usuario;
    }

    public function cadastrarUsuario($usuario)
    {
        $stmt = $this->pdo->prepare("INSERT INTO usuario (nome,telefone,email,nascimento,genero,perfil) VALUES (:nome,:telefone,:email,:nasc,:genero,:perfil)");
        $stmt->execute(array(':nome'=>$usuario['nome'],
                             ':telefone'=>$usuario['telefone'],
                             ':email'=>$usuario['email'],
                             ':nasc'=>$usuario['nasc'],
                             ':genero'=>$usuario['genero'],
                             ':perfil'=>$usuario['perfil']
        ));
        return $stmt->rowCount();
    }

    public function editarUsuario($usuario)
    {
        $stmt = $this->pdo->prepare("UPDATE usuario SET nome = :nome,telefone = :telefone,email = :email,nascimento =:nasc,genero = :genero,perfil = :perfil WHERE id = :id");
        $stmt->execute(array(':nome'=>$usuario['nome'],
                             ':telefone'=>$usuario['telefone'],
                             ':email'=>$usuario['email'],
                             ':nasc'=>$usuario['nasc'],
                             ':genero'=>$usuario['genero'],
                             ':perfil'=>$usuario['perfil'],
                             ':id'=>$usuario['id']
        ));
        return $stmt->rowCount();
    }

    public function deletarUsuario($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE id = :id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->rowCount();
    }

}