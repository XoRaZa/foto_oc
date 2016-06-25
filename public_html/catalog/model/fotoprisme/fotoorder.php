<?php
class ModelFotoprismeFotoorder extends Model {
        public function createNewOrder($userId) {
                $userId = $this->db->escape($userId);
                $this->db->query("INSERT INTO `" . DB_PREFIX . "order` SET `custom_field` = '" . $userId . "', `date_added` = NOW(), `date_modified` = NOW()");
                $query = $this->db->query("SELECT `order_id` FROM `" . DB_PREFIX . "order` WHERE 'custom_field` = '" . $userId . "'");
                if ($query->num_rows) {
			$orderId = $query->row['order_id'];
                } else {
                        return FALSE;
                }
                $this->db->query("INSERT INTO `" . DB_PREFIX . "order_product` (`order_id`, `product_id`, `name`, `model`, `quantity`) VALUES ('" . $order_id . "' , 1 , 'Nuoraukų spausdinimas', '" . $userId . "', 1");
                return TRUE;
        }
        
	public function addUpload($name, $filename) {
		$code = sha1(uniqid(mt_rand(), true));

		$this->db->query("INSERT INTO `" . DB_PREFIX . "upload` SET `name` = '" . $this->db->escape($name) . "', `filename` = '" . $this->db->escape($filename) . "', `code` = '" . $this->db->escape($code) . "', `date_added` = NOW()");

		return $code;
	}

	public function getUploadByCode($code) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "upload` WHERE code = '" . $this->db->escape($code) . "'");

		return $query->row;
	}
}