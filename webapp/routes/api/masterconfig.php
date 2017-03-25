<?php

Route::group(['prefix' => 'api', 'namespace' => 'API', 'middleware' => ['cors', 'api']],function(){
  /**
   **  # MasterConfig APIs Routes
   **=====================================================================================
   **
  */
    Route::group(['prefix' => 'master', 'namespace' => 'Master'], function(){
      Route::post('/config', 'MasterConfigFacade@getMasterConfig'); // (validated)
    });
  /*
   *  End of APIs
   */
});
