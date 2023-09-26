<?php

namespace App\Core\View;


final class View
{
    public static string $layout = 'default';
    private static string $layoutPath;
    private static string $path;
    private static ?array $data;

    public static function view(string $viewToDraw, array $data = []) 
    {
        self::$data = $data;
        self::pathReplace($viewToDraw);

        $content = new ViewContentMaker(self::$path, self::$data, self::$layoutPath);

        return $content->makeContent();
    }

    private static function pathReplace(string $viewToDraw): void
    {
        $pathToView = str_replace('public', 'app/resources/views/', $_SERVER['DOCUMENT_ROOT']);

        self::$layoutPath = $pathToView . 'layouts/' . self::$layout . '.php';

        self::$path = $pathToView . str_replace('.', '/', $viewToDraw) . '.php';
    }   

}