<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Category;

class OTOController extends Controller
{
    public function index(Request $request)
    {
    $data = $request->session()->pull('data', []);
    return view('index', compact('data'));
    }

public function modify(Request $request)
    {
    $request->session()->put('data', $request->all());
    return redirect()->route('contact.form');
    }

    public function thanks()
    {
        return view('thanks');
    }

    public function register()
    {
        return view('register');
    }

    public function registerSubmit(RegisterRequest $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('login')->with('success', 'ユーザー登録が完了しました。');
    }

    public function login()
    {
        return view('login');
    }

    public function loginSubmit(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard.index')->with('success', 'ログインしました');
        }

        return back()->withErrors(['email' => 'メールアドレスまたはパスワードが正しくありません'])->withInput();
    }

    public function confirm(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:男性,女性,その他',
            'email' => 'required|email|max:255',
            'phone1' => 'required|digits:3',
            'phone2' => 'required|digits:4',
            'phone3' => 'required|digits:4',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'inquiry_content' => 'required|string|max:120',
        ]);

        $category = \App\Models\Category::find($validatedData['category_id']);
        $validatedData['inquiry_type'] = $category ? $category->content : '不明';

        return view('confirm', ['data' => $validatedData]);
    }

    public function submit(Request $request)
    {
    $validatedData = $request->except('_token');

    $genderMap = [
        '男性' => 1,
        '女性' => 2,
        'その他' => 3,
    ];
    $validatedData['gender'] = $genderMap[$validatedData['gender']];

    $validatedData['tel'] = $validatedData['phone1'] . $validatedData['phone2'] . $validatedData['phone3'];

    $validatedData['category_id'] = $request->input('category_id');

    Contact::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'gender' => $validatedData['gender'],
        'email' => $validatedData['email'],
        'tel' => $validatedData['tel'],
        'address' => $validatedData['address'],
        'building' => $validatedData['building'] ?? null,
        'detail' => $validatedData['inquiry_content'],
        'category_id' => $validatedData['category_id'],
    ]);

    return redirect()->route('thanks');
    }


    public function dashboard(Request $request)
{
    $perPage = 7;

    $currentPage = $request->input('page', 1);

    $allContacts = Contact::query();

    if ($request->filled('name')) {
        $allContacts->where(function ($query) use ($request) {
            $query->where('first_name', 'like', '%' . $request->name . '%')
                ->orWhere('last_name', 'like', '%' . $request->name . '%')
                ->orWhere('email', 'like', '%' . $request->name . '%');
        });
    }

    if ($request->filled('gender')) {
        $genderMap = [
            '男性' => 1,
            '女性' => 2,
            'その他' => 3,
        ];

        if (isset($genderMap[$request->gender])) {
            $allContacts->where('gender', $genderMap[$request->gender]);
        }
    }

    if ($request->filled('category_id')) {
        $allContacts->where('category_id', $request->category_id);
    }

    if ($request->filled('date')) {
        $allContacts->whereDate('created_at', $request->date);
    }

    $allContacts = $allContacts->get();
    $total = $allContacts->count();
    $contacts = $allContacts->slice(($currentPage - 1) * $perPage, $perPage);

    $categories = Category::all();

    $pagination = [
        'current_page' => $currentPage,
        'total_pages' => ceil($total / $perPage),
    ];

    return view('dashboard', compact('contacts', 'categories', 'pagination'));
}



    public function destroy($id)
        {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('dashboard.index')->with('success', 'データを削除しました。');
        }
}


