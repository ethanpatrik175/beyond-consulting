<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class VenueController extends Controller
{
    public $buttons;
    public $section;

    public function __construct()
    {
        $this->section = "Venues";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Venue::whereNull('deleted_at')->with(['addedBy', 'updatedBy'])->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function($row){
                    return '<input type="checkbox" class="checkbox" name="checkbox[]" value="'.$row->id.'">';
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('venues.show', $row->id).'" target="_blank" class="text-success"><i title="Show" class="fas fa-eye font-size-18"></i></a>&nbsp;&nbsp;';
                    $btn .= '<a href="'.route('venues.edit', $row->id).'" target="_blank" ><i title="Edit" class="fas fa-edit font-size-18"></i></a>';
                    $btn .= ' <a href="javascript:void(0);" data-toggle="tooltip" onClick="deleteRecord('.$row->id.')" data-original-title="Delete" class="text-danger"><i title="Delete" class="fas fa-trash-alt font-size-18"></i></a>';
                    return $btn;
                })
                ->addColumn('created_at', function($row){
                    return date('d-m-Y', strtotime($row->created_at)).'<br /><label class="text-primary">By: '.$row->addedBy->first_name.' '.$row->addedBy->last_name.'</label>';
                })
                ->addColumn('updated_at', function($row){
                    if(isset($row->updatedBy)){
                        return date('d-m-Y', strtotime($row->updated_at)).'<br /><label class="text-primary">By: '.$row->updatedBy->first_name.' '.$row->updatedBy->last_name.'</label>';
                    }
                })
                ->addColumn('status', function($row){
                    if ($row->is_active == 0) {
                        $btn0 = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="status" switch="bool" data-id="' . $row->id . '" value="1"/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';
                        return $btn0;
                    }else if($row->is_active == 1) {
                        $btn1 = '<div class="square-switch"><input type="checkbox" id="switch' . $row->id . '" class="status" switch="bool" data-id="' . $row->id . '" value="0" checked/><label for="switch' . $row->id . '" data-on-label="Yes" data-off-label="No"></label></div>';
                        return $btn1;
                    }
                })
                ->addColumn('venue', function($row){
                    $venue = '';
                    $venue .= 'Title: '.$row->title.'<br />';
                    $venue .= 'Sub Title: '.$row->sub_title;
                    return $venue;
                })
                ->addColumn('address', function($row){
                    return json_decode($row->address);
                })
                ->addColumn('image', function($row){
                    return '<img src="'.asset('assets/frontend/images/venues/'.Str::of($row->image)->replace(' ', '%20')).'" width="50" height="50" />';
                })
                ->rawColumns(['action', 'created_at', 'updated_at','checkbox', 'image', 'status', 'venue', 'address'])
                ->make(true);
        }
        
        $data['buttons'] = $this->buttons();
        $data['section'] = $this->section;
        $data['page_title'] = "All ".$this->section;

        return view('backend.venues.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['buttons'] = $this->buttons();
        $data['section'] = $this->section;
        $data['page_title'] = "Add New ".Str::singular($this->section);

        return view('backend.venues.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|min:3|max:100",
            'slug' => 'required|unique:venues,slug',
            "sub_title" => "nullable|string|min:3|max:100",
            "address" => "required|max:250",
            "longitude" => "required",
            "latitude" => "required",
            'image' => 'required|image|max:1024'
        ]);

        $venue = new Venue();
        $venue->added_by = Auth::user()->id;
        $venue->title = $request->title;
        $venue->sub_title = $request->sub_title;
        $venue->slug = $request->slug;
        $venue->address = json_encode($request->address);
        $venue->longitude = $request->longitude;
        $venue->latitude = $request->latitude;
        $venue->description = json_encode($request->description);

        $image = $request->file('image');
        if ($image->move('assets/frontend/images/venues/', $image->getClientOriginalName())) {
            $venue->image = $image->getClientOriginalName();
            if($venue->save())
            {
                $data['type'] = "success";
                $data['message'] = "Venue Added Successfuly!.";
                $data['icon'] = 'mdi-check-all';

                return redirect()->route('venues.index')->with($data);
            }
            else
            {
                $data['type'] = "danger";
                $data['message'] = "Failed to Add Venue, please try again.";
                $data['icon'] = 'mdi-block-helper';

                return redirect()->route('venues.create')->withInput()->with($data);
            }

        }
        else{
            $data['type'] = "danger";
            $data['message'] = "Failed to upload image, please try again.";
            $data['icon'] = 'mdi-block-helper';

            return redirect()->route('venues.create')->withInput()->with($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['venue'] = Venue::findOrFail($id);
        $data['buttons'] = $this->buttons();
        $data['section'] = $this->section;
        $data['page_title'] = "View ".Str::singular($this->section).' Detail';

        return view('backend.venues.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        $data['venue'] = Venue::findOrFail($venue->id);
        $data['buttons'] = $this->buttons();
        $data['section'] = $this->section;
        $data['page_title'] = "Edit ".Str::singular($this->section);

        return view('backend.venues.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        $request->validate([
            "title" => "required|string|min:3|max:100",
            'slug' => 'required|unique:venues,slug,'.$venue->id,
            "sub_title" => "nullable|string|min:3|max:100",
            "address" => "required|max:250",
            "longitude" => "required",
            "latitude" => "required",
            'image' => 'nullable|image|max:1024'
        ]);

        $venue = Venue::findOrFail($venue->id);
        $venue->added_by = Auth::user()->id;
        $venue->title = $request->title;
        $venue->sub_title = $request->sub_title;
        $venue->slug = $request->slug;
        $venue->address = json_encode($request->address);
        $venue->longitude = $request->longitude;
        $venue->latitude = $request->latitude;
        $venue->description = json_encode($request->description);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->move('assets/frontend/images/venues/', $image->getClientOriginalName())) {
                $venue->image = $image->getClientOriginalName();
            }
        }

        if($venue->save())
        {
            $data['type'] = "success";
            $data['message'] = "Venue Updated Successfuly!.";
            $data['icon'] = 'mdi-check-all';

            return redirect()->route('venues.index')->with($data);
        }
        else
        {
            $data['type'] = "danger";
            $data['message'] = "Failed to Update Venue, please try again.";
            $data['icon'] = 'mdi-block-helper';

            return redirect()->route('venues.create')->withInput()->with($data);
        }
    }

    public function updateStatus(Request $request)
    {
        $update = Venue::where('id', $request->id)->update(['is_active' => $request->status]);
        $modelName = "Venue";
        if ($update) {
            $request->status == 1 ? $alertType = 'success' : $alertType = 'info';
            $request->status == 1 ? $message = $modelName.' Activated Successfuly!' : $message = $modelName.' Deactivated Successfuly!';

            $notification = array(
                'message' => $message,
                'type' => $alertType,
                'icon' => 'mdi-check-all'
            );
        } else {
            $notification = array(
                'message' => 'Some Error Occured, Try Again!',
                'type' => 'error',
                'icon'  => 'mdi-block-helper'
            );
        }

        echo json_encode($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $destroy = Venue::findOrFail($venue->id);
        $model = "Venue";
        if($destroy->delete())
        {
            $destroy->deleted_by = Auth::user()->id;
            $destroy->save();

            $data['type'] = "success";
            $data['message'] = $model." Deleted Successfuly!.";
            $data['icon'] = 'mdi-check-all';

            return json_encode($data);
        }
        else{
            $data['type'] = "danger";
            $data['message'] = "Failed to Delete ".$model.", please try again.";
            $data['icon'] = 'mdi-block-helper';

            return json_encode($data);
        }
    }

    public function trash(Request $request)
    {
        if($request->ajax())
        {
            $data = Venue::onlyTrashed()->with(['deletedBy'])->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function($row){
                    return '<input type="checkbox" class="checkbox" name="checkbox[]" value="'.$row->id.'">';
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0);" data-toggle="tooltip" onClick="restoreRecord('.$row->id.')" data-original-title="Restore"><i title="Restore" class="fas fa-trash-restore font-size-18"></i></a>';
                    return $btn;
                })
                ->addColumn('deleted_at', function($row){
                    return date('d-m-Y', strtotime($row->deleted_at)).'<br /><label class="text-primary">By: '.$row->deletedBy->first_name.' '.$row->deletedBy->last_name.'</label>';
                })
                ->addColumn('image', function($row){
                    return '<img src="'.asset('assets/frontend/images/venues/'.Str::of($row->image)->replace(' ', '%20')).'" width="50" height="50" />';
                })
                ->addColumn('venue', function($row){
                    $venue = '';
                    $venue .= 'Title: '.$row->title.'<br />';
                    $venue .= 'Sub Title: '.$row->sub_title;
                    return $venue;
                })
                ->addColumn('address', function($row){
                    return json_decode($row->address);
                })
                ->rawColumns(['action', 'deleted_at' ,'checkbox', 'image', 'venue', 'address'])
                ->make(true);
        }

        $data['buttons'] = $this->buttons();
        $data['section'] = $this->section;
        $data['page_title'] = "Trashed ".$this->section;

        return view('backend.venues.trash', $data);
    }

    public function restore(Request $request)
    {
        $restore = Venue::onlyTrashed()->findOrFail($request->id);
        
        if($restore->restore())
        {
            $restore->deleted_by = NULL;
            $restore->save();

            $data['type'] = "success";
            $data['message'] = "Venue Restored Successfuly!.";
            $data['icon'] = 'mdi-check-all';
        }
        else{
            $data['type'] = "danger";
            $data['message'] = "Failed to Restore, please try again!.";
            $data['icon'] = 'mdi-block-helper';
        }
        return json_encode($data);
    }

    public function buttons()
    {
        $this->buttons = '';
        $this->buttons .= '<a href="'.route("venues.index").'" class="btn btn-sm btn-success">ALL '.strtoupper($this->section).'</a> &nbsp;';
        $this->buttons .= '<a href="'.route("venues.create").'" class="btn btn-sm btn-primary">ADD NEW</a> &nbsp;';
        $this->buttons .= '<a href="'.route('venues.trash').'" class="btn btn-sm btn-danger">TRASH</a>';

        return $this->buttons;
    }
}
