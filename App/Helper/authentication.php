<?php
function failAuthentication(string $username , string $password , bool $remember ):void {
    session_push_inputs_array(get_defined_vars());
    redirectFailAuthentication();
}
function failAuthenticationAndExit(string $username , string $password , bool $remember ):void {
    failAuthentication($username,$password,$remember);
    exit;
}
function isLogin():bool {
    return isset($_SESSION['user']);
}
function isLogout():bool
{
    return !isLogin();
}
function logout():void
{
    unset($_SESSION['user']);
}