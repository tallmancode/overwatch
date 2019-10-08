<?php

if (!function_exists('overwatch_asset')) {
    function overwatch_asset($path, $secure = null)
    {
        return route('overwatch.overwatch_assets').'?path='.urlencode($path);
    }
}

?>
