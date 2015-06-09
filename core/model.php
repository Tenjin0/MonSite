<?php

/**
* 
*/
class Model
{
	
	public $config = 'default';
	public $table = 'false';
	public $db;
	public $primarykey;
	public $id;


	public function __construct(){
		$this->primarykey = 'id'.get_class($this);
		if($this->table === 'false'){
			$this->table = strtolower(get_class($this));
		}
		$config = Config::$database[$this->config];
		$this->db = Dao::getInstance($config);
		
		// var_dump(Config::$database[$this->db]);
		// var_dump($this->table);
	}
	/**
	 * @param req array champ fields: nom ,conditions: attribut=>valeur
	 */
	public function find($req=null){
		$sql = "SELECT ";
		if(isset($req['fields'])){

			if(is_array($req['fields'])){
				$sql.= implode(', ', $req['fields']);
			}else {
				$sql .= $req['fields'];
			}

		}else{
			$sql .= '*';
		}
		$sql .= " FROM $this->table";
		//var_dump($sql);
		// consruction de la condition
		if(isset($req['conditions'])){
			$sql .= ' WHERE ';
			if(!is_array($req['conditions'])){
				$sql .= $req['conditions'];
			}else{
				$cond=array();
				// var_dump(expression)($req['conditions']);
				foreach($req['conditions'] as $k=>$v){
					if(!is_numeric($v)){
						// var_dump($v);
					$v = $this->db->getConnection()->quote($v);
						
					}
					$cond[]= "$k=$v";

				}
				// var_dump($cond);
				$sql .= implode(' AND ', $cond);
			}
		}
		if(isset($req['order'])){
			$sql .= ' ORDER BY ' .$this->table.'.'.$req['order']. ' desc';
		}
		if(isset($req['limit'])){
			$sql .= ' LIMIT ' .$req['limit'];
		}
		
		// debug($sql);
		// exit($sql);
		$res= $this->db->execRequest($sql,'select');
		// debug($res);

		return $res;
		
	}



	public function findCount($conditions){
		$d = $this->findFirst(array(
			'fields' => "COUNT($this->primarykey) as count",
			'conditions' => $conditions
			));
		if($d > 0){
			$req = current($d);
		// var_dump($req);
		} else{
			return $d;
		}
		
		return $req;
	}

	public function delete($id){
		$sql = "DELETE From $this->table WHERE $this->primarykey = $id";
		// var_dump($id);
		//$this->db->execRequest($sql,'delete');
		$reponse = $this->db->getConnection()->prepare($sql);
		$reponse->execute();
	}

	public function edit($id){
		// echo 'je suis appelé';
		//$sql = "UPDATE  From ($this->table) WHERE ($this->primarykey) = $id";
		//$this->db->execRequest($sql);
	}

	public function findFirst($req){
		// var_dump(count($this->find($req)));
		if(count($this->find($req)) > 0){
			return current($this->find($req));
		}
		return null;
	}


	/**
	* les data vienne de l'objet request
	*/	
	public function save($data){
		$key = $this->primarykey;
		$fields=array();
		$d=array();
		debug($key);
		//debug($data[$key]);
		debug($data);
		
		foreach ($data as $k => $v) {
				if($k != $key){
				}
				$fields[] = "$k=:$k";
				$d[":$k"] = $v;
				
		}
		
		if(isset($data[$key]) && !empty($data[$key])){
			$sql = "UPDATE ".$this->table.' SET ' . implode(',',$fields) .' WHERE ' .$key .' =:'.$key;
			$this->id = $data[$key];
			$action='update';
		}else{
			// if (isset($data[$key])){
			// 	unset($data[$key]);
			// }
			$sql = "INSERT INTO ".$this->table.' SET ' . implode(',',$fields);
			$action='insert';
		}
	

		//$this->db->execRequest($sql,$action,$d);
		debug($sql);
		$reponse = $this->db->getConnection()->prepare($sql);
		$reponse->execute($d);
		if($action == 'insert'){
			debug($this->db->getConnection()->lastInsertId());
			return $this->id = $this->db->getConnection()->lastInsertId();
			//debug($id);
		}


	}

	public  function update($data,$where){
		$fields=array();
		$d=array();
		foreach ($data as $k => $v) {
			if (is_numeric($v)) {
				// debug($data[$k]);
				$fields[] = "$k=$v";
			}else{
				//debug(is_numeric($v));
				$fields[] = "$k=:$k";
				$d[":$k"] = $v;	
			}
					
		}
		foreach ($where as $k => $v) {
				$fieldwhere[] = "$k=:$k";
				$d[":$k"] = $v;		
		}
		$sql = "UPDATE ".$this->table.' SET ' . implode(',',$fields) .' WHERE ' .implode(',',$fieldwhere);
		//debug($sql);
		$validation = $this->db->execRequest($sql,'update',$d);
		//var_dump($validation);
	}
	// public function findAll(){

	// 	$sql = "SELECT * FROM $this->table";
		
	// 	// consruction de la condition
	// 	if(isset($req['conditions'])){
	// 		$sql .= ' WHERE ';
	// 		if(!is_array($req['conditions'])){
	// 			$sql.= $req['conditions'];
	// 		}else{
	// 			$cond=array();
	// 			foreach($req['conditions'] as $k=>$v){
	// 				if(!is_numeric($v)){
	// 				$v = $this->db->getConnection()->quote($v);
						
	// 				}
	// 				$cond[]= "$k=$v";
	// 			}
	// 			$sql .= implode(' AND ', $cond);
	// 		}
	// 	}


	// 	return $this->db->execRequest($sql);

	// }
}