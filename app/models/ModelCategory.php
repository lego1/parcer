<?php
class ModelCategory extends Model {
    public function getCategories($where = null) {
		$result = $this->db->getRows('SELECT * FROM category '.(($where !== null) ? $where : ''));
		return $result;
    }
	
	### begin TO DO: Допилить функцию, рекурсия
	public function getCategoriesTree($id = 0) {
		if (count($parents = $this->db->getRows('SELECT c.*, (SELECT COUNT(id_category) FROM category WHERE parent = c.id_category) AS child_count FROM category c WHERE c.parent = '.$id)) > 0)
			foreach ($parents as $parent) {
				$result[] = $parent;
				if (count($childrens = $this->getChild($parent['id_category'])) > 0) {
					foreach ($childrens as $child) {	
						$result[] = $child;
						//$this->getCategoriesTree($child['id_category']);
					}
				}
			}
		return $result;
    }
	### end TO DO
	
	public function getChild($id) {
		$result = $this->db->getRows('SELECT ch.*, (SELECT COUNT(id_object) FROM objects WHERE id_category = ch.id_category) AS objects_count FROM category ch WHERE ch.parent = '.$id);
		return $result;
    }	
	public function getParentId($name) {
		$result = $this->db->getCell('SELECT id_category FROM category WHERE name = "'.$name.'"');
		return $result;
    }	
	public function importCategories($data) {
		foreach ($data as $temp)
			if ($this->db->getCell('SELECT COUNT(id_category) FROM category WHERE name = "'.$temp['name'].'"') < 1)
				$this->db->insert('category', $temp);
		return true;
    }
	
	public function getObjects($id = null) {
		$result = $this->db->getRows('SELECT o . * , CONCAT(cp.name, ": ",c.name) AS category_name
			FROM objects o 
			LEFT JOIN category c ON c.id_category = o.id_category 
			LEFT JOIN category cp ON cp.id_category = c.parent 
			'.(($id !== null) ? 'WHERE o.id_category = '.$id : ''));
		return $result;
    }
}