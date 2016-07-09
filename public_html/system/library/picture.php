<?php
class Picture {
	private $config;
	private $db;
	private $data = array();

	public function __construct($registry) {
		$this->session = $registry->get('session');
		$this->db = $registry->get('db');
                $this->request = $registry->get('request');

		if (!isset($this->session->data['cart']) || !is_array($this->session->data['cart'])) {
			$this->session->data['cart'] = array();
		}
	}

	public function getPictures() {
                /*
                ob_start();
                $tmp = $this->request->get['order_id'];
                echo "<pre>";
                var_dump($tmp);
                var_dump($this->request);
                var_dump($this->db);
                var_dump($this->config);
                var_dump($this->session);
                var_dump($this->response);
                //var_dump(get_defined_vars());
                //var_dump(get_defined_constants());
                echo "</pre>";
                $page = ob_get_contents();
                ob_end_clean();
                //file_put_contents(DIR_TMP . '--sys-lib-picture.html', $page);
                */

                $order_id = $this->request->get['order_id'];
                
		if (!$this->data) {
			foreach ($this->session->data['cart'] as $key => $quantity) {
				$product = unserialize(base64_decode($key));

                                $product_id = $product['product_id'];
                                
                                $query_str = "SELECT pic.* FROM picture pic WHERE pic.order_id = '$order_id' AND pic.product_id = '$product_id'" ;
                                
				$picture_query = $this->db->query($query_str);
                                        
				if ($picture_query->num_rows) {
                                    foreach ($picture_query->rows as $roww){
					$this->data[$key][] = array(
						'key'               => $key,
                                                'order_id'          => $roww['order_id'],
                                                'order_product_id'  => $roww['order_product_id'],
                                                'product_id'        => $roww['product_id'],
                                                'time'              => $roww['time'],
                                                'original_name'     => $roww['original_name'],
                                                'name'              => $roww['name'],
                                                'type'              => $roww['type'],
                                                'ext'               => $roww['ext'],
                                                'tmp_name'          => $roww['tmp_name'],
                                                'file_size'         => $roww['file_size'],
                                                'path'              => $roww['path'],
                                                'path_thumb'        => $roww['path_thumb'],
                                                'url'               => $roww['url'],
                                                'url_thumb'         => $roww['url_thumb'],
                                                'user_id'           => $roww['user_id'],
                                                'photo_size'        => $roww['photo_size'],
                                                'pavirsius'         => $roww['pavirsius'],
                                                'kadravimas'        => $roww['kadravimas'],
                                            
                                                //'' => $roww[''],
                                            
                                                'quantity'          => $roww['quantity']
                                        );
                                    }       
				} else {
                                    $this->remove($key);
				}
                        }
		}
                
		return $this->data;
	}
        
	public function remove($key) {
            
		$this->data = array();
                
	}
        
/*
    'order_id' => $picture_query->row['order_id'],
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
 */
}