@setup
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
@endsetup

@servers(['test' => env('TEST_SERVER'), 'prod' => env('PRODUCTION_SERVER')])


@story('deploy', ['on' => ['test']])
    update-code
@endstory

@story('deploy-prod', ['on' => ['prod']])
    update-code-production
@endstory


@story('deployAll', ['on' => ['test']])
    update-code
    refresh-migrate
@endstory


@story('deploy-any')
    update-code
    update-code-production
@endstory

@task('update-code', ['on' => ['test']])

    cd /home/sfdevelop/web/bureviy.sf-site.pp.ua/public_html

    set -e
    echo 'Deploying ... '
    git pull origin master
    composer i
    php artisan migrate --force
    echo "Done"

@endtask

@task('refresh-migrate', ['on' => ['test']])

    cd /home/sfdevelop/web/bureviy.sf-site.pp.ua/public_html

    set -e
    echo 'Refresh migrate ... '
    php artisan migrate:fresh --seed
    echo "Done refresh"

@endtask

@task('composerUpdate', ['on' => ['test']])

    cd /home/sfdevelop/web/bureviy.sf-site.pp.ua/public_html

    set -e
    echo 'Composer Update Start ... '
    composer update
    echo "Done Composer Update"

@endtask

@task('updateNovaPochta', ['on' => ['test']])

    cd /home/sfdevelop/web/bureviy.sf-site.pp.ua/public_html

    set -e
    echo 'Update Start ... '
    php artisan import:npdata
    php artisan import:pochtomat
    echo "Is Cool"

@endtask


@task('update-code-production', ['on' => ['prod']])

    cd /home/ivatherm/web/ivatherm.com.ua/public_html

    set -e
    echo 'Deploying ... '
    git pull
    composer i
    php artisan migrate --force
    php artisan horizon:terminate
    echo "Done"

@endtask

@task('regenerate-img-prod', ['on' => ['prod']])

    cd /home/ivatherm/web/ivatherm.com.ua/public_html

    set -e
    echo 'Deploying ... '
    php artisan media-library:regenerate "App\Models\Product" --force
    echo "Done"
@endtask

@task('regenerate-img-test', ['on' => ['test']])
    cd /home/sfdevelop/web/bureviy.sf-site.pp.ua/public_html

    set -e
    echo 'Deploying ... '
    php artisan media-library:regenerate "App\Models\Product" --force
    echo "Done"

@endtask
