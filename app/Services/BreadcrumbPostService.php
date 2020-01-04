<?php

namespace App\Services;

/**
 * 構造体と扱いは一緒のつもり
 */
class BreadcrumbPostService
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $link;


    /**
     * @var string|null
     */
    public $parent;

    /**
     * @var integer|null
     */
    public $parent_id;

    public function __construct(string $title, string $url, ?string $parent, ?int $parent_id)
    {
        $this->title     = $title;
        $this->link      = $url;
        $this->parent    = $parent;
        $this->parent_id = $parent_id;
    }
}
