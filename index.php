<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
  	<meta name="description" content="View your JSON file structure with this Online JSON Tree Viewer. Show your JSON in a collapsible tree hierarchy developed using jQuery and jQuery.TreeView." />
	<meta name="keywords" content="jquery online tree,jquery json viewer,jquery tree viewer,find path json,jquery json online tool,jquery json demo" />
	
	<title>Online JSON Tree Viewer | jQuery4u</title>
	
	<link rel="stylesheet" href="css/jquery.treeview.css" />
	<link rel="stylesheet" href="css/screen.css" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script src="js/jquery.treeview.js" type="text/javascript"></script>
	<script src="js/jquery.treeview.async.js" type="text/javascript"></script>
	<!--<script src="js/jquery.livequery.min.js" type="text/javascript"></script>-->
	<script src="js/jQueryRotateCompressed.2.1.js" type="text/javascript"></script>
	<script src="js/jquery.jsontreeviewer.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	$(function(){
		//Initialise JQUERY4U JSON Tree Viewer
		JSONTREEVIEWER.init();
		
		//Events to load example files
		$('#example1').bind('click', function(){
			JSONTREEVIEWER.processJSONTree('one-level.json');
		});
		$('#example2').bind('click', function(){
			JSONTREEVIEWER.processJSONTree('ItemGroup4.json');
		});
		$('#example3').bind('click', function(){
			JSONTREEVIEWER.processJSONTree('five-levels.json');
		});
		$('#example4').bind('click', function(){
			JSONTREEVIEWER.processJSONTree('ten-levels.json');
		});
	});
	</script>
	
	</head>
	<body>
	
	<h1><a href="http://www.jquery4u.com/tools/online-json-tree-viewer/">Online JSON Tree Viewer Tool</a></h1>
	
	<div style="float:left;position:absolute;top:5px;right:5px;text-align:right;">
	<a style="color:orange;font-weight:bold;" href="http://www.jquery4u.com/demos/">BACK TO JQUERY4U DEMOS</a>
	</div>
	
	<div id="main">
	
	<p><strong>This tool loads a JSON file and displays the hierarchical structure of the data and values. <a target="_blank" href="http://www.jquery4u.com/tutorials/online-json-tree-viewer/">JSON Tree Viewer Tutorial</a></strong></p>
	
	<div style="background-color:#E3EEFC;" id="options">
	<br/>
	<p>
	<a id="instructions-toggle" href="#">Instructions</a> / 
	<a id="examples-toggle" href="#">Examples</a> / 
	<a id="options-toggle" href="#">Options</a>
	</p>
	
	<div id="instructions-wrap" style="display:none;">
	<h2 style="margin:0px;padding-bottom:0px;"><a id="instructions-toggle" href="#">Instructions</a></h2>
	<ol>
	<li><p><a rel="nofollow" href="http://www.jsonlint.com/" target="_blank"><strong>Validate</strong> your JSON file</a> before loading it.</p></li>
	<li><p><strong>Load</strong> your JSON file using the browse button below.</li>
	<li><p><strong>Hover</strong> the nodes to see the tree path (bottom right of screen).</p></li>
	<li><p><strong>Click</strong> the nodes to copy the tree path.</p></li>
	</ol>
	</div>
	
	<div id="examples-wrap" style="display:none;">
	<h2 style="margin:0px;padding-bottom:0px;"><a id="examples-toggle" href="#">Examples</a></h2>
	<p>View some example JSON Trees: 
	<button id="example1">1 level</button>
	<button id="example2">2 levels</button>
	<button id="example3">5 levels</button>
	<button id="example4">10 levels</button>
	<button type="button" id="reset" name="reset">Reset</button>
	</p>
	</div>
	
	<div id="options-wrap" style="display:none;">
	<h2 style="margin:0px;padding-bottom:0px;"><a id="options-toggle" href="#">Options</a></h2>
	<form id="form2" action="" method="post">
		<input type="checkbox" id="hierarchy_chk" name="hierarchy_chk" title="" checked /> Show hierarchy (if unchecked shows values only)<br / >
		<input type="text" id="pathdelim_chk" value="." /> Delimeter for path copy (ie dot "." or forward slash "/")
	</form>	
	</div>
	
	<h2>Load JSON</h2>
	<form id="form1" action="" method="post">
		<label for="loadfile">Upload your JSON file: </label>
		<input type="file" id="loadfile" name="loadfile" title="" /> OR 
		<a id="copyandpaste-show" href="#">Copy and Paste JSON</a> 
	</form>
	
	<div id="copyandpaste-area" style="display:none;">
		<br/>
		<form id="form1" action="" method="post">
			<textarea id="copyandpastejson" rows="10" cols="120"></textarea><br/>
			<input type="button" id="loadcopyandpaste" name="loadcopyandpaste" value="Generate JSON Tree" />
		</form>
	</div>
	
	<br /><br />
	
	</div> <!-- options -->
	
	<div id="options-control">
		<a id="options_btn"><img id="arrowoptionstoggle" src="images/up-arrow.png" alt="show/hide options" /></a>
	</div>
	
	<div id="toppathwrap">
		<a id="closetoppath" href="#">Close</a>
		<textarea id="accumpaths"></textarea>
	</div>
	
	<div id="pathtonode"></div> 
	
	<hr />

	<h2><span id="selected_filename"></span></h2>
	<img id="loading" src="images/loading.gif" />
	
	<p id="browser-text" class="green bold">Your JSON data tree will appear here.</p>
	
	<div id="treecontrol">
		<a title="Collapse the entire tree below" href="#"><img src="images/minus.gif" /> Collapse Base</a>
		<a title="Expand the entire tree below" href="#"><img src="images/plus.gif" /> Expand Base</a>
	</div>
	<ul id="browser" class="filetree treeview-famfamfam">

	<!--
		<li><span class="folder">Folder 1</span>
			<ul>
				<li><span class="folder">Item 1.1</span>
					<ul>

						<li><span class="file">Item 1.1.1</span></li>
					</ul>
				</li>
				<li><span class="folder">Folder 2</span>
					<ul>
						<li><span class="folder">Subfolder 2.1</span>
							<ul id="folder21">

								<li><span class="file">File 2.1.1</span></li>
								<li><span class="file">File 2.1.2</span></li>
							</ul>
						</li>
						<li><span class="folder">Subfolder 2.2</span>
							<ul>
								<li><span class="file">File 2.2.1</span></li>

								<li><span class="file">File 2.2.2</span></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="closed"><span class="folder">Folder 3 (closed at start)</span>
					<ul>
						<li><span class="file">File 3.1</span></li>

					</ul>
				</li>
				<li><span class="file">File 4</span></li>
			</ul>
		</li>
	-->
	
	</ul>
	
</div>

<br />
<hr />
<br />
	
	<!-- footer (includes analytics) -->
	<?php 
	
	//include("../footer.php"); 
	
	?>
 
</body></html>