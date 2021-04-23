<?php
include_once 'autoload.php';
class HistoryRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('history');
    }

}