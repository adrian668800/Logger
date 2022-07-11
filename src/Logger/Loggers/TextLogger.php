<?php

namespace Logger\Loggers;


class TextLogger implements BaseLogger
{
    private static string $PATH = '/Logs/';
    

    public function saveLog(string $log)
    {
        file_put_contents($this->getFilePath(), $log.PHP_EOL , FILE_APPEND | LOCK_EX);
    }

    public function removeLogsOrderThan($date)
    {
        $files = glob(dirname(__FILE__).self::$PATH.'*');
        foreach($files as $file){
            if(is_file($file)) {
                $fileName  = pathinfo($file)['filename'];
                $logsDate = str_replace('-logs' ,'', $fileName);
                if($logsDate < $date){
                    unlink($file);
                }
            }
        }
    }

    public function removeLogsInTimePeriod($dateFrom, $dateTo)
    {
        $files = glob(dirname(__FILE__).self::$PATH.'*');
        foreach($files as $file){
            if(is_file($file)) {
                $fileName  = pathinfo($file)['filename'];
                $logsDate = str_replace('-logs' ,'', $fileName);
                if($dateFrom < $logsDate && $dateTo > $logsDate){
                    unlink($file);
                }
            }
        }
    }

    public function getLogsBaseOnDate(string $date): ?array
    {
        if(!file_exists($this->getFilePath($date))) {
            return null;
        }
        return file($this->getFilePath($date), FILE_IGNORE_NEW_LINES);;
    }

    private function getFileName(?string $date = null){
        return date('d-m-Y', $date ? strtotime($date) : null)."-logs.txt";
    }

    private function getFilePath(?string $date = null){
        return dirname(__FILE__).self::$PATH.$this->getFileName($date);
    }

}