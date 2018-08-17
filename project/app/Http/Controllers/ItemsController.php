<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemsFormRequest;
use App\Items;
use Illuminate\Http\Response;

class ItemsController extends Controller
{
    protected $items;

    public function __construct(Items $items)
    {
        $this->items = $items;
    }

    public function show($id)
    {
        $item = $this->items->find($id);
        return response()->json(
            [
                'data' => $item ?? [],
                'status' => Response::HTTP_OK
            ]
        );
    }

    public function index()
    {
        $item = $this->items->all();
        return response()->json(
            [
                'data' => $item,
                'status' => Response::HTTP_OK
            ]
        );
    }

    public function store(ItemsFormRequest $request)
    {
        $data = $request->all();
        $this->items->title = $data['title'];
        $this->items->content = $data['content'];
        $this->items->save();

        return response()->json(['status' => Response::HTTP_OK]);
    }

    public function update(ItemsFormRequest $request, $id)
    {
        $data = $request->all();
        $item = $this->items->find($id);

        $item->title = $data['title'];
        $item->content = $data['content'];
        $item->save();

        return response()->json(['status' => Response::HTTP_OK]);
    }

    public function destroy($id)
    {
        $item = $this->items->find($id);
        $item->delete();

        return response()->json(['status' => Response::HTTP_OK]);
    }

    public function clear()
    {
        $this->items->all()->map(function ($item) {
            $item->delete();
        });
        return response()->json(['status' => Response::HTTP_OK]);
    }
}
