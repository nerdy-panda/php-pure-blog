<?php
function url_protocol():string {
    return $_SERVER['REQUEST_SCHEME'];
}
function url_host():string {
    return $_SERVER['HTTP_HOST'];
}
function url_directory():string {
    return dirname($_SERVER['SCRIPT_NAME']);
}
function url_has_directory():bool {
    return url_directory() !== DIRECTORY_SEPARATOR ;
}
function baseUrl():string {
    $protocol = url_protocol();
    $host = url_host();
    return $protocol."://".$host;
}
function url():string {
    $baseUrl = baseUrl();
    if (url_has_directory())
       return $baseUrl.url_directory();
    return $baseUrl;
}
function print_url():void {
    echo url();
}
function asset(string $asset):string
{
    return baseUrl().DIRECTORY_SEPARATOR.$asset;
}
function print_asset(?string $asset):void {
    if (is_null($asset))
        return;
    echo asset($asset);
}
function current_page(string $pageKey):int
{
    if (!isset($_REQUEST[$pageKey]))
        return 1;
    return abs($_REQUEST[$pageKey]);
}
function scriptName():string {
    return $_SERVER['SCRIPT_NAME'];
}
function currentFile():string {
    return basename(scriptName());
}
function loginUrl():string {
    return baseUrl()."/login.php";
}
function backUrl():string|null {
    return $_SERVER['HTTP_REFERER'] ?? null ;
}
function dashboardUrl():string {
    return baseUrl().'/dashboard';
}
function dashboardCategoryUrl():string {
    return dashboardUrl().'/category';
}
function dashboardCreateCategoryUrl():string {
    return dashboardCategoryUrl().'/create.php';
}
function categoryUrl(string $slug):string {
    return baseUrl()."/category.php?slug=$slug";
}
function dashboardDeleteCategoryUrl(int $id):string
{
    return dashboardCategoryUrl().'/delete.php?id='.$id;
}
function dashboardEditCategoryUrl(int $id):string {
    return dashboardCategoryUrl()."/edit.php?id=$id";
}
function dashboardCategoryUpdateUrl(int $id):string
{
    return dashboardCategoryUrl()."/update.php/?id=$id";
}
function dashboardArticleUrl():string {
    return dashboardUrl()."/article";
}
function dashboardArticleCreateUrl():string {
    return dashboardArticleUrl()."/create.php";
}
function dashboardArticleInsertUrl():string {
    return dashboardArticleUrl()."/insert.php";
}
function dashboardArticleEditUrl(int $id):string {
    return dashboardArticleUrl()."/edit.php?id=$id";
}
function dashboardArticleUpdateUrl(int $id):string {
    return dashboardArticleUrl()."/update.php?id=$id";
}
function dashboardArticleDeleteUrl(int $id):string {
    return dashboardArticleUrl()."/delete.php?id=$id";
}
function ArticleUrl(string $slug):string {
    return baseUrl().'/article.php?slug='.$slug;
}
function tagUrl(string $slug):string {
    return baseUrl()."/tag.php?slug=$slug";
}
function dashboardTagUrl():string {
    return dashboardUrl()."/tag";
}
function dashboardTagCreateUrl():string {
    return dashboardTagUrl()."/create.php";
}
function dashboardTagEditUrl(int $id):string {
    return dashboardTagUrl()."/edit.php?id=$id";
}
function dashboardTagUpdateUrl(int $id):string
{
    return dashboardTagUrl()."/update.php?id=$id";
}
function dashboardTagDeleteUrl(int $id):string {
    return dashboardTagUrl()."/delete.php?id=$id";
}
function userUrl(string $username):string {
    return baseUrl()."/user.php?username=$username";
}
function dashboardTagInsertUrl(){
    return dashboardTagUrl()."/insert.php";
}
