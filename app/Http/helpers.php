<?php

/**
 * Load folder via access protocol
 */
function load_asset($asset_url)
{
    return ( env('APP_ENV') === 'production' ) ? secure_asset($asset_url) : asset($asset_url);
}

/**
 * Check if $auth_user == $user
 */
function uploaded_by($auth_user, $user)
{
    return ( $auth_user == $user ) ? 'You' : $user;
}