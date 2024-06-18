<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
  {
    return view('index');
  }

  public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name','first_name','gender', 'email', 'tel1','tel2','tel3','address','building','category_id','content']);
  
        $contact['gender'] = $this->convertGenderToInt($contact['gender']); // genderを整数に変換
         //dd($contact); // ここでデバッグ出力

        $category = Category::find($contact['category_id']);
        $contact['category_name'] = $category->content;

        return view('confirm', compact('contact'));
    }

  public function store(Request $request)
  {
    $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1', 'tel2', 
    'tel3', 'address', 'building', 'category_id', 'content']);

    //dd($contact);

    //$contact['gender'] = $this->convertGenderToInt($contact['gender']); // gender


    $contact['tel'] = $contact['tel1'] . $contact['tel2'] . $contact['tel3']; // tel
    unset($contact['tel1'], $contact['tel2'], $contact['tel3']); // remove individual tel parts
    //dd($contact); // ここでデバッグ出力
    Contact::create($contact);
    return view('thanks');
   }

  private function convertGenderToInt($gender)
  {
        switch ($gender) {
            case '男性':
                return 1;
            case '女性':
                return 2;
            case 'その他':
                return 3;
            default:
                return 0; // 不明な場合のデフォルト値
        }

  }

  public function show(Contact $contact)
  {
      return view('contacts.show', compact('contact'));
  }

}