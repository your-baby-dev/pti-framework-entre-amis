<?php

namespace App;

class Container
{
    private Controller $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function render(): string
    {
        $page = $this->getPage();

        $title = 'Mon Super Site';

        ob_start();

        include __DIR__ . '/../views/header.php';

        echo $this->controller->fire($page);

        include __DIR__ . '/../views/footer.php';

        $view = ob_get_contents();

        ob_end_clean();

        return $view;
    }

    protected function getPage(): string
    {
        $uri = preg_replace('/\/([a-z0-9A-Z\/]*)\??.*/', '$1', $_SERVER['REQUEST_URI']);

        $page = preg_replace('/\//', '_', $uri);

        return $page === '' ? 'welcome' : $page;
    }
}
