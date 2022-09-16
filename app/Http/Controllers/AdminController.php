<?php

namespace App\Http\Controllers;

use App\Services\ProductColorService;
use App\Services\ProductComponentService;
use App\Services\ProductSpecialService;
use App\Services\ProductTypeService;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    protected $productService;
    protected $productTypeService;
    protected $productColorService;
    protected $productSpecialService;
    protected $productComponentService;

    public function __construct(
        ProductService $productService,
        ProductTypeService $productTypeService,
        ProductColorService $productColorService,
        ProductSpecialService $productSpecialService,
        ProductComponentService $productComponentService
    )
    {
        $this->productService = $productService;
        $this->productTypeService = $productTypeService;
        $this->productColorService = $productColorService;
        $this->productSpecialService = $productSpecialService;
        $this->productComponentService = $productComponentService;
    }

    public function index()
    {
        $products = $this->productService->getAllByStatus()->load('component.color');

        return view('admin.product.index', ['products' => $products]);
    }

    public function create()
    {
        $assign['color'] = $this->productColorService->getAllByStatus();
        $assign['type'] = $this->productTypeService->getAllByStatus();
        $assign['special'] = $this->productSpecialService->getAllByStatus();
        $assign['memory'] = PRODUCT_MEMORY;

        return view('admin.product.create', $assign);
    }

    public function edit($id)
    {
        $assign['color'] = $this->productColorService->getAllByStatus();
        $assign['type'] = $this->productTypeService->getAllByStatus();
        $assign['special'] = $this->productSpecialService->getAllByStatus();
        $assign['memory'] = PRODUCT_MEMORY;
        $assign['productComponent'] = $this->productComponentService->findId($id);
        $assign['product'] = $assign['productComponent']->product;
        $assign['id'] = $id;

        return view('admin.product.edit', $assign);
    }

    public function store(Request $request)
    {
        $dataRequest = $request->all();

        //Combination to 1 array
        $arr = array();
        for ($i = 0; $i < count($dataRequest['memory']); $i++) {
            $file = $request->file('image')[$i] ?? null;
            $h = [
                'id' => $i,
                'memory' => $dataRequest['memory'][$i],
                'color' => $dataRequest['color'][$i],
                'amount' => $dataRequest['amount'][$i],
                'price' => $dataRequest['price'][$i],
                'image' => $file ? $file->getClientOriginalName() : null
            ];
            array_push($arr, $h);
        }

        //Unique collection
        $collect = collect($arr);
        for ($i = 0; $i < count($dataRequest['memory']); $i++) {
            $query = $collect->where('memory', $dataRequest['memory'][$i])
                             ->where('color', $dataRequest['color'][$i]);

            if ($query->count() >= 2) {
                $id = $query->first()['id'];
                $collect->forget($id);
            }
        }

        try {
            $dataProduct = [
                'name' => $dataRequest['name'],
                'type' => $dataRequest['type'],
                'description' => $dataRequest['description'],
                'status' => isset($dataRequest['status']) ? 1 : 0
            ];

            if (!isset($dataRequest['id'])) {
                //Insert product
                $product = $this->productService->insert($dataProduct);
            } else {
                //Update product
                $productId = $this->productComponentService->findId($dataRequest['id'])->product->id;
                $product = $this->productService->update($dataProduct, $productId);
            }

            if (!empty($dataRequest['special'])) {
                $product->special()->sync($dataRequest['special']);
            }

            //Insert Product Component
            $dataProductComponent = array();

            foreach ($collect as $data) {
                $row = [
                    'product_id' => $product->id,
                    'memory' => $data['memory'],
                    'color_id' => $data['color'],
                    'amount' => $data['amount'],
                    'price' => $data['price'],
                    'image' => $data['image'],
                    'created_at' => Carbon::now()
                ];

                array_push($dataProductComponent, $row);
            }

            if (isset($dataRequest['id'])) {
                $dataProductComponent = [
                    'memory' => $dataRequest['memory'][0],
                    'color_id' => $dataRequest['color'][0],
                    'amount' => $dataRequest['amount'][0],
                    'price' => $dataRequest['price'][0],
                    'image' => $dataRequest['image'][0],
                ];
                if (empty($dataRequest['image'][0])) {
                    unset($dataProductComponent['image']);
                }

                $this->productComponentService->update($dataProductComponent, $dataRequest['id']);
            } else {
                $this->productComponentService->insertMulti($dataProductComponent);
            }

            return redirect()->back()->with(['status' => 'success', 'message' => 'Thêm mới thành công']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => 'fail', 'message' => 'Thêm mới thất bại']);
        }
    }

    public function delete($id)
    {
        return $this->productService->delete($id);
    }

    public function indexProductType()
    {
        $data = $this->productTypeService->all();

        return view('admin.product_type.index', ['data' => $data]);
    }

    public function createProductType()
    {
        return view('admin.product_type.create');
    }

    public function editProductType($id)
    {
        $data = $this->productTypeService->findId($id);

        return view('admin.product_type.edit', ['data' => $data, 'id' => $id]);
    }

    public function storeProductType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'unique:product_type_models,name,' . $request->input('id')
        ]);

        if (!$validator->passes() && !$request->has('id')) {
            return response()->json(['status' => 0]);
        }

        if (!$validator->passes() && $request->has('id')) {
            return redirect()->back()->with(['status' => 'fail', 'message' => 'Tên này đã tồn tại']);
        }

        $dataRequest = $request->all();

        $data = [
            'name'       => $dataRequest['name'],
            'status'     => isset($dataRequest['status']) ? $dataRequest['status'] : 1
        ];

        if (isset($dataRequest['id'])) {
            $this->productTypeService->update($data, $dataRequest['id']);
            return redirect()->back()->with(['status' => 'success', 'message' => 'Thay đổi thành công']);
        }

        $row = $this->productTypeService->insert($data);

        if ($row) {
            return response()->json(['status' => 1 ,'data' => $row]);
        }

        return response()->json(['status' => 0]);
    }

    public function deleteProductType($id)
    {
        $this->productTypeService->delete($id);
        return redirect()->back()->with(['status' => 'success', 'message' => 'Xoá thành công']);
    }

    public function indexProductColor()
    {
        $data = $this->productColorService->all();

        return view('admin.product_color.index', ['data' => $data]);
    }

    public function createProductColor()
    {
        return view('admin.product_color.create');
    }

    public function editProductColor($id)
    {
        $row = $this->productColorService->findId($id);

        return view('admin.product_color.edit', ['data' => $row, 'id' => $id]);
    }

    public function storeProductColor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'color' => 'unique:product_color_models,name,' . $request->input('id')
        ]);

        if (!$validator->passes() && !$request->has('id')) {
            return response()->json(['status' => 0]);
        }

        if (!$validator->passes() && $request->has('id')) {
            return redirect()->back()->with(['status' => 'fail', 'message' => 'Màu này đã tồn tại']);
        }

        $dataRequest = $request->all();

        $data = [
            'name'       => $dataRequest['color'],
            'color_code' => $dataRequest['color-code'],
            'status'     => isset($dataRequest['status']) ? $dataRequest['status'] : 1
        ];

        if (isset($dataRequest['id'])) {
            $this->productColorService->update($data, $dataRequest['id']);
            return redirect()->back()->with(['status' => 'success', 'message' => 'Thay đổi thành công']);
        }

        $row = $this->productColorService->insert($data);

        if ($row) {
            return response()->json(['status' => 1 ,'data' => $row]);
        }

        return response()->json(['status' => 0]);
    }

    public function deleteProductColor($id)
    {
        $this->productColorService->delete($id);
        return redirect()->back()->with(['status' => 'success', 'message' => 'Xoá thành công']);
    }

    public function indexProductSpecial()
    {
        $data = $this->productSpecialService->all();

        return view('admin.product_special.index', ['data' => $data]);
    }

    public function storeProductSpecial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'unique:special_models,name,' . $request->input('id')
        ]);

        if (!$validator->passes() && !$request->has('id')) {
            return response()->json(['status' => 0]);
        }

        if (!$validator->passes() && $request->has('id')) {
            return redirect()->back()->with(['status' => 'fail', 'message' => 'Tên này đã tồn tại']);
        }

        $dataRequest = $request->all();

        $data = [
            'name'       => $dataRequest['name'],
            'status'     => isset($dataRequest['status']) ? $dataRequest['status'] : 1
        ];

        if (isset($dataRequest['id'])) {
            $this->productSpecialService->update($data, $dataRequest['id']);
            return redirect()->back()->with(['status' => 'success', 'message' => 'Thay đổi thành công']);
        }

        $row = $this->productSpecialService->insert($data);

        if ($row) {
            return response()->json(['status' => 1 ,'data' => $row]);
        }

        return response()->json(['status' => 0]);
    }

    public function editProductSpecial($id)
    {
        $row = $this->productSpecialService->findId($id);

        return view('admin.product_special.edit', ['data' => $row, 'id' => $id]);
    }

    public function deleteProductSpecial($id)
    {
        $this->productSpecialService->delete($id);
        return redirect()->back()->with(['status' => 'success', 'message' => 'Xoá thành công']);
    }

    public function selectSpecial(Request $request)
    {
        $productComponent = $this->productComponentService->findId($request->input('id'));
        $product = $productComponent->product;
        $productSpecial = $product->special->pluck('id')->toArray();

        return response()->json($productSpecial);
    }
}
