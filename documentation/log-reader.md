<h3>Installation</h3> <pre class="language-markup"><code>composer require haruncpi/laravel-log-reader</code></pre> <p>Installation is done! Yah it's a really simple process. Now you are ready to use Laravel Log Reader.</p> <p>Just browse the <code>http://example.com/admin/log-reader</code> . You must be authenticated to view the logs.</p> <p><img src="https://laravelarticle.com/site/images/1px.png" alt="log-reader-desktop.png" width="700" height="421" data-src="https://laravelarticle.com/filemanager/uploads/log-reader-desktop.png" class="img img-responsive lazy" /></p> <p>Make sure your log channel set for daily <code>'channels' =&gt; ['daily']</code> in config/logging.php&nbsp;</p> <p>&nbsp;</p> <h3>Customizations</h3> <p>&nbsp;</p> <p><strong>1. JSON API [OPTIONAL] </strong></p> <p>If you want to make your won UI then this package also provides the JSON API for log files. You will get the API link here <code>/admin/api/log-reader</code></p> <p><strong>API response example</strong></p> <pre class="language-markup"><code>{
  "success": true,
  "data": {
    "available_log_dates": [
      "2020-01-27"
    ],
    "date": "2020-01-27",
    "filename": "laravel-2020-01-27.log",
    "logs": [
      {
        "timestamp": "2020-01-27 12:26:45",
        "env": "local",
        "type": "INFO",
        "message": "Backup success"
      },
      {
        "timestamp": "2020-01-27 12:26:45",
        "env": "local",
        "type": "EMERGENCY",
        "message": "Backup failed"
      }
    ]
  }
}</code></pre> <p>Get JSON data by date</p> <pre class="language-php"><code>use Haruncpi\LaravelLogReader\LaravelLogReader;

return (new LaravelLogReader(['date' =&gt; '2020-01-27']))-&gt;get();</code></pre> <p>&nbsp;</p> <p><strong>2. Config file [OPTIONAL] </strong></p> <p>If you want to change the route URL for viewing the logs then run the command for publishing laravel log reader configuration file.</p> <pre class="language-markup"><code>php artisan vendor:publish --provider="Haruncpi\LaravelLogReader\ServiceProvider" --tag="config"</code></pre> <p>&nbsp;</p> <p><strong>Need More Restrictions?</strong></p> <p>If you need more restriction to view logs, override the routes in your route file with your custom middleware or any logic you need.</p> <pre class="language-php"><code>Route::group([
    'namespace' =&gt; '\Haruncpi\LaravelLogReader\Controllers',
    'middleware' =&gt; ['auth','middleware1','middleware2']
    ],
    function () {
        Route::get(config('laravel-log-reader.view_route_path'), 'LogReaderController@getIndex');
        Route::post(config('laravel-log-reader.view_route_path'), 'LogReaderController@postDelete');
        Route::get(config('laravel-log-reader.api_route_path'), 'LogReaderController@getLogs');
    }
);</code></pre> <p>&nbsp;</p> <p>Hope the Laravel Log Reader package will help you to read, manage your Laravel log files easily! If this package helpful for you then please share the post with others.</p> <div id="gtx-trans" style="position: absolute; left: -11px; top: 1980.25px;"> <div class="gtx-trans-icon">&nbsp;</div> </div> </div> <br>
