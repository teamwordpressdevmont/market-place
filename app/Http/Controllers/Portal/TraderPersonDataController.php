<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Tradeperson;
use App\Models\TradepersonDetails;
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

         if ($request->ajax()) {
            return response()->json([
                'html' => view('tradeperson.list', compact('tradeperson'))->render(),
                'pagination' => (string) $tradeperson->appends($request->all())->links()
            ]);
        }

        return view('tradeperson.list', compact('tradeperson', 'search', 'sortBy', 'sortDirection'));
    }

    public function edit($id) {
        $tradeperson = Tradeperson::findOrFail($id);
        $users = User::select('id', 'name')->get();
        $tradepersonDetail = TradepersonDetails::where('tradeperson_id', $id)->first();
        return view('tradeperson.add-edit', compact('tradeperson', 'users', 'tradepersonDetail'));
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
                'about'          => 'nullable|string',
                'services'       => 'nullable|string',
                'portfolio'      => 'nullable|array',
                'certifications' => 'nullable|array',
            ]);
            
            $tradeperson = Tradeperson::findOrFail($id);
            $validatedData = $request->only(['user_id', 'business_name', 'description', 'phone', 'address', 'featured']);

            $tradeperson->update($validatedData);

            TradepersonDetails::updateOrCreate(
                ['tradeperson_id' => $id],
                [
                    'about'          => $request->input('about'),
                    'services'       => $request->input('services'),
                    'portfolio'      => $request->input('portfolio'),
                    'certifications' => $request->input('certifications'),
                ]
            );

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
            TradepersonDetails::where('tradeperson_id', $id)->delete();
            $tradeperson->delete();
        }

        return redirect()->back()->with('success', 'Tradeperson deleted successfully.');

    }

    public function view($id)
    {
        $tradeperson = Tradeperson::findOrFail($id);
        $tradepersonDetail = TradepersonDetails::where('tradeperson_id', $id)->first();
        return view('tradeperson.view', compact('tradeperson', 'tradepersonDetail'));
    }
}
