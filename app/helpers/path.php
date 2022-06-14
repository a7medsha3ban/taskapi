<?php


//function to get module path
function getModulePath(string $module_name){
    return app_path('Modules'.DS().$module_name.DS());
}

//function to get directory separator
function DS(){
    return DIRECTORY_SEPARATOR;
}

//function to get config file
function loadConfigFile(string $module_name,string $file_name){
    return getModulePath(ucfirst($module_name)).'config'.DS().$file_name.'.php';
}

//function to get routes file
function loadRoutesFile(string $module_name,string $file_name){
   return  getModulePath(ucfirst($module_name)).'routes'.DS().$file_name.'.php';
}

//function to get views file
function loadViewsFile(string $module_name){
    return getModulePath(ucfirst($module_name)).'resources'.DS().'views';
}

//function to get migration file
function loadMigrationsFile(string $module_name){
    return getModulePath(ucfirst($module_name)).'database'.DS().'migrations';
}



