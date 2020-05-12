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
    }

    public function index()
    {
        $records = $this->orderContract->withRelations('user')->paginate(10);
        return view('backend.order.index', compact('records'));
    }

    public function delivered($id)
    {
        $record = $this->orderContract->getById($id);
        $record->update(['status' => 1]);
        return redirect()->route('admin.order.index');
    }
}
