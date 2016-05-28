<?php

    namespace Controllers\UserPages;

    // TODO: move to Game controller
    function game_list_page()
    {
        define('LIMIT_PAGE', 5);

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == strtolower('xmlhttprequest'))
        {
            return subscribe_team();
        }

        $page = 1;
        if (isset($_GET['N'])) {
            if (is_numeric($_GET['N'])) {
                $page = $_GET['N'];
            }
            else {
                return redirect(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
            }
        }
        
        $query = \Game::query()->order_by('date', 'up');
        $total_count = $query->count();

        $pagination = new \Pagination(LIMIT_PAGE, $total_count, $page);

        if ($page > $pagination->pages_quantity()) {
            return redirect(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        }

        $games = $query->offset(LIMIT_PAGE * ($page - 1),LIMIT_PAGE)->all();

        return view('games_list', compact('games', 'pagination'));
    }