<?php
namespace Deployer;
require 'recipe/laravel.php';

// Configuration

set('repository', 'git@github.com:no4/Ltest.git');
add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Servers

server('production', '192.168.1.112')
    ->user('kenlam')->password('LK123qwe')
    ->set('deploy_path', '/var/www/Ltest');


// Tasks

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php-fpm.service');
});
//after('deploy:symlink', 'php-fpm:restart');
