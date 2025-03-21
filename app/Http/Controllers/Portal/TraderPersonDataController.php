<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Tradeperson;
use App\Models\OrderDetail;
use App\Models\TradepersonDetails;
use App\Models\TradepersonCategory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class TraderPersonDataController extends Controller
{
    public function list(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');
        $sortDirection = $request->input('sort_direction', 'desc');

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
            'first_name'       => 'nullable|string',
            'last_name'       => 'nullable|string',
            'about_me'          => 'nullable|string',
            'service'       => 'nullable|string',
            'phone'      => 'nullable|string',
            'address'      => 'nullable|string',
            'featured'      => 'nullable|string',
            'portfolio'      => 'nullable|array',
            'portfolio.*'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'certifications' => 'nullable|array',
            'certifications.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'    => 'required|exists:categories,id', // Validate category

        ]);

        DB::beginTransaction();
        try {
            
            $tradeperson = Tradeperson::findOrFail($id);

            // Handle Certificate Images
            $certificateFiles = [];
            if ($request->hasFile('certificate')) {
                // Delete old certificate images
                if (!empty($tradeperson->certificate)) {
                    $existingCertificateFiles = is_array($tradeperson->certificate) ? $tradeperson->certificate : json_decode($tradeperson->certificate, true);
                    foreach ($existingCertificateFiles as $oldFile) {
                        Storage::disk('public')->delete('tradeperson_certificate/' . $oldFile);
                    }
                }

                // Upload new certificate images
                foreach ($request->file('certificate') as $image) {
                    $filename = "certificate-" . time() . "-" . uniqid() . "." . $image->getClientOriginalExtension();
                    $image->storeAs('tradeperson_certificate', $filename, 'public');
                    $certificateFiles[] = $filename;
                }
            } else {
                // Retain existing certificate images if no new image is uploaded
                $certificateFiles = is_array($tradeperson->certificate) ? $tradeperson->certificate : json_decode($tradeperson->certificate, true) ?? [];
            }

            // Handle Portfolio Images
            $portfolioFiles = [];
            if ($request->hasFile('portfolio')) {
                // Delete old portfolio images
                if (!empty($tradeperson->portfolio)) {
                    $existingPortfolioFiles = is_array($tradeperson->portfolio) ? $tradeperson->portfolio : json_decode($tradeperson->portfolio, true);
                    foreach ($existingPortfolioFiles as $oldFile) {
                        Storage::disk('public')->delete('tradeperson_portfolio/' . $oldFile);
                    }
                }

                // Upload new portfolio images
                foreach ($request->file('portfolio') as $image) {
                    $filename = "portfolio-" . time() . "-" . uniqid() . "." . $image->getClientOriginalExtension();
                    $image->storeAs('tradeperson_portfolio', $filename, 'public');
                    $portfolioFiles[] = $filename;
                }
            } else {
                // Retain existing portfolio images if no new image is uploaded
                $portfolioFiles = is_array($tradeperson->portfolio) ? $tradeperson->portfolio : json_decode($tradeperson->portfolio, true) ?? [];
            }

            $validatedData = $request->only(['user_id', 'first_name', 'last_name', 'about_me', 'service', 'phone', 'address', 'featured']);

            $validatedData['portfolio'] = json_encode($portfolioFiles ?? []);
            $validatedData['certificate'] = json_encode($certificateFiles ?? []);
            $tradeperson->update($validatedData);
            

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
        try {

            $tradeperson = Tradeperson::with('categories' , 'user')->findOrFail($id);
            return view('tradeperson.view', compact('tradeperson'));

        } 
        catch (\Throwable $th) {

            dd($th->getMessage());
            return redirect()->back()->with('success', 'Something went wrong.');
            
        }
       
    }

    public function tradepersonToggleApproval(Request $request, $id)
    {
        $user = User::find($id);
        
        if ($user) {
            if ($request->status == 1) {
                // Accept
                $user->user_approved = 1;
            } elseif ($request->status == 0) {
                // Reject
                $user->user_approved = 0;
            }

            $user->save();

            return response()->json([
                'success' => true,
                'user_approved' => $user->user_approved
            ]);
        }

        return response()->json(['success' => false], 404);
    }


}
