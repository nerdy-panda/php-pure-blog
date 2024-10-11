<?php
// @todo review this !!!
function redirectToDashboard():void{
    header("Location:".dashboardUrl());
}
function redirectToDashboardAndExit():void
{
    redirectToDashboard();
    exit;
}
function redirectToDashboardWhenLogin():void{
    if (isLogout())
        return;
    redirectToDashboardAndExit();
}
function redirectFailAuthentication():void {
    header("location:".loginUrl()."?authentication=false");
}
function redirectToLogin():void {
    header("Location:".loginUrl());
}
function redirectToLoginAndExit():void {
    redirectToLogin();
    exit;
}
function redirectToLoginWhenLogout():void {
    if (isLogin())
        return;
    redirectToLoginAndExit();
}
function redirectToHome():void {
    header("Location:".baseUrl());
}
function redirectToHomeAndExit():void {
    redirectToHome();
    exit;
}
function redirectToBack():void
{
    $back = backUrl();
    if (is_null($back))
        return;
    header("Location:".$back);
}
function redirectToBackAndExit():void {
    redirectToBack();
    exit;
}
function redirectToDashboardCategory():void {
    header("Location:".dashboardCategoryUrl());
}
function redirectToDashboardCategoryAndExit(){
    redirectToDashboardCategory();
    exit;
}
function redirectToDashboardCategoryIfCategoryNotFound(?array $category){
    if (is_null($category)){
        session_push_error("هیچ دسته بندی ای درسیستم با شناسه $id یافت نشد !!!");
        redirectToDashboardCategoryAndExit();
    }
}
function redirectToDashboardTag():void
{
    header("Location:".dashboardTagUrl());
}
function redirectToDashboardTagAndExit():void {
    redirectToDashboardTag();
    exit;
}
function redirectToDashboardTagEdit(int $id):void {
    header("Location:".dashboardTagEditUrl($id));
}
function redirectToDashboardTagEditAndExit(int $id):void {
    redirectToDashboardTagEdit($id);
    exit;
}
function redirectToDashboardEditCategory(int $id):void {
    header("Location:".dashboardEditCategoryUrl($id));
}
function redirectToDashboardEditCategoryAndExit(int $id):void
{
    redirectToDashboardEditCategory($id);
    exit;
}
function redirectToDashboardArticle():void {
    header("Location:".dashboardArticleUrl());
}
function redirectToDashboardArticleAndExit():void {
    redirectToDashboardArticle();
    exit;
}
function redirectToDashboardArticleCreate():void {
    header("Location:".dashboardArticleCreateUrl());
}
function redirectToDashboardArticleCreateAndExit():void {
    redirectToDashboardArticleCreate();
    exit;
}
function redirectToDashboardArticleEdit(int $id):void {
    $url = dashboardArticleEditUrl($id);
    header("Location:".$url);
}
function redirectToDashboardArticleEditAndExit(int $id):void {
    redirectToDashboardArticleEdit($id);
    exit;
}
function redirectToTagCreate():void {
    header("Location:".dashboardTagCreateUrl());
}
function redirectToTagCreateAndExit():void
{
    redirectToTagCreate();
    exit;
}