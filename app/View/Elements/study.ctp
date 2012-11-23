<?php
if($newadd = isset($sstart)) {
	$this->layout = 'ajax'; # ready for insertion
	$length = $sstart + 1; # if it's supposed to be added anew, tell me where to start
} else {
	$length = count ( $this->data['Study'] ); # data gets only passed if it wasn't added anew
	$sstart = 0; # start from the beginning
}
for($s= $sstart; $s < $length; $s++) {
	
	echo "<h3>Study Nr. $s </h3>";
	
	echo $this->Form->hidden("Study.$s.id");	
	echo $this->Form->hidden("Study.$s.codedpaper_id");	
	echo $this->Form->input("Study.$s.replication_code");	

	$options = array( "s" => $s );
	if($newadd) $options["estart"] = 0;
	else $options["data"] = $this->data;
	echo $this->element('effect', $options);
}
$addstudyid = "study_adder";
echo "<h4>";
echo  $this->Html->link("Add Study $s",
	array('controller' => 'codedpapers', 'action' => 'morestudies'),
	array('id' => $addstudyid));
echo "</h4>";
?>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function () {$("#<?=$addstudyid?>").bind("click", function (event) {$.ajax( {data:"sstart=<?=$s?>", dataType:"html", success:function (data, textStatus) {
	$("#<?=$addstudyid?>").replaceWith(data);
	}, url:"\/ArchivalProject\/codedpapers\/morestudies"});
return false;});});
//]]>;
</script>