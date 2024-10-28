<?php

class View {
    public static function render($view, $data = []) {
        extract($data);
        // extract($initial_data);
        require "./Views/{$view}.php";
    }
}
