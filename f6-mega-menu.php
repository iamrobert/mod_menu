<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
// Note. It is important to remove spaces between elements.

?>
   
   
   
<!--     <li class="has-submenu megamenu"> <a href="#">診療項目</a>
                          <ul class="submenu menu vertical dropdown-wrapper hide-sm" data-submenu>
                            <li>
                              <div class="row expanded collapse">
                                <div class="small-12 medium-6 columns"> -->

<ul data-responsive-menu="drilldown mainnav-dropdown" data-auto-height="true" data-animate-height="true" data-parent-link="true" class="dropdown medium-horizontal menu">
    <?php
	
					// Test if this is the last item
				
	
		$megachild = '';
	
    foreach ($list as $i => &$item) :
        $class = 'item-'.$item->id;
        if ($item->id == $active_id) {
            $class .= ' current';
        }
    
        if (in_array($item->id, $path)) {
            $class .= ' active';
        }
        elseif ($item->type == 'alias') {
            $aliasToId = $item->params->get('aliasoptions');
            if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
                $class .= ' active';
            }
            elseif (in_array($aliasToId, $path)) {
                $class .= ' alias-parent-active';
            }
        }

        if ($item->deeper) {
            $class .= ' deeper';
        }
    
        if ($item->parent) {
            $class .= ' parent has-submenu';
        }
    


//MEGA MENU vertical dropdown-wrapper hide-sm
if (strpos($item->anchor_css,'mega') !== false) {
    $class .= ' megamenu';
	$megachild = ' dropdown-wrapper hide-sm';
	}
	

	
	if (strpos($item->title,'col1') !== false) {
		echo '<li>
                       <div class="grid-x">
                              <div class="cell auto"><ul>';
	}
	
	
	
	
	//COLEND is for end colstart col2
	if (strpos($item->title,'colend') !== false) {
		echo '</ul> </div><div class="cell auto"><ul>';
	}	

	
		if (strpos($item->title,'rowend') !== false) {
		echo '</ul></div></div></li>';
	}
	
	

	

	
	
	if (!empty($class)) {
            $class = ' class="'.trim($class) .'"';
        }
	
	
	if (strpos($item->title,'col1') === false || (strpos($item->title,'rowend') !== false) || (strpos($item->title,'colend') !== false)) {
	
		
					//if (strpos($item->title,'col1') !== false || strpos($item->title,'rowend') !== false || strpos($item->title,'colend') !== false  || strpos($item->title,'expandstart') !== false  || strpos($item->title,'expandend') !== false) {
						
        echo '<li'.$class.'>';
			
		}
    	
        // Render the menu item.
        switch ($item->type) :
            case 'separator':
            case 'url':
            case 'component':
                require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
                break;
    
            default:
                require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                break;
        endswitch;
      

	
        // The next item is deeper.
        if ($item->deeper) {
            echo '<ul class="submenu menu vertical '.$megachild.'" data-submenu>';
        }
        // The next item is shallower.
        elseif ($item->shallower) {
			echo '</li>';
            echo str_repeat('</ul></li>', $item->level_diff);
        }
	

	
        // The next item is on the same level.
        else {
		//if (strpos($item->title,'col1') === false || (strpos($item->title,'rowend') !== false) || (strpos($item->title,'colend') !== false)) {
		
	if (strpos($item->title,'col1') === false || (strpos($item->title,'rowend') !== false) || (strpos($item->title,'colend') !== false)) {
				
            echo '</li>';
		}


			
        }
	
	
    endforeach;
	echo '<li class="hide-for-mainnav"><a href="'.JURI::base().'contact">Contact</a></li>'
				

    ?></ul>
