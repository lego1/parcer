<?php
class ModelBlacklist extends Model {
    public function getPhones() {
		$result = $this->db->getRows('SELECT * FROM black_list ORDER BY phone');
		return $result;
    }
	public function addToBlacklist($data) {
		$temp = trim(preg_replace('/[\(\)\+\s-]/','',Tools::getValue('value')).';');
		$phones = explode(';',$temp);
		foreach ($phones as $phone) {
			if ($phone != '') {
				if ($this->db->getCell('SELECT COUNT(phone) FROM black_list WHERE phone = '.$phone) < 1) {
					$this->db->query('INSERT INTO black_list (phone) VALUES ("'.$phone.'") ');
					$this->db->query('DELETE FROM objects WHERE phone LIKE "%'.$phone.'%" ');
				}
			}
		}
    }
	public function removeFromBlacklist($where = null) {
		$result = $this->db->query('DELETE FROM black_list '.(($where !== null) ? $where : ''));
		return $result;
    }
}