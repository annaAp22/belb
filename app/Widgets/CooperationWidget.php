<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class CooperationWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];
    public $cacheTime = 60;
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.cooperation_widget', [
            'config' => $this->config,
        ]);
    }
}
