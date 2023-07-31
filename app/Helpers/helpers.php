<?php

const PAGINATION_NUMBER = 10;

function activeUrl($items = []): string
{
    if(request()->is($items)) {
        return 'active';
    } else {
        return '';
    }
}


function openMenu($items = []): string
{
    if(request()->is($items)) {
        return 'menu-open';
    } else {
        return '';
    }
}
