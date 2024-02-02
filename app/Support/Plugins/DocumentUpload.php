<?php
namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class DocumentUpload extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('Document Upload'))
            ->route('document-upload')
            ->icon('fa fa-upload')
            ->active("document-upload*")
            // ->permissions('users.manage')
            ;
    }
}