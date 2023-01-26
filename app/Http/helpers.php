<?php

use Jenssegers\Date\Date;
use Spatie\Menu\Laravel\Html;
use Spatie\Menu\Laravel\Link;

if (!function_exists('localFormatDate')) {
    function localFormatDate($value)
    {
        return Date::parse($value)->format(config('local.date_format'));
    }
}

if (!function_exists('localFormatDateTime')) {
    function localFormatDateTime($value)
    {
        return Date::parse($value)->format(config('local.datetime_format'));
    }
}

if (!function_exists('createLocalFormatDate')) {
    function createLocalFormatDate($value)
    {
        return Date::createFromFormat(config('local.date_format'), $value);
    }
}

if (!function_exists('localNumberFormat')) {
    function localNumberFormat($value, $digitDecimal = null)
    {
        if (null === $digitDecimal) {
            $digitDecimal = config('local.digit_decimal');
        }

        return number_format($value, $digitDecimal, config('local.decimal_separator'), config('local.thousand_separator'));
    }
}

if (!function_exists('localNumberAccountingFormat')) {
    function localNumberAccountingFormat($value, $digitDecimal = null)
    {
        if (null === $digitDecimal) {
            $digitDecimal = config('local.digit_decimal');
        }

        if ($value < 0) {
            $result = '( '.number_format($value * -1, $digitDecimal, config('local.decimal_separator'), config('local.thousand_separator')).' )';
        } else {
            $result = number_format($value, $digitDecimal, config('local.decimal_separator'), config('local.thousand_separator'));
        }

        return $result;
    }
}

// ['width:9000','height:7000'] to ['width' => 9000,'height' => 7000]
if (!function_exists('convertStringArray')) {
    function convertStringArray($values, $separator = ':')
    {
        $result = [];
        foreach ($values as $value) {
            if(str_contains($value, $separator)){
                list($key, $val) = explode($separator, $value);            
                $result[trim($key)] = trim($val);
            }
            
        }

        return $result;
    }
}
// convert ['width' => 9000,'height' => 7000] to ['width:9000','height:7000' ]
if (!function_exists('convertArrayStringPair')) {
    function convertArrayStringPair($values, $separator = ':')
    {
        $result = [];
        array_walk($values, function ($item, $key) use ($separator, &$result) { $result[] = $key.$separator.$item; });

        return $result;
    }
}

if (!function_exists('convertArrayPairValue')) {
    function convertArrayPairValue($values, $keyPair = 'text,value')
    {
        $result = [];
        foreach ($values as $value) {
            list($key, $val) = explode(',', $keyPair);
            array_push($result, [$key => $value, $val => $value]);
        }

        return $result;
    }
}

if (!function_exists('convertArrayPairValueWithKey')) {
    function convertArrayPairValueWithKey($values, $keyPair = 'text,value')
    {
        $result = [];
        foreach ($values as $k => $value) {
            list($key, $val) = explode(',', $keyPair);
            array_push($result, [$key => $value, $val => $k]);
        }

        return $result;
    }
}

if (!function_exists('generateMenu')) {
    function generateMenu(array $tree)
    {
        return \Menu::build($tree, function ($menu, $item) {
            if (!$item->children->isEmpty()) {
                $header = Link::to('#', '<i class="nav-icon '.$item->icon.'"></i>
                                        &nbsp;'.$item->name ?? 'header')->addClass('nav-link nav-group-toggle');
                $menu->submenu($header, generateMenu($item->children->all())->addClass('nav-group-items')->addParentClass('nav-group'));
            } else {
                // $menu->add(Html::raw('<a class="nav-link" href="'.$item->route.'">
                $menu->addIfCan($item->permissions->pluck('name'), Html::raw('<a class="nav-link" href="'.$item->route.'">       
                
                                        <i class="nav-icon '.$item->icon.'"></i>
                                        &nbsp;'.$item->name.'
                                    </a>')->addParentClass('nav-item'));
            }
        });
    }
}

if (!function_exists('extractDataLogAttendance')) {
    function extractDataLogAttendance(String $logs)
    {
        $result = [];
        $lines = explode(PHP_EOL, $logs);
        foreach($lines as $line){
            if(!empty($line)){
                $result[] = preg_split('/\s+/', $line);
            }
        }

        return $result;
    }
}

// USER PIN=1079	Name=Hendri	Pri=14	Passwd=1234	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
if (!function_exists('extractDataOperationLog')) {
    function extractDataOperationLog(String $logs)
    {
        $result = ['data' => [], 'key' => null];
        $lines = explode(PHP_EOL, $logs);
        foreach($lines as $line){
            if(!empty($line)){
                $tmp = preg_split('/\s+/', $line);
                $key = array_shift($tmp);
                if(empty($result['key'])){
                    $result['key'] = $key;
                }                
                $result['data'][] = convertStringArray($tmp, '=');
            }
        }
        
        return $result;
    }
}

