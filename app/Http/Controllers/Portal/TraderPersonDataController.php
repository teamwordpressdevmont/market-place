<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Tradeperson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TraderPersonDataController extends Controller
{
    public function list(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'asc');

        $tradeperson = Tradeperson::when($search, function ($query, $search) {
            return $query->where('business_name', 'like', "%{$search}%");
        })
        ->orderBy($sortBy, $sortDirection)
        ->paginate(10);

        return view('tradeperson.list', compact('tradeperson', 'search', 'sortBy', 'sortDirection'));
    }

    public function edit($id) {
        $tradeperson = Tradeperson::findOrFail($id);
        $users = User::select('id', 'name')->get();
        return view('tradeperson.add-edit', compact('tradeperson', 'users'));
    }

    public function update(Request $request, $id) {
        DB::beginTransaction();
        try {
            $request->validate([
                'user_id'        => 'nullable|exists:users,id',
                'business_name'       => 'nullable|string',
                'description'      => 'nullable|string',
                'phone'      => 'nullable|string',
                'address'      => 'nullable|string',
                'featured'      => 'nullable|string',
            ]);
            
            $tradeperson = Tradeperson::findOrFail($id);
            $validatedData = $request->only(['user_id', 'business_name', 'description', 'phone', 'address', 'featured']);

            $tradeperson->update($validatedData);
            DB::commit();
            return redirect()->route('tradeperson.list')->with('success', 'Tradeperson updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update Tradeperson: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $tradeperson = Tradeperson::findOrFail($id);

        if (!is_null($tradeperson)) {
            $tradeperson->delete();
        }

            return redirect()->back()->with('success', 'Tradeperson deleted successfully.');

    }

    public function view($id)
    {
        $tradeperson = Tradeperson::findOrFail($id);
        return view('tradeperson.view', compact('tradeperson'));
    }
}
