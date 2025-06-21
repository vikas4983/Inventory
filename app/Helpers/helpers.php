<?php

if (!function_exists('model_counts')) {

    function model_counts()
    {
        return app('model_counts')->modelCount();
    }
}
