<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{
    public function collections()
    {
        $result = [];

        $eloquentCollection = BlogPost::withTrashed()->get();

        //dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());

        $collection = collect($eloquentCollection->toArray());

//        dd(
//            get_class($eloquentCollection),
//            get_class($collection),
//            $collection
//        );


        $result['where']['data'] = $collection
            ->where('category_id', 9)
            ->values()
            ->keyBy('id');

//        $result['where']['count'] = $result['where']['data']->count();
//        $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
//        $result['where']['isNoEmpty'] = $result['where']['data']->isNotEmpty();
//
//        $result['where_first'] = $collection
//            ->firstWhere('created_at', '>', '2022.05.01 01:35:11');

//        $result['map']['all'] = $collection->map(function (array $item){
//            $newItem = new \stdClass();
//            $newItem->item_id = $item['id'];
//            $newItem->item_name = $item['title'];
//            $newItem->exists = is_null($item['deleted_at']);
//
//           return $newItem;
//        });

//        $result['map']['not_exists'] = $result['map']['all']->where('exists', '=', false)
//            ->values()
//            ->keyBy('item_id');

        /*$collection->transform(function (array $item){
            $newItem = new \stdClass();
            $newItem->item_id = $item['id'];
            $newItem->item_name = $item['title'];
            $newItem->exists = is_null($item['deleted_at']);
            $newItem->created_at = Carbon::parse($item['created_at']);

            return $newItem;
        });

        $newItem = new \stdClass();
        $newItem->id = 9999;

        $newItem2 = new \stdClass();
        $newItem2->id = 8888;

        $newItemFirst = $collection->prepend($newItem)->first();
        $newItemLast = $collection->push($newItem2)->last();
        $pulledItem = $collection->pull(1);

        dd(compact('collection', 'newItemFirst', 'newItemLast', 'pulledItem'));
        //dd($newItem, $newItem2, $collection);*/

        /*$filtered = $eloquentCollection->filter(function ($item)
        {
            $byDay = $item->created_at->isFriday();

            $byDate = $item->created_at->day == 1;

            $result = $byDay && $byDate;
            //dd($item);
            return $result;
        });*/

        $sortedSimpleCollection = collect([5,3,1,2,4])->sort();
        $sortedAscCollection = $collection->sortBy('created_at');
        $sortedDescCollection = $collection->sortByDesc('item_id');

        dd(compact('sortedSimpleCollection', 'sortedAscCollection', 'sortedDescCollection'));
    }
}
