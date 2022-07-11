<?php

namespace Logger;

use Logger\Helpers\DateHelper;
use Logger\Loggers\BaseLogger;

class Logger
{
    private BaseLogger $logger;

    /**
     * @param BaseLogger $logger
     */
    public function __construct(BaseLogger $logger)
    {
        $this->logger = $logger;
    }


    public function saveLog(string $log){
        $this->logger->saveLog($log);
    }

    /**
     * @throws \Exception
     */
    public function removeLogsOrderThan(string $date){
        if(DateHelper::isDate($date)){
            $this->logger->removeLogsOrderThan($date);
        }else{
            //Here we could have own exception. This is simple just for test
            throw new \Exception('This is not valid date');
        }
    }

    /**
     * @throws \Exception
     */
    public function removeLogsInTimePeriod(string $dateFrom, string $dateTo){
        if(DateHelper::isDate($dateFrom) && DateHelper::isDate($dateTo)){
            $this->logger->removeLogsInTimePeriod($dateFrom, $dateTo);
        }else{
            throw new \Exception('One of dates is not valid');
        }
    }

    /**
     * @throws \Exception
     */
    public function getLogsBaseOnDate(string $date){
        if(DateHelper::isDate($date)){
            return $this->logger->getLogsBaseOnDate($date);
        }else{
            //Here we could have own exception. This is simple just for test
            throw new \Exception('This is not valid date');
        }
    }

    /**
     * @return BaseLogger
     */
    public function getLogger(): BaseLogger
    {
        return $this->logger;
    }

    /**
     * @param BaseLogger $logger
     */
    public function setLogger(BaseLogger $logger): void
    {
        $this->logger = $logger;
    }
    
    
}
