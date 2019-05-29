<?php
namespace Models;

use \Core\Model;

class Users extends Model
{
    private $id_user;

    public function checkCredentials($email, $pass) {

		$sql = "SELECT id, pass FROM users WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$info = $sql->fetch();

			if(password_verify($pass, $info['pass'])) {
				$this->id_user = $info['id'];

				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
    }
    //imc: Peso dividido pelo quadrado da altura:
    //tbm-homem: 66 + (13,7 x Peso) + (5,0 x Altura em cm) – (6,8 x Idade)
    //tbm-mulher: 665 + (9,6 x Peso) + (1,8 x Altura em cm) – (4,7 x Idade)
    //meta_calorica
    public function create($name, $email, $pass, $height, $weight, $sexo, $data_nascimento, $desejo) {
		if(!$this->emailExists($email)) {
			$hash = password_hash($pass, PASSWORD_DEFAULT);
            $imc = $this->imc($height, $weight);
            $tbm = $this->tmb($sexo, $weight, $height, $data_nascimento);

			$sql = "INSERT INTO users (name, email, pass) VALUES (:name, :email, :pass)";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':name', $name);
			$sql->bindValue(':email', $email);
			$sql->bindValue(':pass', $hash);
			$sql->execute();

			$this->id_user = $this->db->lastInsertId();

			return true;
		} else {
			return false;
		}
    }
    
    public function createJwt() {
		$jwt = new Jwt();
		return $jwt->create(array('id_user' => $this->id_user));
    }
    
    private function imc($height, $weight)
    {
        return ($height * $height) / $weight;
    }

    private function tmb($sexo, $weight, $height, $data_nascimento)
    {
        $data = $data_nascimento;
   
        list($dia, $mes, $ano) = explode('/', $data);
    
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
    
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

        if ($sexo == 'M') {
            return 66 + (13.7 * $weight) + (5 * $height * 100) - (6.8 * $idade);
        } else {
            return 665 + (9.6 * $weight) + (1.8 * $height * 100) - (4.7 * $idade);
        }   
    }
}