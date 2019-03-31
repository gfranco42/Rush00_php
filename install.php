#!/usr/bin/php
<?php
    if (file_exists('data'))
        system("rm -rf data");
    mkdir('data');
    $array = array(
        array('id'=>1, 'name'=>"Apple", 'price'=>1, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/green-apple_1f34f.png", 'category'=>"fruit"),
        array('id'=>2, 'name'=>"Avocado", 'price'=>8, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/avocado_1f951.png", 'category'=>"vegetable"),
        array('id'=>3, 'name'=>"Banana", 'price'=>10, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/banana_1f34c.png", 'category'=>"fruit"),
        array('id'=>4, 'name'=>"Carrot", 'price'=>1, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/carrot_1f955.png", 'category'=>"vegetable"),
        array('id'=>5, 'name'=>"Cucumber", 'price'=>9, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/cucumber_1f952.png", 'category'=>"vegetable"),
        array('id'=>6, 'name'=>"Tomato", 'price'=>6, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/tomato_1f345.png", 'category'=>"vegetable"),
        array('id'=>7, 'name'=>"Potato", 'price'=>2, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/potato_1f954.png", 'category'=>"vegetable"),
        array('id'=>8, 'name'=>"Milk", 'price'=>8, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/glass-of-milk_1f95b.png", 'category'=>"drink"),
        array('id'=>9, 'name'=>"Coffee", 'price'=>13, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/hot-beverage_2615.png", 'category'=>"drink"),
        array('id'=>10, 'name'=>"Sake", 'price'=>7, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/sake-bottle-and-cup_1f376.png", 'category'=>"drink"),
        array('id'=>11, 'name'=>"Wine", 'price'=>78, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/wine-glass_1f377.png", 'category'=>"drink"),
        array('id'=>12, 'name'=>"Birthday Cake", 'price'=>30, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/birthday-cake_1f382.png", 'category'=>"cake"),
        array('id'=>13, 'name'=>"Fish Cake", 'price'=>16, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/fish-cake-with-swirl-design_1f365.png", 'category'=>"cake"),
        array('id'=>14, 'name'=>"Short Cake", 'price'=>64, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/shortcake_1f370.png", 'category'=>"cake"),
        array('id'=>15, 'name'=>"Oden", 'price'=>28, 'url'=>"https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/oden_1f362.png", 'category'=>"cake"),
    );
    $seri = serialize($array);
    file_put_contents("./data/products", $seri);
    unset($array, $seri);
    $array = array(
        array('id'=>1, 'username'=>"root", 'password'=>"06948d93cd1e0855ea37e75ad516a250d2d0772890b073808d831c438509190162c0d890b17001361820cffc30d50f010c387e9df943065aa8f4e92e63ff060c", 'status'=>"active", 'grade'=>"admin")
    );
    $seri = serialize($array);
    file_put_contents("./data/users", $seri);
    unset($array, $seri);
    $array = array(
        array('id'=>1, 'name'=>"fruit", 'label'=>"Fruits"),
        array('id'=>1, 'name'=>"vegetable", 'label'=>"Vegetables"),
        array('id'=>1, 'name'=>"cake", 'label'=>"Cakes"),
        array('id'=>1, 'name'=>"drink", 'label'=>"Drinks")
    );
    $seri = serialize($array);
    file_put_contents("./data/categories", $seri);
    unset($array, $seri);
    file_put_contents('./data/cart', "");
?>
