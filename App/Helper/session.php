<?php
function session_push_error(string $error):void {
    $_SESSION['errors'][] = $error;
}
function session_get_success():array {
    return $_SESSION['success'];
}
function session_clear_success():void
{
    unset($_SESSION['success']);
}
function session_clear_success_if_exists():void {
    if (isset($_SESSION['success']))
        session_clear_success();
}
function session_push_success(string $success):void {
    $_SESSION['success'][] = $success ;
}
function session_clear_errors():void {
        unset($_SESSION['errors']);
}
function session_clear_error_if_exists():void {
    if (isset($_SESSION['errors']))
        session_clear_errors();
}
function session_push_inputs(string $key , mixed $value ):void {
    $_SESSION['inputs'][$key] = $value;
}
function session_push_inputs_array(array $inputs) :void {
    foreach ($inputs as $key=>$input)
        session_push_inputs($key,$input);
}
function session_get_inputs():array|null {
    return $_SESSION['inputs'] ?? null;
}
function session_get_input(string $key):mixed {
    $inputs = session_get_inputs();
    if (is_null($inputs))
        return null;
    return $inputs[$key] ?? null;
}
function session_clear_inputs():void {
        unset($_SESSION['inputs']);
}
function session_clear_inputs_if_exists():void {
    if (isset($_SESSION['inputs']))
        session_clear_inputs();
}
