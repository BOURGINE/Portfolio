<?php

namespace Portfolio\View;

class View
{
    /**
     * @param string $path
     * @param array $data
     * 
     * @return void
     */
    public function render(string $path, array $data = null): void
    {
        if ($data !== null) {
            extract($data);
        }
       
        \ob_start();
        require(dirname(__DIR__).'/template/'.$path.'.html.php');
        $pageContent = \ob_get_clean();

        require(dirname(__DIR__).'/template/base.html.php');
    }

    /**
     * @param string $path
     * @param array $data
     * 
     * @return void
     */
    public function renderBack(string $path, array $data = null): void
    {
        if ($data !== null) {
            extract($data);
        }
       
        \ob_start();
        require(dirname(__DIR__).'/template/'.$path.'.html.php');
        $pageContent = \ob_get_clean();

        require(dirname(__DIR__).'/template/base_dashboard.html.php');
    }

    /**
     * @param string $url
     * 
     * @return void
     */
    public function redirectTo(string $url): void
    {
        header("Location: $url");
        exit();
    }

}