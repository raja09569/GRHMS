 <?php
// from: http://php.thedemosite.co.uk/
// version 1.2
$page_title="Add a user - FREE PHP code and SQL";
$page_keywords="free php, sql insert record";
$page_desc="Add a username and password to test - free online login PHP MySQL example system";
include("header.inc");
?>
<?php include("validateform.inc"); ?>
<p align="center"><big><strong>3. Add a User</strong></p></big>
<blockquote>
  <blockquote>
    <p>Below is the current single record within the database: </p>
  </blockquote>
  <blockquote>
    <blockquote>
<?php 
include_once("config.php"); 
include_once("clean_input.php"); 
include_once("dbc.php");
include("getrecord.inc"); 
?>
    </blockquote>
  </blockquote>
  <blockquote>
    <p>Add your own username and password, enter your details below and click save.&nbsp; <strong>DO
    NOT</strong> use valid details as the information you enter will be displayed above and
    the next visitor will be able to view them as you are now.</p>
  </blockquote>
</blockquote>

<form
ACTION="savedata.php"
name="saveform" METHOD="POST" align="center">
  <div align="center"><center><table border="0" width="93%" cellspacing="0" cellpadding="0">
    <tr>
      <td width="52%"><div align="center"><center><table border="0" height="59" width="310"
      bgcolor="#808080" cellspacing="1" cellpadding="0">
        <tr>
          <td width="248" height="19" bgcolor="#C0C0C0"  align="right"><p><font color="#000000"><small>Add
          Your test username:</small></font></td>
          <td width="123" height="19" bgcolor="#C0C0C0"><p><input NAME="username"
          VALUE SIZE="8" MAXLENGTH="16" tabindex="1"></td>
          <td width="47" height="19" align="center" bgcolor="#C0C0C0"><div align="center"><center><p><a
          href="javascript:alert('The username must be between 4 and 16 characters long.')"><small><small>Help</small></small></a></td>
        </tr>
        <tr align="center">
          <td width="248" height="17" bgcolor="#C0C0C0" align="right"><p><font color="#000000"><small>Add
          Your test password:</small></font></td>
          <td height="17" width="123" bgcolor="#C0C0C0" align="left"><p><input type="password"
          name="password" size="8" tabindex="2" maxlength="8"></td>
          <td width="47" height="17" align="center" bgcolor="#C0C0C0"><a
          href="javascript:alert('The password must be between 4 and 8 characters long.')"><small><small>Help</small></small></a></td>
        </tr>
        <tr align="center">
          <td width="248" height="1" bgcolor="#C0C0C0"></td>
          <td width="123" height="1" bgcolor="#C0C0C0"><p><input TYPE="button"
          NAME="FormsButton2" VALUE="save" ONCLICK="validateForm()" tabindex="3"></td>
          <td width="47" height="1" align="center" bgcolor="#C0C0C0"><a
          href="javascript:alert('Click to save the details')"><small><small>Help</small></small></a></td>
        </tr>
      </table>
      </center></div></td>
      <td width="48%" align="center"><small>When you have added your own username and password <a
      href="login.php">move
      onto the Login page to test it!</a></small></td>
    </tr>
  </table>
  </center></div>
</form>

<p align="center">&nbsp;</p>

<p align="center"><a
href="addausercode.php">Click
here to view the PHP and JavaScript code</a> used for this page, or <a href="demo-code.zip">download the free zip here</a> </p>

<?php include("footer.inc"); ?>
