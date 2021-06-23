<?php


namespace App\Http\Containers;


use App\Http\Contracts\ElasticSearchContract;
use App\Http\Resources\TodoResource;
use Weegy\Todos\App\Models\Todo;
use Elasticsearch;

class ElasticSearchContainer implements ElasticSearchContract
{

    public function indexContent(Todo $contentToIndex)
    {
        $toIndex = [
            'index'=>'laravel_test_byte5',
            'type' => 'document',
            'id' => $contentToIndex->id,
            'body' => [
                'id'=>'todo_'.$contentToIndex->id,
                'title'=>$contentToIndex->title,
                'user'=>$contentToIndex->user_id,
                'user_name'=>$contentToIndex->user->name
            ]
        ];
        ElasticSearch::index($toIndex);
    }

    public function searchContent($query)
    {
        $toSearch = [
            'index'=>'laravel_test_byte5',
            'body'=>json_decode('{
                "query": {
                  "query_string": {
                    "fields": ["title^50", "user_name"],
                    "query": "*' . $query . '*",
                    "analyze_wildcard": true
                  }
                }
            }')
        ];
        $results = Elasticsearch::search($toSearch);
        dd($results);
        return $results;
    }
}
