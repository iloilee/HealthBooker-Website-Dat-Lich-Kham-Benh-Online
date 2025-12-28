<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all()->groupBy('category');
        return view('abouts.cauhoithuonggap', compact('faqs'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        if (empty($query)) {
            return response()->json([]);
        }

        $faqs = Faq::where('question', 'LIKE', '%' . $query . '%')
                   ->orWhere('answer', 'LIKE', '%' . $query . '%')
                   ->get();

        return response()->json($faqs);
    }
}
