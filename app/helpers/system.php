<?php

// Debugger with pre tag
function preDebug($data) {
    echo('<pre>');
    var_dump($data);
    echo('</pre>');
}

// Debugger with textarea tag
function textareaDebug($data) {
    echo('<textarea>');
    print_r($data);
    echo('</textarea>');
}

// Get Actual information from .config
function getActualArrConf() {
    $file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/app/.config');
    $prepareArrayConfig = explode(';', $file);
    $arrayConfig = [];
    foreach($prepareArrayConfig as $preparingValue) {
        if (strlen($preparingValue) > 0) {
            $arrValue[] = explode('=', $preparingValue);
        }
    }
    foreach($arrValue as $arProps) {
        $arrayConfig[trim($arProps[0])] = trim($arProps[1]);
    }
    
    return $arrayConfig;
}

// Set information for .config
function setActualConf($arrayConfig) {
    $file = fopen($_SERVER['DOCUMENT_ROOT'] . '/app/.config', 'w');
    foreach ($arrayConfig as $prop => $value) {
        fwrite($file, $prop . "=" . $value . ";");
    }
    fclose($file);
}

// Get information from .config for variable,
// Set information from .config for variable
function config($key, $value = null) {
    $arrConfig = getActualArrConf();
    // textareaDebug($arrConfig);
    if ($value === null) {
        if (array_key_exists($key, $arrConfig)) {
            return $arrConfig[$key];
        }
        return false;
    } else {
        $arrConfig[$key] = $value;
        setActualConf($arrConfig);
    }
}

function component(string $template, string $component_name, array $data = []) : bool {

    $path = '/templates/' . $template . '/components/' . preg_replace('/\./', '/', $component_name) . '.php'; 

    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $path)) {
        include($_SERVER['DOCUMENT_ROOT'] . $path);
        return true;
    }
    return false;
}


function getTemplate(string $name, $data = [], $optionalName = '') {
    $file = ( $optionalName) ? $optionalName : 'index';
    $path = '/templates/' . preg_replace('/\./', '/', $name) . '/' . $file . '.php';

    if (file_exists($_SERVER['DOCUMENT_ROOT'] . $path)) {
        include($_SERVER['DOCUMENT_ROOT'] . $path);
        return true;
    }
    return false;

}

