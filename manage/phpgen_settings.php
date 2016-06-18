<?php

//  define('SHOW_VARIABLES', 1);
//  define('DEBUG_LEVEL', 1);

//  error_reporting(E_ALL ^ E_NOTICE);
//  ini_set('display_errors', 'On');

set_include_path('.' . PATH_SEPARATOR . get_include_path());


include_once dirname(__FILE__) . '/' . 'components/utils/system_utils.php';

//  SystemUtils::DisableMagicQuotesRuntime();

SystemUtils::SetTimeZoneIfNeed('Asia/Karachi');

function GetGlobalConnectionOptions()
{
    return array(
  'server' => 'localhost',
  'port' => '3306',
  'username' => 'ftpuea_wordpress',
  'password' => 'i.MyStoneEye3742A',
  'database' => 'ftpuea_ueas'
);
}

function HasAdminPage()
{
    return false;
}

function GetPageInfos()
{
    $result = array();
    $result[] = array('caption' => 'Certificate Manager', 'short_caption' => ' Certificate Manager', 'filename' => 'dbt_certificate_manager.php', 'name' => 'dbt_certificate_manager');
    return $result;
}

function GetPagesHeader()
{
    return
    'UEAS Manager';
}

function GetPagesFooter()
{
    return
        'WaysAll Technologies - Better Technology. Better World.'; 
    }

function ApplyCommonPageSettings(Page $page, Grid $grid)
{
    $page->SetShowUserAuthBar(true);
    $grid->BeforeUpdateRecord->AddListener('Global_BeforeUpdateHandler');
    $grid->BeforeDeleteRecord->AddListener('Global_BeforeDeleteHandler');
    $grid->BeforeInsertRecord->AddListener('Global_BeforeInsertHandler');
}

/*
  Default code page: 1252
*/
function GetAnsiEncoding() { return 'windows-1252'; }

function Global_BeforeUpdateHandler($page, $rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeDeleteHandler($page, $rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeInsertHandler($page, $rowData, &$cancel, &$message, $tableName)
{

}

function GetDefaultDateFormat()
{
    return 'd-m-Y';
}

function GetFirstDayOfWeek()
{
    return 0;
}

function GetEnableLessFilesRunTimeCompilation()
{
    return false;
}



?>