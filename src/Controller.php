<?php

namespace App;

class Controller
{
    public function fire(string $page): string
    {
        ob_start();

        switch ($page) {
            case 'welcome':
                include __DIR__ . '/../views/welcome.php';
                break;
            case 'users_list':
                $users = ['Jr', 'Valou', 'Wil'];
                include __DIR__ . '/../views/users_list.php';
                break;
            default:
                include __DIR__ . '/../views/404.php';
                break;
        }

        $content = ob_get_contents();

        ob_end_clean();

        return $content;
    }
}
