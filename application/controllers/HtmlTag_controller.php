<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HtmlTag_controller extends CI_Controller {
	// $in_edit_page: This is variable to virtual page edit
	// There is variable get in database
	// True: edit page
	// Fasle: add new page
	private $in_edit_page = false;

	//----------------------------------------------------------------------------------

	public function index(){
		if($this->input->get('case_form') == "addnew"){
			$this->in_edit_page=false;
		}else{
			$this->in_edit_page=true;
		}
		$this->html->_element=array(
			"nameinput1" => array(
						"type"	=> "text",
						"label"	=> "Text input lable !! <span class='label label-danger'>require</span>",
						"value"	=> "",
						"class"	=> "classInput form-control",
						"id"	=> "idInput_1",
						"require" => true,
						),
			"nameinput2" => array(
						"type"	=> "text",
						"label"	=> "Text input lable !! <span class='label label-default'>Catch validate is_numberic</span>",
						"value"	=> "",
						"class"	=> "classInput form-control",
						"id"	=> "idInput_2",
						"rule"	=> "is_numberic",
						"require" => true,
						),
			"nameinput2_email" => array(
						"type"	=> "text",
						"label"	=> "Text input lable !! <span class='label label-default'>Catch validate is_email</span>",
						"value"	=> "",
						"class"	=> "classInput form-control",
						"id"	=> "idInput_2",
						"rule"	=> "is_email",
						"require" => true,
						),
			"nameinput3" => array(
						"type"	=> "textarea",
						"label"	=> "Textarea lable !! <span class='label label-danger'>require</span>",
						"value"	=> "",
						"class"	=> "classInput form-control",
						"id"	=> "idInput_3",
						"require" => true,
						),
			"nameinput4" => array(
						"type"		=> "select",
						"label"		=> "Select lable !! <span class='label label-danger'>require</span>",
						"value"		=> "",
						"class"		=> "classInput form-control",
						"id"		=> "idInput_4",
						"options"	=> array(
							""=>"Please choose option",
							"option4_1"=>"option4_1_title",
							"option4_2"=>"option4_2_title",
							"option4_3"=>"option4_3_title",
							"option4_4"=>"option4_4_title",
							"option4_5"=>"option4_5_title",
							"option4_6"=>"option6_title",
							),
						"require" => true,
						),
			"nameinput5" => array(
						"type"		=> "radio",
						"label"		=> "Radio  lable !! <span class='label label-danger'>require</span>",
						"value"		=> "",
						"class"		=> "classInput",
						"id"		=> "idInput",
						"options"	=> array(
								"option5_1"=>"option5_1_title",
								"option5_2"=>"option5_2_title",
								"option5_3"=>"option5_3_title",
								"option5_4"=>"option5_4_title",
								"option5_5"=>"option5_5_title",
								"option5_6"=>"option6_title",
								),
						"require" => true,
						),
			"nameinput6" => array(
						"type"		=> "radio",
						"label"		=> "Radio 2 lable !! <span class='label label-danger'>require</span>",
						"value"		=> "",
						"class"		=> "classInput",
						"id"		=> "idInput",
						"options"	=> array(
								"option6_1"=>"option6_1_title",
								"option6_2"=>"option6_2_title",
								"option6_3"=>"option6_3_title",
								"option6_4"=>"option6_4_title",
								"option6_5"=>"option6_5_title",
								"option6_6"=>"option6_6_title",
								),
						"require" => true,
						),
			"nameinput7" => array(
						"type"		=> "select",
						"label"		=> "Select lable !! not require",
						"value"		=> "",
						"class"		=> "classInput form-control",
						"id"		=> "idInput",
						"options"	=> array(
								""=>"Please choose option",
								"option7_1"=>"option7_1_title",
								"option7_2"=>"option7_2_title",
								"option7_3"=>"option7_3_title",
								"option7_4"=>"option7_4_title",
								"option7_5"=>"option7_5_title",
								"option7_6"=>"option7_6_title",
								),
						"require" => false,
						),
			"nameinput8" => array(
						"type"		=> "checkbox",
						"label"		=> "Checkbox lable !! <span class='label label-danger'>require</span>",
						"value"		=> "",
						"class"		=> "classInput ",
						"id"		=> "idInput",
						"options"	=> array(
								""=>"Please choose option",
								"option8_1"=>"option8_1_title",
								"option8_2"=>"option8_2_title",
								"option8_3"=>"option8_3_title",
								"option8_4"=>"option8_4_title",
								"option8_5"=>"option8_5_title",
								"option8_6"=>"option8_6_title",
								),
						"require" => true,
						),
			"nameinput9" => array(
						"type"		=> "checkbox",
						"label"		=> "Checkbox lable !! not require",
						"value"		=> "",
						"class"		=> "classInput",
						"id"		=> "idInput",
						"options"	=> array(
								""=>"Please choose option",
								"option9_1"=>"option9_1_title",
								"option9_2"=>"option9_2_title",
								"option9_3"=>"option9_3_title",
								"option9_4"=>"option9_4_title",
								"option9_5"=>"option9_5_title",
								"option9_6"=>"option9_6_title",
								),
						"require" => false,
						),
		);

		if($this->in_edit_page){
			$default_array=array (
				"nameinput1" => "Text to test edit case 1",
				"nameinput2" => "13414121",
				"nameinput2_email" => "santo@cybridge.jp",
				"nameinput3" => "Text to test edit case 3",
				"nameinput4" => "option4_1",
				"nameinput5" => "option5_3",
				"nameinput6" => "option6_4",
				"nameinput7" => "option7_5",
				"nameinput8" => array("option8_3","option8_1","option8_5"),
				"nameinput9" => array("option9_3","option9_2","option9_6"),
			);
			$this->html->_default($default_array);
		}

		if($this->input->post("submit")=="back"){
			$this->back();
		}else{
			//if don't in back submit then delete session confirm_var
			$this->session->set_userdata('confirm_var',array());
		}

		if($this->input->post('submit') == "confirm"){
			$this->confirm();
		}

		if($this->input->post("submit")=="done"){
			$this->done();
		}

		$data["form"] = $this->html->get_variable();
		$data["status"] = $this->html->status;
		$data["error_message"] = $this->html->error_message;
		$this->load->view('Html_view',$data);
	}//END: Index()

	/**
		*
		* @todo use for back button in confirm page
		* Remember variable if customer want to refix
		* @author Santo <santo@cybridge.jp>
		*
	**/
	public function back(){
		$this->html->status="back";
		$this->html->_default($this->session->userdata('confirm_var'));
	}//END: back()

	//----------------------------------------------------------------------------------

	/**
		*
		* @todo confrim variable before done form
		* @author Santo <santo@cybridge.jp>
		*
	**/
	public function confirm(){
		$this->html->error_message=array();
		$this->html->status="confirm";
		$this->session->set_userdata('confirm_var',$this->input->post());
		foreach ($this->html->_element as $key => $value) {
			$this->html->_element[$key]["value"] = $this->input->post($key);
			if(isset($this->html->_element[$key]["rule"])){
				$data_to_catch = $this->html->_element[$key];
				$result = $this->html->{"rule_".$data_to_catch["rule"]}( $data_to_catch["value"] );
				if($result["allow"]==false){
					$this->html->error_message[]= array(
						"field" => $data_to_catch["label"],
						"message" => $result["message"],
					);
					$this->back();
				}
			}
			if($this->html->_element[$key]["require"]){
				$data_to_catch = $this->html->_element[$key];
				if($data_to_catch["value"]==""){
					$this->html->error_message[]= array(
						"field" => $data_to_catch["label"],
						"message" => "don't allow to null",
					);
					$this->back();
				}
			}

		}

	}//END: confirm()

	//----------------------------------------------------------------------------------

	/**
		*
		* @todo done form
		* in this function customer can update or insert to database
		* @author Santo <santo@cybridge.jp>
		*
	**/
	public function done(){
		$this->html->status="done";
		$data = $this->input->post();
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		if($this->input->get('case_form') == "addnew"){
			echo "<h3>Insert to database</h3>";
		}else{
			echo "<h3>Update to database</h3>";
		}
		
		exit;
	}//END: done()

}
