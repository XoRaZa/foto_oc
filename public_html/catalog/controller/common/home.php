<?php
class ControllerCommonHome extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink(HTTP_SERVER, 'canonical');
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
                
                
                //RZ reiketu iskelti include'a, kad maziau keisti updatinant OC
                $data['welcome_text'] = $this->language->get('text_welcome');
                // Check if cookie exists
                $cookieName = 'userId';
                if (isset($_COOKIE[$cookieName])) {
                    $data['userId'] = $_COOKIE[$cookieName];
                } else {
                    $data['userId'] = '';
                }
                if (isset($_COOKIE['userIdSet'])) {
                    $data['userIdSet'] = $_COOKIE['userIdSet'];
                } else {
                    $data['userIdSet'] = '0';
                }

                // Check for 'success'
                $data['paymentSuccessful'] = '';
                if (isset($_GET['success'])) {
                    if ($_GET['success'] == 'true') {
                        $data['paymentSuccessful'] = TRUE;
                    }
                }
                //??? neaisku kaip naudoti
                $data['session_id'] = 'session_id()';
                //RZ end
                
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/common/home.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/common/home.tpl', $data));
		}
	}
}