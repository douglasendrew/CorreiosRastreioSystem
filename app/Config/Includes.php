<?php

    /**
     * 
     * @author douglasendrew
     * 
    */

    use SimpleWork\Core\Run as Config;

    // JS
    Config::include("uikit.min.js", "js");
    Config::include("uikit-icons.min.js", "js");
    Config::include("post_add_encomenda.js", "js");
    Config::include("jquery.mask.min.js", "js");
    Config::include("mask_inputs.js", "js");
    Config::include("listagem_enc.js", "js");

    // CSS
    Config::include("style.css", "css");
    Config::include("uikit-rtl.min.css", "css");
    Config::include("uikit.min.css", "css");
    
?>
