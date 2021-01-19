<?php

Route::get('/user/{id}', 'PKaratanev\CashierTool\CashierToolController@user');
Route::post('/user/{id}/cancel', 'PKaratanev\CashierTool\CashierToolController@cancelSubscription');
Route::post('/user/{id}/resume', 'PKaratanev\CashierTool\CashierToolController@resumeSubscription');
Route::post('/user/{id}/update', 'PKaratanev\CashierTool\CashierToolController@updateSubscription');
Route::post('/user/{id}/refund/{chargeId}', 'PKaratanev\CashierTool\CashierToolController@refundCharge');