<?php


namespace App\Http\Contracts;


use Weegy\Todos\App\Models\Todo;

interface ElasticSearchContract
{
    public function indexContent(Todo $contentToIndex);

    public function searchContent($query);
}
