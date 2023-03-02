<?php
echo app_path();
$ldapConn = ldap_connect('10.91.11.1');

// Set some ldap options for talking to AD
ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldapConn, LDAP_OPT_REFERRALS, 0);

//this is the LDAP admin account with access
$adminUsername = 'phoffice@iitm.ac.in';
$adminPassword = 'Password4850';


// Bind as a domain admin if they've set it up
$ldap_bind = ldap_bind($ldapConn, $adminUsername, $adminPassword);

//example path for searching
$search = ldap_search($ldapConn, "dc=iitm,dc=ac,dc=in", "(ou=ph)");

//example get command
$info = ldap_get_entries($ldapConn, $search);
echo "<pre>";
echo 'ldap conn';
var_dump($ldapConn);

echo 'ldap bind';
var_dump($ldap_bind);

echo 'seach var';
var_dump($search);

echo 'search info';
var_dump($info);

ldap_unbind($ldapConn);