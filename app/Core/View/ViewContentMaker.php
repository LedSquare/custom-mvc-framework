<?php

namespace App\Core\View;

final class ViewContentMaker
{
    protected string $layoutPath;
    protected string $path;
    protected ?array $data;
    
    public function __construct(string $path, array $data, string $layoutPath)
    {
        $this->path = $path;
        $this->data = $data;
        $this->layoutPath = $layoutPath;
    }

    public function makeContent()
    {
        extract($this->data);

        ob_start();
            include $this->path;
            $view = ob_get_contents();
        ob_get_clean();

        ob_start();
            include $this->layoutPath;
            $content = ob_get_contents();
        ob_get_clean();
        return $content;
    }
}