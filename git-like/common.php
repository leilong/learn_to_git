<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/9
 * Time: 20:04
 */

$handle = fopen ("php://stdin","r");
$line = fgets($handle);

//$line = <命令> <文件名>
$split_array = explode(' ',$line);
switch (trim($split_array[0])){
    case "init":
        //history目录及日志文件生成
        try{
            $handles = new Handles();
            $result = $handles->history_init();
            echo $result;
        }catch ( Exception $e ) {
            echo $e->getMessage ();
        }
        break;
    case "commit":
        //todo
        break;
    case "add":
        //todo
        //默认master，复制指定文件到master目录下
//        try{
            $handles = new Handles();
            $result = $handles->add();
            echo $result;
//        }catch ( Exception $e ) {
//            echo $e->getMessage ();
//        }
        break;
}

/**
 * Class Handle
 * 处理类
 */
class Handles{

    function history_init(){

        //todo
        if(strstr(getcwd(),"/")) {
            $init_path = getcwd()."/.history";
            if(!file_exists($init_path)){
                mkdir($init_path,'0777');
                return "directory build success";
            }
        }else{
            $init_path = getcwd()."\.history";
            if(!file_exists($init_path)){
                mkdir($init_path,'0777');
                return "directory build success";
            }
        }

        $times = date('Ymd');
        if(strstr(getcwd(),"/")) {
            $init_today_path = $init_path."/$times";
            if(!file_exists($init_today_path)){
                mkdir($init_today_path,'0777');
                return "directory build success";
            }else{
                $init_day_file = $init_today_path."/".date("Ymd").".txt";
                if(!file_exists($init_day_file)){
                    fopen($init_day_file,'w');
                    return "directory build success";
                }
            }
        }else{
            $init_today_path = $init_path."\/"."$times";
            if(!file_exists($init_today_path)){
                mkdir($init_today_path,'0777');
                return "directory build success";
            }else{
                $init_day_file = $init_today_path."\/".date("Ymd").".txt";
                if(!file_exists($init_day_file)){
                    fopen($init_day_file,'w');
                    return "file build success";
                }else{
                    return "file have exits";
                }
            }
        }
    }

    /**
     * 添加文件到暂存区
     */
    function add(){
        $filehandles = new fileHandles();
        $time_sign = md5(time());
        $stage_dir = $filehandles->stage_dir($time_sign);
        $file = getcwd().'\history_test.php';
        $result = copy(getcwd().'\history_test.php',getcwd().'\.history\20190109\stage\master\/'.$time_sign.'.php');
        return $result;
    }

    /**
     * 提交文件到工作区
     */
    function commit(){
        //TODO
    }
}

class fileHandles{

    /**
     * 中文目录重命名
     */
    function _rename($olddir,$ofn,$newdir,$nfn){
        $result = rename(iconv('UTF-8','GBK',$olddir.$ofn), iconv('UTF-8','GBK',$newdir.$nfn));
        return $result;
    }

    /**
     * 返回当前目录
     */
    function stage_dir($time_sign){
        if(strstr(getcwd(),"/")) {
            $init_path = getcwd()."/".date('Ymd')."/stage/master/".$time_sign.".php";
        }else{
            $init_path = getcwd()."\/".date('Ymd')."\stage\master\/".$time_sign.".php";
        }
        return $init_path;
    }
}
