<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Package;
use App\Models\Testimonial;
use App\Models\Tradeperson;
use App\Models\TradepersonReview;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PublicApiController extends Controller
{
    // blogs - get
    public function getBlogs()
    {
        try {
            request()->validate([
                'blog_id' => 'nullable|string|exists:blogs,slug',
                'offset' => 'nullable|integer|min:0',
                'perPage' => 'nullable|integer|min:-1|max:100'
            ]);

            $query = Blog::orderByDesc('id');

            if (request()->has('blog_id')) {
                $query->where('slug', request()->blog_id);
            }

            $totalCount = $query->count();

            $offset = (int) request()->get('offset', 0);
            $perPage = (int) request()->get('perPage', 10);

            if ($perPage == -1) {
                $blogs = $query->get();
            } else {
                $blogs = $query->offset($offset)->limit($perPage)->get();
            }


            return response()->json([
                'success' => true,
                'data' => $blogs,
                'offset' => $offset,
                'perPage' => $perPage,
                'total_count' => $totalCount
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
                'featured_traderperson' => 'nullable|boolean'
            ]);

            // Start query
            $query = Category::query()->orderByDesc('id');

            if (!$request->boolean('only_children')) {
                $query->whereNull('parent_id');
            }

            if ($request->boolean('only_children')) {
                $query->whereNotNull('parent_id');
            }

            if ($request->boolean('with_children')) {
                $query->with('children');
            }

            if ($request->filled('search')) {
                $searchTerm = $request->search;
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('description', 'LIKE', "%{$searchTerm}%");
                });
            }

            if ($request->has('category_id')) {
                $query->where('id', $request->category_id);
            }

            if ($request->boolean('with_tradepersons')) {
                $query->with(['tradepersons' => function ($q) {
                    $q->orderByDesc('id')->where('featured', 1)->limit(6)
                        ->with('user');
                }]);
            }
            $traderPerson = collect([]);
            if ($request->featured_traderperson) {
                $traderPerson = TradePerson::with('user')->where('featured' , 1)->get();
            }

            $traderPerson = collect([]);
            if ($request->featured_traderperson) {
                $traderPerson = TradePerson::with('user')->where('featured', 1)->get();
            }

            // Pagination
            $offset = (int) $request->get('offset', 0);
            $perPage = (int) $request->get('perPage', 10);

            $totalCount = $query->count();

            if ($perPage == -1) {
                $categories =  $query->get();
            } else {
                $categories = $query->offset($offset)->limit($perPage)->get();
            }


            return response()->json([
                'success'     => true,
                'data'        => [
                    'categories' => $categories,
                    'traderPerson' => $traderPerson
                ],
                'offset'      => $offset,
                'perPage'     => $perPage,
                'total_count' => $totalCount,
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
                'perPage' => 'nullable|integer|min:-1|max:300',
                'category' => 'nullable|string|in:customer,tradeperson',
                'with_user' => 'nullable|boolean'
            ]);

            $query = Testimonial::where('verified', 1)->orderByDesc('id');

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

            $totalCount = $query->count();

            $offset = (int) request()->get('offset', 0);
            $perPage = (int) request()->get('perPage', 10);

            if ($perPage == -1) {
                $testimonials = $query->get();
            } else {
                $testimonials = $query->offset($offset)->limit($perPage)->get();
            }

            return response()->json([
                'success' => true,
                'data' => $testimonials,
                'offset' => $offset,
                'perPage' => $perPage,
                'total_count' => $totalCount
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
                'email' => 'sometimes|email',
                'min_rating' => 'sometimes|numeric|min:0|max:5',
                'with_reviews' => 'sometimes|boolean'
            ]);

            $query = Tradeperson::with(['user', 'orders']);

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
                $query->where(function ($q) use ($request) {
                    $q->where('address', 'LIKE', '%' . $request->address . '%')
                        ->orWhere('latitude', 'LIKE', '%' . $request->address . '%')
                        ->orWhere('longitude', 'LIKE', '%' . $request->address . '%');
                });
            }

            if ($request->filled('zip_code')) {
                $query->where('zip_code', 'LIKE', '%' . $request->get('zip_code') . '%');
            }

            if ($request->has('featured')) {
                $query->where('featured', $request->featured);
            }

            if ($request->boolean('category')) {
                $query->with('categories');
            }

            if ($request->filled('category_id')) {
                $categoryId = $request->category_id;
                $query->whereHas('categories', function ($q) use ($categoryId) {
                    $q->where('category_id', $categoryId);
                });
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

            if ($request->filled('min_rating')) {
                $query->withAvg('reviews', 'rating')
                      ->having('reviews_avg_rating', '>=', $request->min_rating);
            }

            if ($request->has('with_reviews')) {
                $query->with('reviews.customer.user', 'reviews.order.orderDetail');
            }

            $totalCount = $query->count();

            $offset = $request->input('offset', 0);
            $perPage = $request->input('perPage', 10);

            if ($perPage == -1) {
                $tradePersons = $query->get();
            } else {
                $tradePersons = $query->offset($offset)->limit($perPage)->get();
            }

            $tradePersons->transform(function ($tradeperson) {
                // Additional fields
                $tradeperson->verified = $tradeperson->featured;
                $tradeperson->available  = "Available";
                $tradeperson->review_count = $tradeperson->reviews()->count();
                $tradeperson->average_rating = $tradeperson->reviews()->avg('rating') ?? 0.00;
                $tradeperson->completed_jobs = $tradeperson->orders()->where('order_status', 4)->count();
                $tradeperson->active_jobs = $tradeperson->orders()->where('order_status', 2)->count();


                return $tradeperson->makeHidden(['orders']);
            });

            return response()->json([
                'success' => true,
                'data' => $tradePersons,
                'offset' => $offset,
                'total_count' => $totalCount
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


    // contractor - search
    public function searchTradePerson(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'category_id' => 'sometimes|integer',
                'postal_code' => 'sometimes|string',
                'offset' => 'nullable|integer|min:0',
                'perPage' => 'nullable|integer|min:-1|max:100'
            ]);

            // Create a base query for Tradeperson and eager load associated 'user' model
            $query = Tradeperson::with('user', 'categories');

            // If category_id is provided, filter the tradepersons based on the category
            if ($request->filled('category_id')) {
                // Use whereHas to filter tradepersons by category through the pivot table

                $query->whereHas('categories', function ($query) use ($request) {
                    $query->where('categories.id', $request->category_id); // Make sure you're filtering based on 'categories.id'
                });
            }

            // If zip_code is provided, filter by postal_code
            if ($request->filled('postal_code')) {
                $query->where('postal_code', $request->postal_code);
            }

            // Get the offset and perPage values from the request, with default values
            $offset = $request->input('offset', 0);
            $perPage = $request->input('perPage', 10);

            $offset = $request->input('offset', 0);
            $perPage = $request->input('perPage', 10);

            if ($perPage == -1) {
                $tradePersons = $query->get();
            } else {
                $tradePersons = $query->offset($offset)->limit($perPage)->get();
            }


            // Return the response with the tradeperson data
            return response()->json([
                'success' => true,
                'message' => 'Tradepersons Retrieved Successfully',
                'data' => $tradePersons,
                'offset' => $offset
            ], 200);
        } catch (ValidationException $e) {
            // Return validation error response
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $th) {
            // Return generic error response
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
                'with_review' => 'sometimes|boolean',
                'status'           => 'sometimes|string',
                'payment_status'   => 'sometimes|string|in:0,1',
                'id'               => 'sometimes|integer|exists:orders,id',
                'perPage'          => 'sometimes|integer|min:-1|max:100',
                'offset'           => 'sometimes|integer|min:0',
                'featured'         => 'sometimes|integer|in:0,1,2'
            ]);

            $query = Order::with('orderDetail');


            if ($request->boolean('with_customer')) {
                $query->with('customer.user');
            }

            if ($request->boolean('with_tradeperson')) {
                $query->with('tradeperson');
            }

            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            if ($request->has('payment_status')) {
                $query->where('payment_status', $request->payment_status);
            }

            if ($request->filled('id')) {
                $query->where('id', $request->id);
            }

            if ($request->filled('featured')) {
                if (in_array($request->get('featured'), [0, 1])) {
                    $query->where('featured', $request->featured);
                } 
            }

            if($request->filled('with_review')){
                $query->with('review');
            }


            $total_count = $query->count();

            $perPage = $request->input('perPage', 10);
            $offset = $request->input('offset', 0);

            if ($perPage == -1) {
                $orders = $query->get();
            } else {
                $orders = $query->offset($offset)->limit($perPage)->get();
            }



            return response()->json([
                'success'     => true,
                'message'     => 'Orders Retrieved Successfully',
                'data'        => $orders,
                'offset'      => $offset,
                'total_count' => $total_count
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors'  => $e->errors()
            ], 422);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'error'   => $th->getMessage()
            ], 500);
        }
    }



    // get package
    public function getPackage(Request $request)
    {
        try {
            $request->validate([
                'OrderByDesc' => 'sometimes|boolean',
                'perPage'     => 'sometimes|integer|min:-1|max:100',
                'offset'      => 'sometimes|integer|min:0',
            ]);

            $query = Package::query();

            if ($request->has('OrderByDesc') && $request->get('OrderByDesc') == true) {
                $query->orderByDesc('id');
            }

            $total_count = $query->count();
            $perPage = $request->get('perPage', 10);
            $offset = $request->get('offset', 0);

            if ($perPage == -1) {
                $packages = $query->get();
            } else {
                $packages = $query->offset($offset)->limit($perPage)->get();
            }



            return response()->json([
                'success' => true,
                'message' => 'Packages Retrieved Successfully',
                'data' => $packages,
                'offset' => $offset,
                'total_count' => $total_count
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