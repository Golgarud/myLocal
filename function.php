<?php
function displayHead()
{
	echo <<<EOF
	<!DOCTYPE html>
	<html>
	<head>
		<title>localHost | homeSweetHome...</title>
		<link rel="stylesheet" type="text/css" href="./myLocal/css/reset.css">
		<link rel="stylesheet" type="text/css" href="./myLocal/css/jquery.mmenu.all.css">
		<link rel="stylesheet" type="text/css" href="./myLocal/css/styles.css">
		<link rel="stylesheet" type="text/css" href="./myLocal/css/media.css">
	</head>
	<body>
		<div id="main">
EOF;
}

function displayHeader()
{
	echo '<a id="btnMenu" href="#menu"><img src="./myLocal/img/menu.png" alt="menu"/></a>';
}

function displayMM()
{
echo <<<EOF
	<nav id="menu">
	<ul>
		<li><a href="../xampp/">XAMPP</a>
			<ul>
				<li><a href="../xampp/status.php">Statuts</a></li>
				<li><a href="../security/index.php">Securité</a></li>
				<li><a href="../xampp/manuals.php">Manuel</a></li>
			</ul>
		</li>
		<li><a href="../xampp/components.php">Infos</a>
			<ul>
				<li><a href="../xampp/phpinfo.php">PHP</a></li>
				<li><a href="../xampp/perlinfo.pl">Perl</a></li>
				<li><a href="../xampp/java.php">J2ee</a></li>
			</ul>
		</li>
		<li><a href="../phpmyadmin/">PhpMyAdmin</a></li>
		<li><a href="../webalizer/">webAlizer</a></li>
		<li><a href="../xampp/mailform.php/">mailForm</a></li>
	</ul>
	</nav>
EOF;
}

function displayFooter()
{
	echo "</div><!-- #main -->";
	displayMM();
}

function displayFoot()
{
echo <<<EOF
	</body>
	<script src="./myLocal/js/jquery_2_1_4.js" type="text/javascript" charset="utf-8"></script>
	<script src="./myLocal/js/jquery.mmenu.min.all.js" type="text/javascript" charset="utf-8"></script>
	<script src="./myLocal/js/scripts.js" type="text/javascript" charset="utf-8"></script>
</html>
EOF;
}
function displayList()
{
	echo '<ul class="site-l">';
	$files = scandir("./");

	foreach ($files as $key => $value) 
	{
		if (
				isset($value)
			&&	$value !=".."
			&&	$value !="."
			&&	$value !="index.php"
			&&	$value !="myLocal"
			)
		{
			$img = "";
			$folder = array('myLocal/screen', $value."/img", $value);
			$name = array($value, "screen", "screenshot", "logo", "maquette");
			$ext = array("png", "jpg", "svg", "gif");
			$baseUrl = "";
			$identifier = "";
			$link = "";
			$linkType = "";
			$xmlfile = $value."/.git/sourcetreeconfig";
			$confFile = $value."/.git/config";
			foreach ($folder as $k1 => $fileFold) 
			{
				foreach ($name as $k2 => $fileName)
				{
					foreach ($ext as $k3 => $fileExt)
					{
						if (file_exists($fileFold.'/'.$fileName.'.'.$fileExt)) {
							$img = $fileFold.'/'.$fileName.'.'.$fileExt;
							break;
						}
					}
				}
			}
			
			if (file_exists($xmlfile)) {
				
				$xmlparser = xml_parser_create();
				$fp = fopen($xmlfile, 'r');
				$xmldata = fread($fp, 4096);
				xml_parse_into_struct($xmlparser,$xmldata,$values);
				xml_parser_free($xmlparser);
				$conffBitBucket = $values;
				foreach ($conffBitBucket as $key => $conff) {
					if ($conff["tag"] == "BASEURL")
					{
						$baseUrl = $conff["value"];
					}
					elseif($conff["tag"] == "IDENTIFIER")
					{
						$identifier = $conff["value"];
					}
				}
			}
			elseif(file_exists($confFile))
			{
				$fp = fopen($confFile, 'r');
				$data = fread($fp, 4096);
				$conffGitSplit = array();
				$data = str_replace(array(' ','&lt;br/&gt;','&quot;', '	', '\nl', '\r', '\rn', '\r\n', '\n\r','"', ']','['), '', $data);
				$data = nl2br($data);
				$data = split('\nl', $data);
				$conff = "";
				foreach ($data as $key => $val) {
					$conff .= $val;
				}
				$conffGit = split('<br />', $conff);
				foreach ($conffGit as $key => $v)
				{
					$v = split('=',$v);
				
					if ( !empty($v[0]) && !empty($v[1]) )
					{
						$v[0] = preg_replace("/[^A-Za-z0-9 ]/", '',$v[0]);
						$conffGitSplit[$v[0]] = $v[1];
					}
				}
				if (!empty($conffGitSplit["url"]))
				{
					$link = $conffGitSplit["url"];
					if ( isset( split( "github", $link )[1] ) )
					{
						$linkType = "github";
					}
					elseif ( isset( split( "bitbucket", $link )[1] ) ) {
						$linkType = "bitbucket";
					}
					else
					{
						$linkType = "git";
					}
				}
			}
			echo "<li class='site'>";
				echo "<div class='site-content' style='background-image:url(".$img.")''>";
					if ( !empty($baseUrl) && !empty($identifier) )
					{
						echo "<a class='git-link' target='_blank' href='".$baseUrl."/".$identifier."' title='".$value." bitbucket'><img src='./myLocal/img/bitbucket_logo.png' alt='logo bitbucket'/></a>";
					}
					elseif( !empty($link) && !empty($linkType) )
					{
						echo "<a class='git-link' target='_blank' href='".$link."' title='".$value." ".$linkType."'><img src='./myLocal/img/".$linkType."_logo.png' alt='logo ".$linkType."'/></a>";
					}
					echo "<a class='local-link' href='".$value."' title='".$value." local'>".$value."</a>";
				echo "</div>";
			echo "</li>";
		}
	}
	echo '</ul>';
}
?>