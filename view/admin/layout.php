<!doctype html>
<html>
    <head>
        <title>
            Football
        </title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="<?php echo url('/css/bootstrap.css'); ?>">
        <link rel="stylesheet" href="<?php echo url('/css/css.css'); ?>">
    </head>
    <body>
        <header>
            <?php if ($authorized_user): ?>
                Hello юзер <?php echo $authorized_user['login']; ?> ! <br/>
                <a href="<?php echo url(url_for('logout')) ?>">Logout</a>
            <?php else: ?>
                    Hello, гость!
                    <a href="<?php echo url(url_for('login')) ?>">Login</a>
            <?php endif; ?>
        </header>

        <ul class="list-inline">
            <li>
                    Teams
                </a>
                <ul>
                    <li>

                        <a href="<?php echo url_for('admin_teams'); ?>">
                            Edit Teams
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('admin_teams_new'); ?>">
                            Create New Team
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                    Games
                </a>
                <ul>
                    <li>
                        <a href="<?php echo url_for('admin_games'); ?>">
                            Edit Games
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('admin_games_new'); ?>">
                            Create Games
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                Players
                <ul>
                    <li>
                        <a href="<?php echo url_for('admin_players_new'); ?>">
                            Create Player
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <?php
            include($path);
        ?>

    </body>
</html>