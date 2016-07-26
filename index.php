<?php 
/*****************************************************************************************
Block the following directories:

* Feel free to add more directory names you'd like to block here (separate by comma (","))
*****************************************************************************************/
$block = array('template','_notes');

?>
<?php require_once('template/includes/initialize.php'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php require_once('template/layouts/derp.php'); ?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Project History Template</title>
<meta name="robots" content="noindex,nofollow">

<?php require_once('template/layouts/header_assets.php'); ?>
</head>

<body class="home <?php echo $body_class; ?>">

<div class="container template group">
	<div class="row">
    	<div class="col-sm-10 col-sm-offset-1">
            <h1>Project History for: << CLIENT NAME HERE >></h1>
            
            <br>
                                
            <h2>Well, Hello There...</h2>
            <p>This is a simple template built by a freelancer to help out other freelance web developers/designers managing multiple work for their clients. In a nutshell, it allows you to password protect a directory of ALL projects for a specific client which:<br><br>
 
            (1) Allows a client to view all their web projects in one place, <br>
			(2) Prevents that directory from being indexed by google and <br>
			(3) <strong>Helps keeps you organized as FU*^!</strong> </p>
            
            <br><br>
            
     		<ul class="nav nav-tabs" role="tablist">
       			<li role="presentation" class="active"><a href="#howitworks" aria-controls="howitworks" role="tab" data-toggle="tab">How It Works</a></li>
          		<li role="presentation"><a href="#addingprojects" aria-controls="addingprojects" role="tab" data-toggle="tab">Adding Your Own Projects</a></li>
                <li role="presentation"><a href="#generate" aria-controls="generate" role="tab" data-toggle="tab">Generate a Username/Password</a></li>
       		</ul>
            <div class="tab-content">
            	<div role="tabpanel" class="tab-pane fade in active" id="howitworks">
                	<h2>How It Works...</h2>
                    <p>Just wanted to make this quick and fairly simple (base understanding of HTML/CSS & PHP helps but not required):</p>
                    <p><strong>Project Listing:</strong> The PHP script runs through every root level directory (ie: "example-directory, example_directory_3, etc.") and gets the file path (used as the url), directory name, and the "screenshot.png" image (used as a pretty placeholder)<br><br>
                        
                        <strong>Password Protection:</strong> Uses simple .htaccess rules to password protect the main directory, allowing you to give your client a username and password to log in and view their work.</p>
                </div>
            	<div role="tabpanel" class="tab-pane fade in" id="addingprojects">
                	<h2>Adding Your Own Projects</h2>
            		<p>Treat each directory you add in here as its own separate project.<br>
<br>
					You may want to house ALL your projects here and use this like a portfolio, OR, like I do: as an umbrella directory for all the work of a specific client. I typically copy this entire library and will name the root folder by the client name: "joes-pizza-shop" and inside that will be a directory for each project I do for them.<br>
<br>
					For example, maybe you're doing a corporate website for a client AND a separate landing page campaign site for them. In this case, you may create a directory called "corporate-website" for all your corporate site files and then "landing-page-site" for the latter files. <br>
<br>
					This is your world! Organize as you see fit..<br>
<br>
					*You can remove the 3 example directories I have in here and add yours as needed. Just be sure to add a "<strong>screenshot.png</strong>" file to the directory so the grid displays properly for your clients.</p>
                </div>
            	<div role="tabpanel" class="tab-pane fade in" id="generate">
                	<h2>Generate a Username/Password:</h2>
                    <p>Open your "<strong>.htaccess</strong>" file in your preferred text editor, follow the instructions, and when prompted, copy and paste the following: "<strong><?php echo dirname(__FILE__); ?>/template/protected/.htpasswd</strong>"<br><br>
                    It should look something like this:</p>
<pre><code># Remove all the "#" signs below and follow the instructions under the "AuthUserFile"
AuthType Basic
AuthName "Login with your credentials"
AuthUserFile <?php echo dirname(__FILE__); ?>/template/protected/.htpasswd
Require valid-user</code></pre>
                    <br>
                    <p>Open the "<strong>.htpasswd</strong>" file in your text editor (located in "your-site-path/template/protected/.htpasswd"). In their you'll see an example username and generated password:</p>
        <pre><code>admin:$apr1$z1IFJjI/$65E5SM9yfVTI7uFSPGZwh.</code></pre>
                    <p>In the case above, the username is "admin" and the password is "admin".<br>
                    Go ahead and delete that because NO ONE should use those credentials... <strong>NO ONE</strong>.<br><br>
                    To generate your own .htpasswd username/password <a href="http://www.htaccesstools.com/htpasswd-generator/" target="_blank">click here</a>, and then paste the code they provide you into the ".htpasswd".<br>
<br>
					..and that's IT! You're off to the races.</p>
                </div>
          	</div>
            
           <div class="clearfix"></div> 
           <hr>
            
            <h2>Like this template? Awesome! Help fund the creativity and buy me a beer &nbsp; ;^)</h2>
            <br>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="34C7NUYWTVYFA" />
            <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate" />
            <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
            </form>

            
            
            <hr>

            <h2>Select a Project to view:</h2>
            <br>
            <div class="row">
				<?php
                    // Get all the directories  
                    $dir = array_filter(glob('*'), 'is_dir');
                    
                    // Run $dir through a filter to remove the directories listed in "$block"
                    $dir = array_diff($dir, $block);
                            
                    // Open a known directory, and proceed to read its contents
                    $i = 1;
                    foreach($dir as $file) {
                        if (filetype($file) == "dir"){
                            $url = str_replace($_SERVER['DOCUMENT_ROOT'],'http://dev.curran-connors.com/',$file);
                            $name = str_replace($_SERVER['DOCUMENT_ROOT'],'',$file); ?>
                            <div class="col-sm-3 client text-center">
                                <a target="_blank" href="<?php echo $url; ?>">
                                
                                    <img src="<?php echo $url; ?>/screenshot.png" class="img-responsive">
                                    <h3><?php echo ucwords(str_replace('_',' ',str_replace('-',' ',$name))); ?></h3>
                                </a> 
                            </div>
                        <?php
                        if($i % 4 == 0) { echo '<div class="clearfix"></div>'; } 
                        $i++;	
                        }
                    } 
                ?>
    		</div><!-- END .row -->
    	</div><!-- END .col-sm-12 -->
    </div><!-- END .row -->
</div><!-- END .container -->


</body>
<?php require_once('template/layouts/footer_assets.php'); ?>
</html>