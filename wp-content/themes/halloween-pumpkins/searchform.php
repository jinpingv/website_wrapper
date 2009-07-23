<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
<div>
<label for="s">Keyword(s)</label> <input class="text" type="text" value="<?php if(trim(wp_specialchars($s,1))!='') echo trim(wp_specialchars($s,1));else echo ' ';?>" name="s" id="s" />
<input type="submit" class="submit" name="Submit" value="Search" />
</div>
</form>