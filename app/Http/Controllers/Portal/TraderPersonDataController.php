<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Tradeperson;
use Illuminate\Http\Request;

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

    public function destroy($id)
    {
        $tradeperson = Tradeperson::findOrFail($id);

        if (!is_null($tradeperson)) {
            $tradeperson->delete();
        }

            return redirect()->back()->with('success', 'Contractor deleted successfully.');

    }

    public function view($id)
    {
        $tradeperson = Tradeperson::findOrFail($id);
        return view('tradeperson.view', compact('tradeperson'));
    }
}
