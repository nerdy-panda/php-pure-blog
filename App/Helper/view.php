<?php
function view(string $view , array $data = [] , array $places = []):void {
    extract($data);
    $viewPath = VIEW_PATH.'/'.dotToSlash($view).'.php';
    require $viewPath;
}
function component(string $component , array $data = []):void {
    $componentPath = 'Component.'.$component;
    view($componentPath,$data);
}
function partial(string $partial , array $data = [] , array $places = []):void {
    $partialPath = 'Partial.'.$partial;
    view($partialPath,$data,$places);
}
function insert_place(array $places,string $placeKey):void{
    if (isset($places[$placeKey]))
        if (is_string($places[$placeKey]))
            echo $places[$placeKey].PHP_EOL;
        else
            foreach ($places[$placeKey] as $script)
                echo $script.PHP_EOL;
}
//function pageTitleByScriptName(string $page):string {
//
//    $result = "";
//    switch ($page) {
//        case "index.php" :
//            $result = "صفحه اصلی";
//        break;
//        case "login.php";
//            $result = "ورود";
//        break;
//        case "/dashboard/index.php":
//            $result = "پنل کاربری";
//        break;
//
//    }
//    return $result;
//}

function get_Favicon(string $favicon):?string {
    $faviconUrl = asset($favicon);
    return '<link rel="icon" href="'.$faviconUrl.'">'.PHP_EOL;
}
function print_favicon(?string $favicon):void {
    if (is_null($favicon))
        return;
    echo get_favicon($favicon);
}
function indexPageStyles():array|string {
    $href = asset("css/page/index.css");
    return "<link rel='stylesheet' href='$href' media='all' >";
}
function indexPageHeaderScripts():array|string
{
    $src = asset("js/page/index.js");
    return "<script src='$src' type='module'></script>";
}
function indexPagePlaces():array {
    return ['styles'=>indexPageStyles() , 'headerScripts'=> indexPageHeaderScripts()];
}
function loginPageStyles():string|array {
    $href = asset("css/page/login.css");
    return "<link rel='stylesheet' href='$href' media='all'>";
}
function loginPageHeaderScripts():string|array {
    $src = asset("js/page/login.js");
    return "<script src='$src' type='module'></script>";
}
function loginPagePlaces():array {
    return ['styles'=>loginPageStyles(),'headerScripts'=>loginPageHeaderScripts()];
}
function mustBeChecked(bool $checked):string {
    if ($checked)
        return "checked";
    return "";
}
function inputValue(string|null $value):string {
    if (is_null($value) || $value=="")
        return "";
    return "value=\"$value\"";
}
function dashboardStyles():string|array {
    $href = asset("css/page/dashboard.css");
    return "<link rel='stylesheet' href='$href' media='all' >";
}
function dashboardHeaderScripts():string|array
{
    $src = asset("js/page/Dashboard/Index/Launcher.js");
    return "<script src=\"$src\" type=\"module\"></script>";
}
function dashboardPlaces():array {
    return [
        "styles" => dashboardStyles() ,
        "headerScripts" => dashboardHeaderScripts() ,
    ];
}
function getAttributeIfNotNull(string $attribute , ?string $value):?string {
    if (is_null($value))
        return null;
    return "$attribute='$value'";
}
function getAttributesIfNotNull(array $attributes):string {
    $result = "";
    foreach ($attributes as $key=>$attribute){
        $htmlAttribute = getAttributeIfNotNull($key,$attribute);
        if (is_null($htmlAttribute))
            continue;
        $result.=" ".$htmlAttribute;
    }

    return $result;
}

function categoryNameFieldData(): array
{
    return [
        "name" => "name",
        "title" => "نام :",
        "icon" => "fa-solid fa-signature",
        "id" => "name",
        "value" => session_get_input("name")
    ];
}
function categorySlugFieldData():array {
    return [
        "name"=>"slug",
        "id"=>"slug",
        "value"=>session_get_input("slug") ,
        "title"=> "آدرس :" ,
        "icon"=>"fa-solid fa-earth-americas"
    ];
}
function categoryIconFieldData():array
{
    return [
        "name"=>"icon",
        "id"=>"icon",
        "value"=>session_get_input("icon"),
        "icon"=>"fa-solid fa-icons",
        "title"=> "ایکون :"
    ];
}
function pageCount(int $entityCount , int $showCount):int {
    return divisionRoundUp($entityCount , $showCount );
}
function dashboardBaseViewData(PDO $databaseConnection):array {
    $setting = dashboardSetting($databaseConnection);
    $title = getPageTitle($databaseConnection , scriptName());
    return [
        "favicon" => $setting['favicon'] ,
        "title" => $title ,
        "userDefaultThumbnail"=> $setting['user_default_thumbnail'] ,
        "username" => $_SESSION['user']['name'] ,
        "userThumbnail" => userThumbnailOrDefault($_SESSION['user']['thumbnail'] ,$setting['user_default_thumbnail']) ,
        "copyright" => $setting['copyright']
    ];
}
function dashboardArticleCreateHeaderScripts():array|string {
    $src = asset("js/page/Dashboard/article/create/Luancher.js");
    return "<script src='$src' type='module'></script>";
}
function dashboardArticleCreatePlaces():array {
    return [
        "styles" => dashboardStyles() ,
        "headerScripts" => dashboardArticleCreateHeaderScripts() ,
    ];
}
function categoryToSelectItem(array $category , ?string $selectedId):array {
    return [
        "value" => $category["id"] ,
        "text" => $category["name"] ,
        "selected" => $category["id"] == $selectedId
    ];
}
function categoriesToSelectItems(array $categories , ?string $selectedId):array {
    $items = [];
    foreach ($categories as $category)
        $items[] = categoryToSelectItem($category,$selectedId);
    return $items;
}
function tagToSelectItem(array $tag , array $selectedIds):array {
    return ["value" => $tag["id"] , "text" => $tag["name"] , "selected" => in_array($tag["id"],$selectedIds)];
}
function tagsToSelectItems(array $tags , array $selectedIds):array {
    $items = [];
    foreach ($tags as $tag){
        $items[] = tagToSelectItem($tag,$selectedIds);
    }
    return $items ;
}