<?php

namespace App\Core\View;

final class View
{
    private static string $layout = 'default';
    private static string $layoutPath;
    private static string $path;
    private static ?array $data;

    public static function view(string $viewToDraw, array $data = []): string 
    {
        self::$data = $data;
        self::pathReplace($viewToDraw);
        
        return self::getContent();
    }

    /**
     * @var pathToLayout
     */
    private static function pathReplace(string $viewToDraw): void
    {
        $pathToView = str_replace('public', 'app/resources/views/', $_SERVER['DOCUMENT_ROOT']);

        self::$layoutPath = $pathToView . 'layouts/' . self::$layout . '.php';

        self::$path = $pathToView . str_replace('.', '/', $viewToDraw) . '.php';
    }

    private static function getContent(): string 
    {   
        extract(self::$data);

        ob_start();
            include self::$layoutPath;
            include self::$path;
            $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

}