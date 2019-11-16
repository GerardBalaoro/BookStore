<?php

namespace App\Traits;

trait Linkable
{
    protected static $providers = [
        'uri' => [
            'name' => 'URI',
            'url' => '{id}',
            'color' => 'gray'
        ],
        'amazon' => [
            'name' => 'Amazon',
            'url' => 'https://www.amazon.com/gp/product/{id}',
            'color' => 'orange'
        ],
        'google' => [
            'name' => 'Google Books',
            'url' => 'https://play.google.com/store/books/details?id={id}',
            'color' => 'blue'
        ],
        'barnesnoble' => [
            'name' => 'Barnes & Noble',
            'url' => 'https://www.barnesandnoble.com/{id}',
            'color' => 'green',
        ],
        'bookfusion' => [
            'name' => 'Bookfusion',
            'url' => 'https://www.bookfusion.com/books/{id}',
            'color' => 'purple',
        ]
    ];

    public function getUrlAttribute()
    {
        if (array_key_exists($this->type, self::$providers)) {
            return str_replace('{id}', $this->val, self::$providers[$this->type]['url']);
        }
    }

    public function getNameAttribute()
    {
        if (array_key_exists($this->type, self::$providers)) {
            return self::$providers[$this->type]['name'];
        }
    }

    public function getColorAttribute()
    {
        if (array_key_exists($this->type, self::$providers)) {
            return self::$providers[$this->type]['color'];
        }
    }
}