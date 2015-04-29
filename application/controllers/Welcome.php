<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
		$this->html->_element=array(
			"nameinput1" => array(
						"type"	=> "text",
						"label"	=> "label1",
						"value"	=> "text",
						"class"	=> "classInput",
						"id"	=> "idInput",
						),
			"nameinput2" => array(
						"type"	=> "text",
						"label"	=> "label1",
						"value"	=> "text",
						"class"	=> "classInput",
						"id"	=> "idInput",
						),
			"nameinput3" => array(
						"type"	=> "textarea",
						"label"	=> "label3",
						"value"	=> "text",
						"class"	=> "classInput",
						"id"	=> "idInput",
						),
			"nameinput4" => array(
						"type"		=> "select",
						"label"		=> "label3",
						"value"		=> "text",
						"class"		=> "classInput",
						"id"		=> "idInput",
						"options"	=> array(
							"option1"=>"option1_title",
							"option2"=>"option2_title",
							"option3"=>"option3_title",
							"option4"=>"option4_title",
							"option5"=>"option5_title",
							"option6"=>"option6_title",
							),
						),

		);
		print_r($this->html->show());
//		echo $this->html->element_input($attr);
	}
}
