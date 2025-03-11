<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Package;
use App\Models\Testimonial;
use App\Models\Tradeperson;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class PublicApiController extends Controller
{
    // blogs - get
    public function getBlogs()
    {
        try {
            request()->validate([
                'blog_id' => 'nullable|integer|exists:blogs,id',
                'offset' => 'nullable|integer|min:0',
                'perPage' => 'nullable|integer|min:1|max:100'
            ]);

            $query = Blog::orderByDesc('id');

            if (request()->has('blog_id')) {
                $query->where('id', request()->blog_id);
            }

            $offset = (int) request()->get('offset', 0);
            $perPage = (int) request()->get('perPage', 10);

            $blogs = $query->offset($offset)->limit($perPage)->get();

            return response()->json([
                'success' => true,
                'data' => $blogs,
                'offset' => $offset,
                'asset_path' => asset('/public/storage/')
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // category - get
    public function getCategories(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'category_id'       => 'nullable|integer|exists:categories,id',
                'offset'            => 'nullable|integer|min:0',
                'perPage'           => 'nullable|integer|min:1|max:100',
                'name'              => 'nullable|string|max:255',
                'description'       => 'nullable|string|max:255',
                'only_parents'      => 'nullable|boolean',
                'only_children'     => 'nullable|boolean',
                'with_children'     => 'nullable|boolean',
                'with_tradepersons' => 'nullable|boolean',
                'search'            => 'nullable|string|max:255',
            ]);

            // Start query
            $query = Category::query()->orderByDesc('id');

            if (!$request->boolean('only_children')) {
                $query->whereNull('parent_id');
            }

            // Fetch only child categories if requested
            if ($request->boolean('only_children')) {
                $query->whereNotNull('parent_id');
            }

            // Include children if requested
            if ($request->boolean('with_children')) {
                $query->with('children');
            }

            // Search filter (applies to both parent and child)
            if ($request->filled('search')) {
                $searchTerm = $request->search;
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('description', 'LIKE', "%{$searchTerm}%");
                });
            }

            // Fetch a specific category by ID
            if ($request->has('category_id')) {
                $query->where('id', $request->category_id);
            }

            // Include tradepersons if requested
            if ($request->boolean('with_tradepersons')) {
                $query->with(['tradepersons' => function ($q) {
                    $q->orderByDesc('id')->where('featured', 1)->limit(6);
                }]);
            }

            // Pagination
            $offset = (int) $request->get('offset', 0);
            $perPage = (int) $request->get('perPage', 10);
            $categories = $query->offset($offset)->limit($perPage)->get();

            return response()->json([
                'success' => true,
                'data'    => $categories,
                'offset'  => $offset,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors'  => $e->errors(),
            ], 422);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }


    // testimonial - get
    public function getTestimonials(Request $request)
    {
        try {
            request()->validate([
                'testimonial_id' => 'nullable|integer|exists:testimonials,id',
                'offset' => 'nullable|integer|min:0',
                'perPage' => 'nullable|integer|min:1|max:100',
                'category' => 'nullable|string|in:customer,tradeperson',
                'with_user' => 'nullable|boolean'
            ]);

            $query = Testimonial::orderByDesc('id');

            if (request()->has('testimonial_id')) {
                $query->where('id', request()->testimonial_id);
            }
            if (request()->has('with_user') && request()->get('with_user') == true) {
                $query->with('user');
            }

            if (request()->has('category')) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->role($request->category);
                });
            }

            $offset = (int) request()->get('offset', 0);
            $perPage = (int) request()->get('perPage', 10);

            $testimonials = $query->offset($offset)->limit($perPage)->get();

            return response()->json([
                'success' => true,
                'data' => $testimonials,
                'offset' => $offset
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    // testimonial - store
    public function storeTestimonial(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'heading' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'rating' => 'required|integer|min:1|max:5',
                'verified' => 'required|boolean',
                'user_id' => 'required|integer|exists:users,id'
            ]);

            $testimonial = Testimonial::create($request->only(['user_id', 'name', 'heading', 'description', 'rating', 'verified']));

            return response()->json([
                'success' => true,
                'message' => 'Testimonial added successfully!',
                'data' => $testimonial
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    // contractor - get
    public function getTradePerson(Request $request)
    {
        try {
            $request->validate([
                'tradeperson_id' => 'sometimes|integer|exists:tradepersons,id',
                'business_name' => 'sometimes|string',
                'description' => 'sometimes|string',
                'phone' => 'sometimes|string',
                'address' => 'sometimes|string',
                'featured' => 'sometimes|integer|in:0,1',
                'offset' => 'sometimes|integer|min:0',
                'perPage' => 'sometimes|integer|min:1',
                'category' => 'sometimes|boolean',
                'name' => 'sometimes|string',
                'email' => 'sometimes|email'
            ]);

            $query = Tradeperson::with('user');

            if ($request->filled('tradeperson_id')) {
                $query->where('id', $request->tradeperson_id);
            }

            if ($request->filled('business_name')) {
                $query->where('business_name', 'like', '%' . $request->business_name . '%');
            }

            if ($request->filled('description')) {
                $query->where('description', 'like', '%' . $request->description . '%');
            }

            if ($request->filled('phone')) {
                $query->where('phone', 'like', '%' . $request->phone . '%');
            }

            if ($request->filled('address')) {
                $query->where('address', 'like', '%' . $request->address . '%');
            }

            if ($request->has('featured')) {
                $query->where('featured', $request->featured);
            }

            if ($request->boolean('category')) {
                $query->with('categories');
            }

            if ($request->filled('name')) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->name . '%');
                });
            }

            if ($request->filled('email')) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('email', 'like', '%' . $request->email . '%');
                });
            }

            $offset = $request->input('offset', 0);
            $perPage = $request->input('perPage', 10);

            $tradePerson = $query->offset($offset)->limit($perPage)->get();

            return response()->json([
                'success' => true,
                'data' => $tradePerson,
                'offset' => $offset
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    // store contact
    public function storeContact(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:100|min:3',
                'email' => 'required|email|max:100|min:3',
                'phone' => 'required|string|max:16|min:7',
                'message' => 'required|string|max:500|min:2',
            ]);

            Contact::create($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'contact Added Successfully'
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    // get Order 
    public function getOrder(Request $request)
    {
        try {

            $validated = $request->validate([
                'with_customer'    => 'sometimes|boolean',
                'with_tradeperson' => 'sometimes|boolean',
                'status'           => 'sometimes|string',
                'payment_status'   => 'sometimes|string|in:0,1',
                'id'            => 'integer|exists:orders,id',
                'perPage'          => 'sometimes|integer|min:1|max:100',
                'offset'           => 'sometimes|integer|min:0',
            ]);

            $query = Order::OrderByDesc('id');

            if ($request->has('with_customer') && $request->has('with_customer') == true) {
                $query->with('customer');
            }

            if ($request->has('with_tradeperson') && $request->get('with_tradeperson') == true) {
                $query->with('tradeperson');
            }

            if ($request->has('status') && $request->get('status') == true && in_array($request->get('status'), ['Processing'])) {
                $query->where('status', $request->status);
            }

            if ($request->has('payment_status') && $request->get('payment_status') == true) {
                $query->where('payment_status', $request->payment_status);
            }

            if ($request->has('id')) {
                $query->where('id', $request->id);
            }


            $perPage = $request->get('perPage', 10);
            $offset = $request->get('offset', 0);

            $orders = $query->offset($offset)->limit($perPage)->get();

            return response()->json([
                'success' => true,
                'message' => 'Order Retrieved Successfully',
                'data' => $orders,
                'offset' => $offset
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    // get package
    public function getPackage(Request $request)
    {
        try {
            $request->validate([
                'OrderByDesc' => 'sometimes|boolean',
                'perPage'     => 'sometimes|integer|min:1|max:100',
                'offset'      => 'sometimes|integer|min:0',
            ]);

            $query = Package::query();

            if ($request->has('OrderByDesc') && $request->get('OrderByDesc') == true) {
                $query->orderByDesc('id');
            }
            
            $perPage = $request->get('perPage', 10);
            $offset = $request->get('offset', 0);


            $packages = $query->offset($offset)->limit($perPage)->get();
            
            
            return response()->json([
                'success' => true,
                'message' => 'Packages Retrieved Successfully',
                'data' => $packages,
                'offset' => $offset
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}