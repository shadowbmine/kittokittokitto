<?php/** * Jump Page Admin * * @author Copy112s <copy112@gmail.com> * @copyright Copy112, 2008 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 * @package Settings admin for MG (modulargaming) * @version 1.0 **/$uri->name(array("id"));$id = stripinput($_URI['id']);if ($id == "new"){	switch($_REQUEST['state'])	{		default:		{			$renderer->assign('id',$id);			$renderer->display('admin/settings/jump_page_new.tpl');				break;		} // end default					case 'process':		{								$JUMP = array(				'page_title' => $_POST['jump']['page_title'],	            'page_html_title' => $_POST['jump']['page_html_title'],	            'layout_type' => $_POST['jump']['layout_type'],	            'page_slug' => $_POST['jump']['page_slug'],				'access_level' => $_POST['jump']['access_level'],				'restricted_permission_api_name' => $_POST['jump']['restricted_permission_api_name'],				'php_script' => $_POST['jump']['php_script'],				'include_tinymce' => $_POST['jump']['include_tinymce'],				'active' => $_POST['jump']['active'],			);										// Create an user and set some base attrs.			$jump_edit = new JumpPage($db);			$jump_edit->setPageTitle($JUMP['page_title']);			$jump_edit->setPageHtmlTitle($JUMP['page_html_title']);    		$jump_edit->setLayoutType($JUMP['layout_type']);      		$jump_edit->setPageSlug($JUMP['page_slug']);       		$jump_edit->setAccessLevel($JUMP['access_level']);       		$jump_edit->setRestrictedPermissionApiName($JUMP['restricted_permission_api_name']);			$jump_edit->setPhpScript($JUMP['php_script']);			$jump_edit->setIncludeTinymce($JUMP['include_tinymce']);			$jump_edit->setActive($JUMP['active']);			$jump_edit->save();			redirect('admin-jump');						break;		} // end process	} // end switch}else{if ($id == null){	$JUMP_PAGE_LIST = array();	$jump_page2 = new JumpPage($db);	$jump_page2 = $jump_page2->findBy(array());	foreach($jump_page2 as $jump_list)	{   		$JUMP_PAGE_LIST[] = array(   	  	  'id' => $jump_list->getJumpPageId(),   		  'page_title' => $jump_list->getPageTitle(),   		);	} // end user list		$renderer->assign('jump_list',$JUMP_PAGE_LIST);	$renderer->assign('jump_available',(bool)sizeof($JUMP_PAGE_LIST));	$renderer->display('admin/settings/jump_page_list.tpl');}else{	switch($_REQUEST['state'])	{		default:		{			$jump_page2 = new JumpPage($db);			$jump_page2 = $jump_page2->findOneByJumpPageId($id);			$jump_page2 = array(			    'id' => $jump_page2->getJumpPageId(),				'page_title' => $jump_page2->getPageTitle(),				'page_html_title' => $jump_page2->getPageHtmlTitle(),				'layout_type' => $jump_page2->getLayoutType(),				'page_slug' => $jump_page2->getPageSlug(),				'access_level' => $jump_page2->getAccessLevel(),				'restricted_permission_api_name' => $jump_page2->getRestreictedPermissionApiName(),				'php_script' => $jump_page2->getPhpScript(),				'include_tinymce' => $jump_page2->getIncludeTinymce(),				'active' => $jump_page2->getActive(),			);						$renderer->assign('id',$id);			$renderer->assign('jump_page',$jump_page2);			$renderer->display('admin/settings/jump_page_display.tpl');				break;		} // end default					case 'process':		{								$JUMP = array(				'id' => $_POST['jump']['id'],				'page_title' => $_POST['jump']['page_title'],	            'page_html_title' => $_POST['jump']['page_html_title'],	            'layout_type' => $_POST['jump']['layout_type'],	            'page_slug' => $_POST['jump']['page_slug'],				'access_level' => $_POST['jump']['access_level'],				'restricted_permission_api_name' => $_POST['jump']['restricted_permission_api_name'],				'php_script' => $_POST['jump']['php_script'],				'include_tinymce' => $_POST['jump']['include_tinymce'],				'active' => $_POST['jump']['active'],			);										// Create an user and set some base attrs.			$jump_edit = new JumpPage($db);			$jump_edit = $jump_edit->findOneByJumpPageId($id);			$jump_edit->setPageTitle($JUMP['page_title']);			$jump_edit->setPageHtmlTitle($JUMP['page_html_title']);    		$jump_edit->setLayoutType($JUMP['layout_type']);      		$jump_edit->setPageSlug($JUMP['page_slug']);       		$jump_edit->setAccessLevel($JUMP['access_level']);       		$jump_edit->setRestrictedPermissionApiName($JUMP['restricted_permission_api_name']);			$jump_edit->setPhpScript($JUMP['php_script']);			$jump_edit->setIncludeTinymce($JUMP['include_tinymce']);			$jump_edit->setActive($JUMP['active']);			$jump_edit->save();			redirect('admin-jump');						break;		} // end process	} // end switch}}?>