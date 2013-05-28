<?php include("includes/header.php"); ?>
	<script type="text/javascript" src="js/jq.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <div id="content">   
    	<?php 
			if(!empty($_REQUEST['changeEmail'])&&$_REQUEST['changeEmail']) {
				include("class/class.user.php");
				$user = new User();
				$user->username = $_SESSION['username'];
				$user->oldEmail = mysql_real_escape_string($_POST['oldEmail']);
				$user->newEmail = mysql_real_escape_string($_POST['newEmail']);
				$user->changeEmail();
				echo '<div class="message">'.$user->message.'</div>';
			}
			else {
		?>
    	<form name="email" id="email" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<table>
        	<tr>
            	<th colspan="2" align="left">Change your email</th>
            </tr>
            <tr>
            	<td>Enter Old Email</td>
                <td><input type="text" class="textBox" name="oldEmail" id="oldEmail" /><span class="oldEmail required"></span></td>
            </tr>
            <tr>
            	<td>Enter New Email</td>
                <td><input type="text" class="textBox" name="newEmail" id="newEmail" /><span class="newEmail required"></span></td>
            </tr>
            <tr>
            	<td></td>
                <td><input type="submit" name="changeEmail" value="Change Email" /></td>
            </tr>
        </table>
        </form>
        <?php } ?>
    </div>
<?php include("includes/footer.php"); ?>