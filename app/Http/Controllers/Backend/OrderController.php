<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\OrderContract;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var OrderContract
     */
    private $orderContract;

    public function __construct(OrderContract $orderContract)
    {
        $this->orderContract = $orderContract;
        $this->middleware('role:Super Admin|Admin');
    }

    public function index()
    {
        $records = $this->orderContract->withRelations(['user','product'])->paginate(10);
        $products = array();
        foreach ($records as $record){
            $products[$record->id] = implode(',', $record->product->pluck('name')->all());
        }
        return view('backend.order.index', compact('records', 'products'));
    }

    public function delivered($id)
    {
        $record = $this->orderContract->getById($id);
        $record->update(['status' => 1]);
        return redirect()->route('admin.order.index');
    }
}
