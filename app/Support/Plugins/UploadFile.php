<?php
namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class UploadFile extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('Upload Excel File'))
            ->route('upload-file')
            ->icon('fa fa-upload')
            ->active("upload-file*")
            // ->permissions('users.manage')
            ;
    }
}