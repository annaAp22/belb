<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Tag;

class AdviceWidget extends AbstractWidget
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
      $tag = Tag::published()
        ->where('sysname','poleznye-sovety')
        ->with(['articles' => function($query) {
          $query->published()->recent()->take(4);
        }])
        ->firstOrFail();

        return view('widgets.advice_widget', [
          'tag' => $tag,
          'articles' => $tag->articles,
          'config' => $this->config,
        ]);
    }
}
