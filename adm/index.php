<?php include("includes/header.php"); ?>
    <script type="text/javascript" src="js/jq.js"></script>
    <script type="text/javascript" src="js/jquery.ui.core.js"></script>
    <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
    
    <script type="text/javascript" src="js/myscript.js"></script>
        <div id="content">
            <h2>Schedule Adding Form</h2>
            <?php 
            include("class/class.schedule.php");
            $schedule = new Schedule();
            if(isset($_GET['del'])){
                $schedule->schedule_del($_GET['del']);
                echo $schedule->msg;
            }
            if(isset($_POST['submit'])){
                $schedule->title        = $_POST['title'];
                $schedule->sdate        = $_POST['sdate'];
                $schedule->stime        = $_POST['stime'];
                if(!empty($_POST['sat'])){
                    $schedule->sat          = $_POST['sat'];
                }
                if(!empty($_POST['sun'])){
                    $schedule->sun          = $_POST['sun'];
                }
                if(!empty($_POST['mon'])){
                    $schedule->mon          = $_POST['mon'];
                }
                if(!empty($_POST['tue'])){
                    $schedule->tue          = $_POST['tue'];
                }
                if(!empty($_POST['wed'])){
                    $schedule->wed          = $_POST['wed'];
                }
                if(!empty($_POST['thu'])){
                    $schedule->thu          = $_POST['thu'];
                }
                if(!empty($_POST['fri'])){
                    $schedule->fri          = $_POST['fri'];
                }
                
                $schedule->save($_POST['id']);
                echo $schedule->msg;
            }
            
            if(isset($_GET['update'])){
                $row = $schedule->show_schedule($_GET['update']);
                if($row){
                    $upd = true;
                }
                else {
                    $upd = false;
                }
            }
            else {
                $upd = false;
            }
            ?>
            <form name="frm_schedule" id="frm_schedule" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <table>
                    <tr>
                        <td>Title:</td>
                        <td><input type="text" name="title" id="title" value="<?php echo ($upd)?$row->title:''; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Date:</td>
                        <td><input type="text" name="sdate" id="sdate" value="<?php echo ($upd)?$row->sdate:''; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Time:</td>
                        <td><input type="text" name="stime" id="stime" value="<?php echo ($upd)?$row->stime:''; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Repeated:</td>
                        <td>
                            <div class="day_row"><input type="checkbox" name="sat" <?php echo(isset($row)&&($row->sat==1))?'checked="checked"':''; ?> value="1" /> Saturday</div>
                            <div class="day_row"><input type="checkbox" name="sun" <?php echo(isset($row)&&($row->sun==1))?'checked="checked"':''; ?> value="1" /> Sunday</div>
                            <div class="day_row"><input type="checkbox" name="mon" <?php echo(isset($row)&&($row->mon==1))?'checked="checked"':''; ?> value="1" /> Monday</div>
                            <div class="day_row"><input type="checkbox" name="tue" <?php echo(isset($row)&&($row->tue==1))?'checked="checked"':''; ?> value="1" /> Tuesday</div>
                            <div class="day_row"><input type="checkbox" name="wed" <?php echo(isset($row)&&($row->wed==1))?'checked="checked"':''; ?> value="1" /> Wednesday</div>
                            <div class="day_row"><input type="checkbox" name="thu" <?php echo(isset($row)&&($row->thu==1))?'checked="checked"':''; ?> value="1" /> Thursday</div>
                            <div class="day_row"><input type="checkbox" name="fri" <?php echo(isset($row)&&($row->fri==1))?'checked="checked"':''; ?> value="1" /> Friday</div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="id" value="<?php echo ($upd)?$row->id:''; ?>" /></td>
                        <td><input type="submit" name="submit" value="Submit" /></td>
                    </tr>
                </table>
            </form>
            
            <h2 id="schedule_list_title">Schedule Lists:</h2>
            <table id="tbl_schedule_list" class="tbl_tabular">
                <tr>
                    <th>Schedule Title</th>
                    <th>Schedule Time</th>
                    <th>Delete</th>
                </tr>
                <?php
                $result = $schedule->schedule_all();
                while($row=  mysql_fetch_object($result)):
                ?>
                <tr>
                    <td><a href="index.php?update=<?php echo $row->id; ?>"><?php echo $row->title; ?></a></td>
                    <td><?php echo $row->stime; ?></td>
                    <td><a href="index.php?del=<?php echo $row->id; ?>">Delete</a></td>
                </tr>
                <?php 
                endwhile;
                ?>
            </table>
        </div>
<?php include("includes/footer.php"); ?>