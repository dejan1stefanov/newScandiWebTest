<?php 

namespace StoreApp;

class Factory {

    public static function create() {
        $classname = ucfirst($_POST['origin']);
        
        $classname = "\StoreApp\\$classname";

        $object = new $classname($_POST);

        return $object;
    }

    public static function create_ajax($name) {

        $classname = ucfirst($name);
        
        $classname = "\StoreApp\\$classname";

        return $classname;
    }
}