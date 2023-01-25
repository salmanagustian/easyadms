<?php
function convertStringArray($values, $separator = ':')
{
    $result = [];
    foreach ($values as $value) {
        list($key, $val) = explode($separator, $value);
        $result[trim($key)] = trim($val);
    }

    return $result;
}

$t = '5415	2022-09-03 11:54:24	0	1		0	0			';
print_r(preg_split('/\s+/', $t));

$user = 'USER PIN=5508	Name=Sulistyowati	Pri=0	Passwd=	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0';
$users = preg_split('/\s+/', $user);
foreach($users as $u){
    print_r(convertStringArray($u, '='));
}