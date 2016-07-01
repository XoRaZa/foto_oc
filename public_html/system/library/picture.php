<?php
class Picture {
	private $config;
	private $db;
	private $data = array();

	public function __construct($registry) {
		$this->config = $registry->get('config');
		$this->session = $registry->get('session');
		$this->db = $registry->get('db');

		if (!isset($this->session->data['cart']) || !is_array($this->session->data['cart'])) {
			$this->session->data['cart'] = array();
		}
	}

	public function getPictures() {
		if (!$this->data) {
			foreach ($this->session->data['cart'] as $key => $quantity) {
				$product = unserialize(base64_decode($key));

                                $product_id = $product['product_id'];
                                
                                $query_str = "SELECT pic.* FROM " 
                                        . DB_PREFIX . "order_product op "
                                        . "LEFT JOIN picture pic ON (op.order_product_id = pic.order_product_id) WHERE op.product_id = '" . (int)$product_id . "'";
                                
                                //file_put_contents('/home/pprelati/domains/kado.lt/public_html/aaaaa1.html', 'picture query:'.$query_str."\n", FILE_APPEND);

				$picture_query = $this->db->query($query_str);


				if ($picture_query->num_rows) {
					$this->data[$key] = array(
						'key'             => $key,
                                                'order_product_id' => $picture_query->row['order_product_id'],
                                                'product_id' => $picture_query->row['product_id'],
                                                'time' => $picture_query->row['time'],
                                                'original_name' => $picture_query->row['original_name'],
                                                'name' => $picture_query->row['name'],
                                                'type' => $picture_query->row['type'],
                                                'ext' => $picture_query->row['ext'],
                                                'tmp_name' => $picture_query->row['tmp_name'],
                                                'file_size' => $picture_query->row['file_size'],
                                                'path' => $picture_query->row['path'],
                                                'path_thumb' => $picture_query->row['path_thumb'],
                                                'url' => $picture_query->row['url'],
                                                'url_thumb' => $picture_query->row['url_thumb'],
                                                'user_id' => $picture_query->row['user_id'],
                                                'photo_size' => $picture_query->row['photo_size'],
                                                'pavirsius' => $picture_query->row['pavirsius'],
                                                'kadravimas' => $picture_query->row['kadravimas'],
                                            
                                                //'' => $picture_query->row[''],
                                            
                                                'quantity' => $picture_query->row['quantity']
					);
				} else {
					$this->remove($key);
				}
                        }
		}
                
                //file_put_contents('/home/pprelati/domains/kado.lt/public_html/aaaaa1.html', 'rz picture:::' . json_encode($this->data) . "\n", FILE_APPEND);
                
		return $this->data;
	}

}