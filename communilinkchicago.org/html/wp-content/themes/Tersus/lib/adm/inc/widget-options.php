<?php 
function optionsmenu($pos,$id,$defaultwidget) {


	$code = "<div class=\"postbox\">"
			."<div class=\"handlediv\" title=\"Click to toggle\"><br /></div>\n"
			."<h3 class='hndle'><span>". $id ." Column Widget Selector</span></h3>\n"
			."<div class=\"inside\">\n"
			
			."<div class=\"optionselect\"><label for=\"". $pos.$id ."select\">Selected Widget: </label>\n"
			."<select id=\"". $pos.$id ."select\" name=\"". $pos.$id ."select\" onchange=\"toggle_shrtcode(this.options[this.options.selectedIndex].value,'". $pos.$id ."select')\">\n"
			."<option";
			if(get_option($pos.$id."select")==$pos.$id."-1") {
			$code=$code." selected";
			}
			$code=$code." value=\"". $pos.$id ."-1\"> Custom HTML </option>\n"
			."<option";
			if(get_option($pos.$id."select")==$pos.$id."-2") {
			$code=$code." selected";
			}			
			$code=$code." value=\"". $pos.$id ."-2\"> Contact Form </option>\n"
			."<option";
			if(get_option($pos.$id."select")==$pos.$id."-3") {
			$code=$code." selected";
			}
			$code=$code." value=\"". $pos.$id ."-3\"> Pages List </option>\n"	
			."<option";
			if(get_option($pos.$id."select")==$pos.$id."-4") {
			$code=$code." selected";
			}
			$code=$code." value=\"". $pos.$id ."-4\"> Recent Posts </option>\n"
			."<option";
			if(get_option($pos.$id."select")==$pos.$id."-5") {
			$code=$code." selected";
			}			
			$code=$code." value=\"". $pos.$id ."-5\"> Categories </option>\n"
			."<option"; 
			if(get_option($pos.$id."select")==$pos.$id."-6") {
			$code=$code." selected";
			}			
			$code=$code." value=\"". $pos.$id ."-6\"> Meta Information </option>\n"
			."<option";
			if(get_option($pos.$id."select")=="") {
			$code=$code." selected";
			}
			$code=$code." value=\"". $pos.$id."-".$defaultwidget ."\"> Default </option>\n"											
			."</select><small class=\"description\">The selected Widget options will appear below for customisation.</small>\n"
			."</div>"

							
            ."<div id=\"". $pos.$id ."-1\">\n" // Custom HTML

			."<table class=\"form-table\">\n"
			."<tr valign=\"top\">\n"
			."<td colspan=\"2\" class=\"tr-top-lite\">\n"
			."<em><strong>Custom HTML Widget</strong></em>\n" 
			."</td>\n"
			."</tr>\n"		
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top title\">\n"
			."<label for=\"". $pos.$id ."htmltitle\">Custom HTML Widget Title.</label>\n"
			."</td>\n" 
			."<td class=\"tr-top\">\n" 
			."	<input type=\"text\" name=\"". $pos.$id ."htmltitle\"  value=\"". get_option($pos.$id.'htmltitle') ."\" size=\"30\" /><small class=\"description\"></small>\n"
			."</td>\n"
			."</tr>\n"
			."<tr valign=\"top\">\n"
			."<td colspan=\"2\" class=\"tr-top-lite\">\n" 
            ."<div id=\"poststuff\" style=\"width:650px;\">\n"
			."||"
            ."</div>\n"
			."</td>\n"
			."</tr>\n"
			."</table>\n"

			."</div>\n"
            
			
			."<div id=\"". $pos.$id ."-2\">\n" // Contact Form

			."<table class=\"form-table\">\n"
			."<tr valign=\"top\">\n"
			."<td colspan=\"2\" class=\"tr-top-lite\">\n"
			."<em><strong>Contact Form Widget</strong></em>\n" 
			."</td>\n"
			."</tr>\n"	
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top title\">\n"
			."<label for=\"". $pos.$id ."contacttitle\">Contact Form Title</label>\n"
			."</td>\n" 
			."<td class=\"tr-top\">\n" 
			."	<input type=\"text\" name=\"". $pos.$id ."contacttitle\"  value=\"". get_option($pos.$id.'contacttitle') ."\" size=\"30\" /><small class=\"description\"> e.g. 'Enquiry 
Form'.</small>\n"
			."</td>\n"
			."</tr>"
			
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top-lite title\">\n"
			."<label for=\"". $pos.$id ."contactdesc\">Form Description</label>\n"
			."</td>\n" 
			."<td class=\"tr-top-lite\">\n" 
			."	<input name=\"". $pos.$id ."contactdesc\" type=\"text\"  value=\"". get_option($pos.$id.'contactdesc') ."\" size=\"30\" />\n"
			."	<small class=\"description\">Enter a description which will appear below the title.</small>\n"
			."</td>\n"
			."</tr>\n"
			
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top title\">\n"
			."<label for=\"". $pos.$id ."contactemail\">Email address to send enquiries to</label>\n"
			."</td>" 
			."<td class=\"tr-top\">" 
			."	<input type=\"text\" name=\"". $pos.$id ."contactemail\"  value=\"". get_option($pos.$id.'contactemail') ."\" size=\"30\" /> <small class=\"description\">If blank the email addresss set 

in <a href=\"options-general.php\">Settings</a> is used.</small></td>\n"
			."</tr>\n"
			
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top-lite title\">\n"
			."<label for=\"". $pos.$id ."contactmsg\">Thank you message</label>\n"
			."</td>\n" 
			."<td class=\"tr-top-lite\">\n"
			."	<input name=\"". $pos.$id ."contactmsg\" type=\"text\"  value=\"". get_option($pos.$id.'contactmsg') ."\" size=\"30\" />\n"
			."	<small class=\"description\">Default is \"Thankyou for your enquiry.\"</small>\n"
			."</td>\n"
			."</tr>\n"
			
			."</table>\n"

            ."</div>\n"
			

            ."<div id=\"". $pos.$id ."-3\">\n" // Pages List
		
			."<table class=\"form-table\">\n"
			."<tr valign=\"top\">\n"
			."<td colspan=\"2\" class=\"tr-top-lite\">\n"
			."<em><strong>Pages List Widget</strong></em>\n" 
			."</td>\n"
			."</tr>\n"			
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top title\">\n"
			."<label for=\"". $pos.$id ."pagestitle\">Pages List Widget Title.</label>\n"
			."</td>\n" 
			."<td class=\"tr-top\">\n" 
			."	<input type=\"text\" name=\"". $pos.$id ."pagestitle\"  value=\"". get_option($pos.$id.'pagestitle') ."\" size=\"30\" /><small class=\"description\"> e.g. 'Pages'.</small>\n"
			."</td>\n" 
			."</tr>\n"
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top-lite title\">\n"
			."<label for=\"". $pos.$id ."pagesexc\">Exclude pages by ID.</label>\n"
			."</td>\n" 
			."<td class=\"tr-top-lite\">\n" 
			."	<input type=\"text\" name=\"". $pos.$id ."pagesexc\"  value=\"". get_option($pos.$id.'pagesexc') ."\" size=\"30\" /><small class=\"description\">Enter page ID's seperated by a comma e.g. 2,5,19</small>\n"
			."</td>\n" 
			."</tr>\n"

			."\n</table>\n"

            ."</div>\n"		


			."<div id=\"". $pos.$id ."-4\">\n" // Recent Posts
		
			."<table class=\"form-table\">\n"
			."<tr valign=\"top\">\n"
			."<td colspan=\"2\" class=\"tr-top-lite\">\n"
			."<em><strong>Recent Posts Widget</strong></em>\n" 
			."</td>\n"
			."</tr>\n"
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top title\">\n"
			."<label for=\"". $pos.$id ."recenttitle\" >Recent Posts Widget Title.</label>" 
			."\n</td>\n"
			."<td class=\"tr-top\">\n" 
			."<input type=\"text\" name=\"". $pos.$id ."recenttitle\" size=\"30\" value=\"". get_option($pos.$id.'recenttitle') ."\" /><small class=\"description\"> e.g. \"Recent Posts\"</small>" 
			."\n</td>\n" 
			."</tr>\n"
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top-lite\"><label>Display recent posts from which category?</label><br />\n"
			."\n</td>\n"
			."<td class=\"tr-top-lite\">\n"
			."||"
			."\n</td>\n"
			."</tr>\n"	
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top title\">\n"
			."<label for=\"". $pos.$id ."recentnum\" >How many posts to display?</label>" 
			."\n</td>\n"
			."<td class=\"tr-top\">\n" 
			."<input type=\"text\" name=\"". $pos.$id ."recentnum\" size=\"5\" value=\"". get_option($pos.$id.'recentnum') ."\" /><small class=\"description\">Default is Unlimited</small>" 
			."\n</td>\n" 
			."</tr>\n"					
			."\n</table>\n"

            ."</div>\n"			


            ."<div id=\"". $pos.$id ."-5\">\n" // Categories
			
			."<table class=\"form-table\">\n"
			."<tr valign=\"top\">\n"
			."<td colspan=\"2\" class=\"tr-top-lite\">\n"
			."<em><strong>Categories Widget</strong></em>\n" 
			."</td>\n"
			."</tr>\n"
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top title\">\n"
			."<label for=\"". $pos.$id ."cattitle\" >Categories Widget Title.</label>" 
			."\n</td>\n"
			."<td class=\"tr-top\">\n"
			."<input type=\"text\" name=\"". $pos.$id ."cattitle\" size=\"30\" value=\"". get_option($pos.$id.'cattitle') ."\" /><small class=\"description\"> e.g. \"Categories\"</small>" 
			."\n</td>\n"
			."</tr>\n"			
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top-lite title\"><label>Select the categories you would like to display.</label>\n"
			."</td>\n"
			."<td class=\"tr-top-lite\">\n"
			."||"
			."\n</td>\n"			
			."</tr>\n"
			."\n</table>\n"

            ."</div>\n"



            ."<div id=\"". $pos.$id ."-6\">\n" // Meta Information


			."<table class=\"form-table\">\n"
			."<tr valign=\"top\">\n"
			."<td colspan=\"2\" class=\"tr-top-lite\">\n"
			."<em><strong>Meta Information Widget</strong></em>\n" 
			."</td>\n"
			."</tr>\n"
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top title\">\n"
			."<label for=\"". $pos.$id ."metatitle\" >Meta Information Widget Title.</label>" 
			."\n</td>\n"			
			."<td class=\"tr-top\">\n"
			."<input type=\"text\" name=\"". $pos.$id ."metatitle\" size=\"30\" value=\"". get_option($pos.$id.'metatitle') ."\" /><small class=\"description\"> e.g. \"Meta Information\"</small>" 
			."\n</td>\n"	
			."<tr valign=\"top\">\n"
			."<td class=\"tr-top-lite title\">\n"
			."<label for=\"". $pos.$id ."cattitle\" >Select Meta options to display.</label>" 
			."\n</td>\n"
			."<td class=\"tr-top-lite\">\n" 
			."<label>Site Admin</label> <input class=\"hspace\" name=\"". $pos.$id ."meta1\"";
			if(get_option($pos.$id."meta1")=="enable") {
			$code=$code." checked=\"checked\" ";
			}	
			$code=$code."type=\"checkbox\" value=\"enable\" />"
			."<label>Log In / Out</label> <input class=\"hspace\" name=\"". $pos.$id ."meta2\"";
			if(get_option($pos.$id."meta2")=="enable") {
			$code=$code." checked=\"checked\" ";
			}	
			$code=$code."type=\"checkbox\" value=\"enable\" />"			
			."<label>Entries RSS</label> <input class=\"hspace\" name=\"". $pos.$id ."meta3\"";
			if(get_option($pos.$id."meta3")=="enable") {
			$code=$code." checked=\"checked\" ";
			}	
			$code=$code."type=\"checkbox\" value=\"enable\" />"			
			."<label>Comments RSS</label> <input class=\"hspace\" name=\"". $pos.$id ."meta4\"";
			if(get_option($pos.$id."meta4")=="enable") {
			$code=$code." checked=\"checked\" ";
			}	
			$code=$code."type=\"checkbox\" value=\"enable\" />"
			."<label>WordPress.org</label> <input class=\"hspace\" name=\"". $pos.$id ."meta5\"";	
			if(get_option($pos.$id."meta5")=="enable") {
			$code=$code." checked=\"checked\" ";
			}	
			$code=$code."type=\"checkbox\" value=\"enable\" />"
			."\n</td>\n" 
			."</tr>\n"
			."\n</table>\n"

            ."</div>\n"

			."</div><!-- /inside -->\n"
			."</div><!-- /postbox -->\n";

return $code;
}
?>