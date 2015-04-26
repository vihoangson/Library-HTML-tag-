 <?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Core_Smarty Class
 *
 * @package    CodeIgniter
 * @subpackage    Libraries
 * @category    Parser
 * @author    Truong Chuong Duong
 * @copyright    Copyright (c) 2012, Truong Chuong Duong. (http://chuongduong.net/)
 * @license    http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link    http://chuongduong.net
 * @email    info@chuongduong.net
 * @since    Version 0.1
 */
/**
 * See http://www.smarty.net/docs/en/installing.smarty.extended.tpl.
 */
require APPPATH . '/third_party/HtmlTag/src/HtmlTag.php';

class Htmltag_class extends HtmlTag {

}

/* GHI CHU 4 */
//Auto init and replace the default parser
$CI = & get_instance();
$CI->html = new Htmltag_class;
//$CI->view = &$CI->parser;


/* End of file Core_smarty.php */ 