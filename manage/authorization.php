<?php

require_once 'components/page.php';
require_once 'components/security/datasource_security_info.php';
require_once 'components/security/security_info.php';
require_once 'components/security/hardcoded_auth.php';
require_once 'components/security/user_grants_manager.php';

$users = array('ueasadmin' => '1f9d3bf8c5672cc1430c967a78bb5a49');

$usersIds = array('ueasadmin' => -1);

$dataSourceRecordPermissions = array();

$grants = array('guest' => 
        array()
    ,
    'defaultUser' => 
        array('dbt_certificate_manager' => new DataSourceSecurityInfo(false, false, false, false))
    ,
    'guest' => 
        array('dbt_certificate_manager' => new DataSourceSecurityInfo(false, false, false, false))
    ,
    'ueasadmin' => 
        array('dbt_certificate_manager' => new DataSourceSecurityInfo(false, false, false, false))
    );

$appGrants = array('guest' => new DataSourceSecurityInfo(false, false, false, false),
    'defaultUser' => new DataSourceSecurityInfo(true, false, false, false),
    'guest' => new DataSourceSecurityInfo(false, false, false, false),
    'ueasadmin' => new AdminDataSourceSecurityInfo());

$tableCaptions = array('dbt_certificate_manager' => 'Certificate Manager');

function SetUpUserAuthorization()
{
    global $usersIds;
    global $grants;
    global $appGrants;
    global $dataSourceRecordPermissions;
    $userAuthorizationStrategy = new HardCodedUserAuthorization(new HardCodedUserGrantsManager($grants, $appGrants), $usersIds);
    GetApplication()->SetUserAuthorizationStrategy($userAuthorizationStrategy);

GetApplication()->SetDataSourceRecordPermissionRetrieveStrategy(
    new HardCodedDataSourceRecordPermissionRetrieveStrategy($dataSourceRecordPermissions));
}

function GetIdentityCheckStrategy()
{
    global $users;
    return new SimpleIdentityCheckStrategy($users, 'md5');
}

?>