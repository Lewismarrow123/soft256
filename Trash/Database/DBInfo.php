<?php

interface DBInfo{
    const  HOST ="localhost";
    const  UNAME ="root";
    const  PW ="root";
    const  DBNAME ="dbSoft256ExeRivePublication";

    public function doConnect();

}