<?php
class Schedule{
    public $msg;
    public $id;
    public $title;
    public $sdate;
    public $stime;
    public $sat;
    public $sun;
    public $mon;
    public $tue;
    public $wed;
    public $thu;
    public $fri;
    
    public function save($id=0){
        if($id==0){
            $query = "INSERT INTO schedule(title,sdate,stime,sat,sun,mon,tue,wed,thu,fri) 
                    VALUES('$this->title','$this->sdate','$this->stime','$this->sat','$this->sun','$this->mon','$this->tue','$this->wed','$this->thu','$this->fri')";
            $result = mysql_query($query);
            if(mysql_affected_rows()>0){
                $this->msg  = "<p class='msg'>Schedule added successfully.</p>";
            }
        }
        else {
            $query = "UPDATE schedule SET title='$this->title',sdate='$this->sdate',stime='$this->stime',sat='$this->sat',
                    sun='$this->sun',mon='$this->mon',tue='$this->tue',wed='$this->wed',thu='$this->thu',fri='$this->fri' 
                    WHERE id=$id
                    ";
            $result = mysql_query($query);
            if(mysql_affected_rows()>0){
                $this->msg  = "<p class='msg'>Schedule updated successfully.</p>";
            }
        }
    }
    
    public function schedule_by_day($day,$sdate){
        $query = "SELECT * FROM schedule WHERE $day=1 OR sdate='$sdate'";
        return $result = mysql_query($query);
    }
    
    /**
     * schedule_all()
     * 
     * Show all the schedules
     *
     * @return type mysql_result;
     */
    public function schedule_all(){
        $query = "SELECT * FROM schedule";
        return mysql_query($query);
    }
    /**
     * show_schedule()
     * 
     * show all the schedule taken from database.
     *
     * @param type $id
     * @return type false
     */
    public function show_schedule($id){
        $query = "SELECT * FROM schedule WHERE id=$id";
        $result = mysql_query($query);
        if(mysql_num_rows($result)>0){
            return mysql_fetch_object($result);
        }
        else {
            return false;
        }
    }
    /**
     * daily_schedule()
     *
     * @param type $sdate
     * @return type Resource
     */
    public function daily_schedule($sdate){
        $query = "SELECT * FROM schedule WHERE sdate='$sdate'";
        return $result = mysql_query($query);
    }
    
    public function schedule_del($id){
        $result = mysql_query("DELETE FROM schedule WHERE id=$id");
        if(mysql_affected_rows()>0){
            $this->msg  = "<p class='msg'>Deleted successfully.</p>";
        }
        else {
            $this->msg  = "<p class='msg'>There is a problem to delete.</p>";
        }
    }
    
    /**
     * archive_save()
     * 
     * save and upload archive
     *
     * @param type $file 
     */
    public function archive_save($file){
        if(is_array($file)){
            $archive_name = $this->upload_file($file);
        }
        else {
            $archive_name = $file;
        }
        if($archive_name){
            $query = "INSERT INTO archive(aname,title) VALUES('$archive_name','$this->title')";
            $result = mysql_query($query);
            if(mysql_affected_rows()>0){
                $this->msg  = "<p class='msg'>Archive added successfully.</p>";
            }
            else {
                $this->msg  = "<p class='msg'>There is a problem with adding archive.</p>";
            }
        }
        else {
            $this->msg  = "<p class='msg'>There is a problem with adding archive.</p>";
        }
    }
    
    private function upload_file($file){
        if (($file["type"] == "image/png")|| ($file["type"] == "audio/mpeg")|| ($file["type"] == "audio/mp3")|| ($file["type"] == "image/pjpeg")){
            $ext_arr = explode(".", $file['name']);
            $ext        = end($ext_arr);
            $ts = time();
            $file_name = $ts.".".$ext;
            $dst_file   = "../archive/".$file_name;
            if(move_uploaded_file($file['tmp_name'], $dst_file)){
                return $file_name;
            }
            else {
                return false;
            }
        }
    }
    
    public function archive_show(){
        $query = "SELECT * FROM archive";
        return $result = mysql_query($query);
    }
    
    public function archive_del($id){
        if($this->archive_file_del($id)){
            $query = "DELETE FROM archive WHERE id=$id";
            $result = mysql_query($query);
            if(mysql_affected_rows()>0){
                $this->msg  = "<p class='msg'>Archive deleted successfully.</p>";
            }
            else {
                $this->msg  = "<p class='msg'>There is a problem.</p>";
            }
        }
        else {
            $this->msg  = "<p class='msg'>There is a problem.</p>";
        }
    }
    
    private function archive_file_del($id){
        $res = mysql_query("SELECT aname FROM archive WHERE id=$id");
        $row = mysql_fetch_object($res);
        if(mysql_num_rows($res)>0){
            $file_name = "../archive/".$row->aname;
            if(file_exists($file_name)){
                if(unlink($file_name)){
                    return true;
                }
                else {
                    $this->msg  = "<p class='msg'>There is a problem.</p>";
                    return false;
                }
            }
            else {
                return true;
            }
        }
            
    }
    
}
?>