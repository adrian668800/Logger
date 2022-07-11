<?php

namespace Logger\Loggers;

interface BaseLogger
{
    public function removeLogsOrderThan(string $date);
    public function removeLogsInTimePeriod(string $dateFrom, string $dateTo);
    public function saveLog(string $log);
    public function getLogsBaseOnDate(string $date);
}