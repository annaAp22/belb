<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;


use App\Models\Product;
use App\Models\Attribute;

class AttributeController extends Controller
{
    public function __construct() {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('index', new Product());
        $attributes = Attribute::orderBy('id', 'desc')->withTrashed()->paginate(10);

        return view('admin.attributes.index', ['attributes' => $attributes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\admin\AttributeRequest $request)
    {
        $data = $request->input();
        if($data['type']=='list' || $data['type']=='checklist') {
            $data['list'] = json_encode($data['values'], JSON_UNESCAPED_UNICODE);
        } else {
            $data['list'] = '';
        }
        $data['unit'] = ($data['type']=='integer' ? $data['unit'] : '');
        $attribute = Attribute::create($data);
        if($attribute) {
            return redirect()->route('admin.attributes.index')->withMessage('Атрибут добавлен');
        }else {
            return redirect()->route('admin.attributes.index')->withError('Не удалось добавить аттрибут');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);
        $types = Attribute::$types;
        return view('admin.attributes.edit', compact('attribute','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\admin\AttributeRequest $request, $id)
    {
        $data = $request->input();
        if($data['type']=='list' || $data['type']=='checklist') {
            $data['list'] = json_encode($data['values'], JSON_UNESCAPED_UNICODE);
        } else {
            $data['list'] = '';
        }

        $data['unit'] = ($data['type']=='integer' ? $data['unit'] : '');
        $attribute = Attribute::findOrFail($id)->update($data);
        if($attribute) {
            return redirect()->route('admin.attributes.index')->withMessage('Атрибут изменен');
        }else {
            return redirect()->route('admin.attributes.index')->withError('Не удалось изменить аттрибут');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attribute::destroy($id);
        return redirect()->route('admin.attributes.index')->withMessage('Атрибут удален');
    }


    /**
     * Востановление мягко удаленной категории
     * @param $id
     * @return mixed
     */
    public function restore($id) {
        Attribute::withTrashed()->find($id)->restore();
        return redirect()->route('admin.attributes.index')->withMessage('Атрибут востановлен');
    }
}
