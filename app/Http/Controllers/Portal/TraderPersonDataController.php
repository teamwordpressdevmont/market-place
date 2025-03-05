<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Tradeperson;
use App\Models\TradepersonDetails;
use App\Models\TradepersonCategory;
use App\Models\User;
use App\Models\Category;
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

        try {
            $tradeperson = Tradeperson::findOrFail($id);
            $users = User::select('id', 'name')->get();
            $tradepersonDetail = TradepersonDetails::where('tradeperson_id',  $id)->first();
            $categories = Category::select('id', 'name')->get(); // Fetch categories

            // Fetch the selected category
            $tradepersonCategory = TradepersonCategory::where('tradeperson_id', $id)->first();

            
            if (!$tradeperson) {
                return redirect()->route('tradeperson.list')->with('error', 'Tradeperson not found.');
            }

            return view('tradeperson.add-edit', compact('tradeperson', 'users', 'tradepersonDetail' , 'categories' , 'tradepersonCategory'));
        } catch (\Exception $e) {
            return redirect()->route('tradeperson.list')->with('error', 'Something went wrong.');
        }

    }

    public function update(Request $request, $id) {

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
            'category_id'    => 'required|exists:categories,id', // Validate category

        ]);

        DB::beginTransaction();
        try {
            
            $tradeperson = Tradeperson::findOrFail($id);
            $validatedData = $request->only(['user_id', 'business_name', 'description', 'phone', 'address', 'featured']);

            $tradeperson->update($validatedData);

            // TradepersonDetails::updateOrCreate(
            //     ['tradeperson_id' => $id],
            //     [
            //         'about'          => $request->input('about'),
            //         'services'       => $request->input('services'),
            //         'portfolio'      => $request->input('portfolio'),
            //         'certifications' => $request->input('certifications'),
            //     ]
            // );

             // Update Tradeperson Category
            TradepersonCategory::updateOrCreate(
                ['tradeperson_id' => $id], // Find by tradeperson_id
                ['category_id' => $request->input('category_id')] // Update or insert category_id
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
        DB::beginTransaction();
        try {
            $tradeperson = Tradeperson::findOrFail($id);
            if (!is_null($tradeperson)) {
                TradepersonDetails::where('tradeperson_id', $id)->delete();
                $tradeperson->delete();
            }

            DB::commit();
            return redirect()->back()->with('success', 'Tradeperson deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete Tradeperson: ' . $e->getMessage());
        }

    }

    public function view($id)
    {
        $tradeperson = Tradeperson::findOrFail($id);
        $tradepersonDetail = TradepersonDetails::where('tradeperson_id', $id)->first();
        return view('tradeperson.view', compact('tradeperson', 'tradepersonDetail'));
    }

    public function toggleUserApproval($id)
    {
        $user = User::findOrFail($id);
        $user->user_approved = !$user->user_approved;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User ' . ($user->user_approved ? 'approved' : 'disapproved') . ' successfully!',
            'user_approved' => $user->user_approved
        ]);
    }

}
