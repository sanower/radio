<?php include("adm/config.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Online Radio</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/jquery-1.10.0.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
    </head>
    <body>
        <div id="page">
            <div id="col1">
                <div class="col_title">
                    <img src="images/title1.jpg" title="Title" />
                </div>
                <div class="col_box">
                    <div id="player">

                    </div>
                    <div class="ads">
                        <img src="images/add.jpg" alt="Ads" />
                    </div>
                    <div class="ads">
                        <img src="images/add.jpg" alt="Ads" />
                    </div>
                </div>
            </div>
            <div id="col2">
                <div class="col_title">
                    <img src="images/title_2.jpg" title="Title" />
                </div>
                <div class="col_content">
                    <div id="side_title"><img src="images/side_title.jpg" /></div>
                    <div id="cc_recenttracks_main" class="cc_recenttracks_list">Loading ...</div>
                </div>
            </div>
            <div id="col3">
                <?php 
                include("adm/class/class.schedule.php"); 
                $schedule = new Schedule();
                ?>
                <div class="col_title">
                    <div class="title_bg">
                        <div id="schedule_title">
                            Schedule
                        </div>
                        <div id="weekly_schedule_title">
                            <span id="daily">Daily</span> / <span id="weekly">Weekly</span>
                        </div>
                    </div>
                </div>
                <div id="schedule_box">
		    <div id="schedule_innter">
			<div id="daily_schedule">
                            <?php
                            $sdate = date("m/d/Y");
                            $result = $schedule->daily_schedule($sdate);
                            while($row=  mysql_fetch_object($result)):
                            ?>
                            <div class="schedule_row">
                                <div class="show_title"><?php echo $row->title; ?></div>
                                <div class="show_time"><?php echo $row->stime; ?></div>
                            </div>
                            <?php
                            endwhile;
                            unset($result);
                            unset($row);
                            ?>
			</div>
			<div id="weekly_schedule">
                            <?php 
                            $ts = time();
                            for($i=0;$i<7;$i++):
                            ?>
                                <?php 
                                $ts = $ts+(24*60*60); 
                                $day = strtolower(date("D",$ts));
                                $result = $schedule->schedule_by_day($day);
                                ?>
                                <div class="week_days"><?php echo date("l - d F",$ts); ?></div>
                                <?php while($row = mysql_fetch_object($result)): ?>
                                    <div class="schedule_row">
                                        <div class="show_title"><?php echo $row->title; ?></div>
                                        <div class="show_time"><?php echo $row->stime; ?></div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endfor; ?>
			    
			</div>
		    </div>
                </div>
                
                <div class="col_title">
                    <div class="title_bg">
                        <div id="archieve_title">
                            Archive (Recent podcasts)
                        </div>
                    </div>
                </div>
		<div id="archieve_box">
		    <div id="archieve_box_inner">
                        <?php
                        $result = $schedule->archive_show();
                        while($row=  mysql_fetch_object($result)):
                        ?>
			<div class="schedule_row">
                            <div class="show_title"><a href="archive/<?php echo $row->aname; ?>"><?php echo $row->title; ?></a></div>
                        </div>
                        <?php endwhile; ?>
		    </div>
		</div>
            </div>
            <div class="cl"></div>
        </div>
        <script language="javascript" type="text/javascript" src="http://198.100.148.77:2199/system/recenttracks.js"></script>
    </body>
</html>
