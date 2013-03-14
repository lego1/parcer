<?php
class ModelParcing extends Model {
	public function saveObjects($data) {
		$this->db->truncate('objects');
		foreach ($data as $temp) {
			$status = false;
			$phs = $this->db->getRows('SELECT phone FROM black_list');
			foreach ($phs as $ph) {
				if (!preg_match('/'.$ph['phone'].'/i', $temp['phone'])) {
					$status = true;
				}
				else {
					$status = false;
					break;
				}
			}
			if ($status === true)
				$this->db->insert('objects', $temp);
		}
		Tools::redirectLink($_SERVER['HTTP_REFERER']);
    }
}