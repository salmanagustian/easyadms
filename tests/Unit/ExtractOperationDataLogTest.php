<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExtractOperationDataLogTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {   
        $str = <<<STR
        USER PIN=1079	Name=hendri	Pri=14	Passwd=1234	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
        USER PIN=1340	Name=Ratih	Pri=14	Passwd=	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
        USER PIN=1369	Name=Septin	Pri=14	Passwd=	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
        USER PIN=1005	Name=Eva	Pri=14	Passwd=	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
        USER PIN=1017	Name=Yeni	Pri=0	Passwd=	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
        USER PIN=1004	Name=Alfi	Pri=0	Passwd=	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
        USER PIN=1364	Name=Sudarmaji	Pri=0	Passwd=	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
        USER PIN=1316	Name=Arfi	Pri=0	Passwd=	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
  STR;        
        $result = extractDataOperationLog($str);
        $this->assertTrue(true);
    }
}
