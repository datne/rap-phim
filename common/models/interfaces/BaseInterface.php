<?php 

namespace common\models\interfaces;

interface BaseInterface{

	public function getAll();

	public function getObject($id);

	public function addObject($params);

	public function deleteObject($id);

	public function updateObject($id,$params);

}

?>