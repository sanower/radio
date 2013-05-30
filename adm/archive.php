<?php include("includes/header.php"); ?>
    <script type="text/javascript" src="js/jq.js"></script>
    <script type="text/javascript" src="js/jquery.ui.core.js"></script>
    <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
    
    <script type="text/javascript" src="js/myscript.js"></script>
        <div id="content">
            <h2>Archive</h2>
            <?php 
            include("class/class.schedule.php");
            $archive = new Schedule();
            
            if(isset($_GET['del'])){
                $archive->archive_del($_GET['del']);
                echo $archive->msg;
            }
            if(isset($_POST['submit'])){
                $archive->title    = $_POST['archive_title'];
                if($_POST['url']==1){
                    $archive->archive_save($_FILES['filename']);
                }
                else {
                     $archive->archive_save($_POST['filename1']);
                }
                
                echo $archive->msg;
            }
            ?>
            <form name="frm_archive" id="frm_archive" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table>
                <tr>
                    <td>Archive tile:</td>
                    <td width="20"></td>
                    <td><input type="text" name="archive_title" id="archive_title" /></td>
                </tr>
                <tr>
                    <td>Browse file:</td>
                    <td><input type="radio" name="url" checked="checked" value="1" /></td>
                    <td><input type="file" name="filename" id="filename" /></td>
                </tr>
                <tr>
                    <td>Remote url:</td>
                    <td><input type="radio" name="url" value="2" /></td>
                    <td><input type="text" name="filename1" id="filename1" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" id="submit" name="submit" value="Submit" /></td>
                </tr>
            </table>
            </form>
            
            <h2 id="schedule_list_title">Archive Lists</h2>
             <table id="tbl_schedule_list" class="tbl_tabular">
                 <tr><th>Title</th><th>Delete</th></tr>
                 <?php
                 $result = $archive->archive_show();
                 while($row=  mysql_fetch_object($result)):
                 ?>
                 <tr>
                     <td><?php echo $row->title; ?></td>
                     <td><a href="archive.php?del=<?php echo $row->id; ?>" target="_blank">Delete</a></td>
                 </tr>
                 <?php
                 endwhile;
                 ?>
            </table>
        </div>
<?php include("includes/footer.php"); ?>