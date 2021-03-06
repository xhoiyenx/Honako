<?php
/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Core\Foundation\Application( BASE_PATH );

# check if base configuration file exists
if ( file_exists( $app->environmentFilePath() ) ) {
  (new Dotenv\Dotenv($app->environmentPath(), $app->environmentFile()))->load();  
}
# need to do installation process
else {
  if ( $_SERVER['REQUEST_URI'] != '/system' ) {
    header('Location: /system');
    exit;
  }
}

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
  Illuminate\Contracts\Http\Kernel::class,
  Library\Http\Kernel::class
);

$app->singleton(
  Illuminate\Contracts\Console\Kernel::class,
  Library\Console\Kernel::class
);

$app->singleton(
  Illuminate\Contracts\Debug\ExceptionHandler::class,
  Library\Exceptions\Handler::class
);

return $app;